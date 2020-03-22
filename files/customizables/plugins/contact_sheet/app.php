<?php
class custom_contact_sheet extends \FileRun\Files\Plugin {

	static $localeSection = 'Custom Actions: Photo Proof Sheet';

	function init() {
		$this->JSconfig = [
			'title' => self::t('Create photo proof sheet'),
			'iconCls' => 'fa fa-fw fa-th',
			"ajax" => true,
			'width' => 400, 'height' => 400,
			"requiredUserPerms" => ["download", "upload"],
			'requires' => ['multiple', 'download', 'upload']
		];
	}

	function isDisabled() {
		global $settings;
		return ($settings->thumbnails_imagemagick != 'exec' || !\FileRun\Perms::getHomeFolder());
	}

	function run() {
		global $settings, $config;

		if (sizeof($_POST['paths']) < 2) {
			exit('You need to select at least two files');
		}
		$imagemagick_convert = $settings->thumbnails_imagemagick_path;

		$cmd = $imagemagick_convert." montage -label \"%f\" -font Arial -pointsize 20 -background \"#ffffff\" -fill \"black\" -strip -define jpeg:size=600x500 -geometry 600x500+2+2";

		$graphicsMagick = (in_array(\FM::basename($imagemagick_convert), ['gm', 'gm.exe']));
		if (!$graphicsMagick) {
			if ($config['imagemagick_limit_resources']) {
				$cmd .= " -limit area 20mb";
				$cmd .= " -limit disk 500mb";
			}
			if (!$config['imagemagick']['no_auto_orient']) {
				$cmd .= " -auto-orient";
			}
		}

		if (sizeof($_POST['paths']) > 8) {
			$cmd .= ' -tile 2x4';
		} else {
			$cmd .= ' -tile 2x';
		}

		foreach ($_POST['paths'] as $relativePath) {

			$this->data['relativePath'] = $relativePath;
			$data = $this->prepareRead(['expect' => 'file']);

			$fileName = \FM::basename($data['fullPath']);
			$ext =  \FM::getExtension($fileName);
			if ($this->isSupportedImageFile($ext)) {
				$cmd .= ' "'.$data['fullPath'];
				if (in_array($ext, ['tiff', 'tif', 'pdf', 'gif', 'ai', 'eps'])) {
					$cmd .= '[0]';
				}
				$cmd .= '"';
			}
		}

		$outputRelativePath = '/ROOT/HOME/Contact_sheet_'.time().'.jpg';

		$this->data['relativePath'] = $outputRelativePath;
		$data = $this->prepareWrite();

		$cmd .= ' "'.$data['targetFile']['fullPath'].'"';

		if (\FM::getOS() == "win") {
			$cmd .= "  && exit";
		} else {
			$cmd .= " 2>&1";
		}
		$return_text = [];
		$return_code = 0;
		session_write_close();
		exec($cmd, $return_text, $return_code);
		if ($return_code != 0) {
			jsonFeedback(false, self::t('Action failed: %1 %2', array($return_code, implode(',', $return_text))));
		} else {
			$this->writeFile([
				'source' => 'external',
				'logging' => ['details' => ['method' => 'Create photo proof sheet']]
			]);
			jsonFeedback(true, self::t('Photo proof sheet successfully created in your home folder.'));
		}
	}

	private function isSupportedImageFile($ext) {
		global $settings;
		$ext = strtolower($ext);
		$typeInfo = \FM::fileTypeInfo(false, $ext);
		if ($typeInfo['type'] == "img") {
			return true;
		}
		if ($settings->thumbnails_imagemagick && in_array($ext, explode(",", strtolower($settings->thumbnails_imagemagick_ext)))) {
			return true;
		}
		return false;
	}
}