<?php
use \FileRun\WebLinks;

class custom_onlyoffice extends \FileRun\Files\Plugin {

	var $online = true;
	static $localeSection = 'Custom Actions: ONLYOFFICE';

	var $canEditTypes = [
		'doc', 'docx', 'dotx', 'odt', 'ott', 'rtf', 'txt', 'html',
		'xls', 'xlsx', 'xltx', 'ods', 'ots', 'csv',
		'ppt', 'pptx', 'potx', 'odp', 'otp'
	];

	var $ext = [
		'text' => ['doc', 'docx', 'dotx', 'odt', 'ott', 'rtf', 'txt', 'pdf', 'html', 'epub', 'xps', 'djvu'],
		'spreadsheet' => ['xls', 'xlsx', 'xltx', 'ods', 'ots', 'csv'],
		'presentation' => ['ppt', 'pptx', 'potx', 'odp', 'otp'],
	];

	function init() {
		$this->settings = [
			[
				'key' => 'serverURL',
				'title' => self::t('DocumentServer URL'),
				'comment' => self::t('Download and install %1', ['<a href="https://github.com/ONLYOFFICE/DocumentServer" target="_blank">ONLYOFFICE DocumentServer</a>'])
			],
			[
                'key' => 'serverSecret',
                'title' => self::t('JWT secret')
            ]
		];
		$this->JSconfig = [
			"title" => self::t("ONLYOFFICE"),
			"popup" => true,
			'icon' => 'images/icons/onlyoffice.png',
			"loadingMsg" => self::t('Loading document in ONLYOFFICE. Please wait...'),
			'extensions' => array_merge($this->ext['text'], $this->ext['spreadsheet'], $this->ext['presentation']),
			"requires" => ["download"],
			"requiredUserPerms" => ["download"],
			"createNew" => [
				"title" => self::t("Document with ONLYOFFICE"),
				"options" => [
					[
						"fileName" => self::t("New Document.docx"),
						"title" => self::t("Word Document"),
						"iconCls" => 'fa fa-fw fa-file-word-o'
					],
					[
						"fileName" => self::t("New Spreadsheet.xlsx"),
						"title" => self::t("Spreadsheet"),
						"iconCls" => 'fa fa-fw fa-file-excel-o'
					],
					[
						"fileName" => self::t("New Presentation.pptx"),
						"title" =>  self::t("Presentation"),
						"iconCls" => 'fa fa-fw fa-file-powerpoint-o'
					]
				]
			]
		];
	}

	function isDisabled() {
		return (self::getSetting('serverURL') == '');
	}

	function run() {
		$data = $this->prepareRead(['expect' => 'file']);
		$weblinkInfo = WebLinks::createForService($data['fullPath'], false, $data['shareInfo']['id']);
		if (!$weblinkInfo) {
			self::outputError('Failed to setup weblink', 'html');
		}
		$url = WebLinks::getURL(['id_rnd' => $weblinkInfo['id_rnd'], 'download' => 1]);

		$extension = \FM::getExtension($data['fullPath']);

		$saveURL = false;
		$mode = 'view';
		if (\FileRun\Perms::check('upload')) {
			if ((!$data['shareInfo'] || ($data['shareInfo'] && $data['shareInfo']['perms_upload']))) {
				$saveURL = WebLinks::getSaveURL($weblinkInfo['id_rnd'], false, "onlyoffice");
				if (in_array($extension, $this->canEditTypes)) {
					$mode = 'edit';
				}
			}
		}

		if (in_array($extension, $this->ext['text'])) {
			$docType = 'text';
		} else if (in_array($extension, $this->ext['spreadsheet'])) {
			$docType = 'spreadsheet';
		} else {
			$docType = 'presentation';
		}

		global $auth;
		$author = \FileRun\Users::formatFullName($auth->currentUserInfo);

		$fileSize = \FM::getFileSize($data['fullPath']);
		$fileModifTime = filemtime($data['fullPath']);
		$documentKey = substr($fileSize.md5($data['fullPath']), 0, 12).substr($fileModifTime,2,10);

		$opts = [
			'documentType' => $docType,
			"type" => "desktop",
			"document" => [
				"fileType" => $extension,
				"key" => $documentKey,
				"title" => $this->data['fileName'],
				"url" => $url,
				"info" => [
					"author" => $author,
					"owner" => $author
				]
			],
			"editorConfig" => [
				"mode" => $mode,
				"lang" => \FileRun\UI\TranslationUtils::getShortName(\FileRun\Lang::getCurrent()),
				"user" => [
					"id" => $auth->currentUserInfo['id'],
					"name" => $author,
					"firstname" => $auth->currentUserInfo['name'],
					"lastname" => $auth->currentUserInfo['name2']
				],
				"customization" => [
					"autosave" => false,
					"forcesave" => true,
					'about' => false,
					'comments' => false,
					'feedback' => false,
					'goback' => false,
					'compactHeader' => true,
					'hideRightMenu' => true,
					'toolbarNoTabs' => true,
					'zoom' => -2
				]
			],
			"events" => [
				'onError' => 'function (event) {
					if (event && docEditor) {
						docEditor.showMessage(event.data);
					}
				}'
			],
			"height" => "100%",
			"width" => "100%"
		];

		if ($saveURL) {
			$opts['editorConfig']['callbackUrl'] = $saveURL;
		}

		$secret = self::getSetting('serverSecret');
        if ($secret != '') {
            require $this->path . '/jwt/JWT.php';
            $opts['token'] = \Firebase\JWT\JWT::encode($opts, $secret);
        }

		require $this->path."/display.php";

		\FileRun\Log::add(false, "preview", [
			"relative_path" => $data['relativePath'],
			"full_path" => $data['fullPath'],
			"method" => "ONLYOFFICE"
		]);
	}

	function saveRemoteChanges() {
		$rs = @file_get_contents("php://input");
		if ($rs === false) {
			self::outputError(error_get_last()['message'], 'text');
		}
		if (!$rs) {
			self::outputError('Empty contents.', 'text');
		}
		$rs = json_decode($rs, true);
		if ($rs["status"] != 2 && $rs["status"] != 6) {
			echo json_encode(['error' => 0]);
			return false;
		}
		$contents = @file_get_contents($rs["url"]);
		if ($contents === false) {
			self::outputError(error_get_last()['message'], 'text');
		}
		if (!$contents) {
			self::outputError('Empty contents.', 'text');
		}
		$this->writeFile([
			'source' => 'string',
			'contents' => $contents,
			'logging' => ['details' => ['method' => 'ONLYOFFICE']]
		]);
		echo json_encode(['error' => 0]);
	}

	function createBlankFile() {
		$ext = \FM::getExtension($this->data['fileName']);
		if (!in_array($ext, $this->canEditTypes)) {
			jsonOutput([
				"rs" => false,
				"msg" => self::t('The file extension needs to be one of the following: %1', [implode(', ', $this->canEditTypes)])
			]);
		}
		$sourceFullPath = gluePath($this->path, 'blanks/blank.'.$ext);
		$this->writeFile([
			'source' => 'copy',
			'sourceFullPath' => $sourceFullPath,
			'logging' => ['details' => ['method' => 'ONLYOFFICE']]
		]);
		jsonFeedback(true, 'Blank file created successfully');
	}
}