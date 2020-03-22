<?php
global $app, $settings, $config;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo \S::safeHTML(\S::forHTML($this->data['fileName']));?></title>
	<?php \FileRun\UI\CSS::insertLink();?>
	<link rel="stylesheet" href="<?php echo $this->url;?>/style.css?v=<?php echo $settings->currentVersion;?>" />
	<script src="js/min.php?extjs=1&v=<?php echo $settings->currentVersion;?><?php if ($config['misc']['developmentMode']) {echo '&debug=1';}?>"></script>
	<script src="<?php echo $this->url;?>/app.js?v=<?php echo $settings->currentVersion;?>"></script>
	<script src="?module=fileman&section=utils&page=translation.js&sec=<?php echo S::forURL("Custom Actions: Zamzar")?>&lang=<?php echo S::forURL(\FileRun\Lang::getCurrent())?>"></script>
	<script>
		var URLRoot = '<?php echo S::safeJS($config['url']['root'])?>';
		var path = '<?php echo S::safeJS($this->data['relativePath'])?>';
		var windowId = '<?php echo S::safeJS(S::fromHTML($_REQUEST['_popup_id']))?>';
	</script>
	<style>.ext-el-mask { background-color: white; }</style>
</head>

<body>
<div id="selectFormat">
	<div style="clear:both;margin:10px;">
		<?php
		if (sizeof($rs['targets']) > 0){
			echo self::t('Convert "%1" to:', [S::safeHTML($this->data['fileName'])]);
		} else {
			echo self::t('No conversion option found for the "%1" file type.', [strtoupper(S::safeHTML($ext))]);
		}
		?>
	</div>
	<div style="max-width:600px">
	<?php
	foreach ($rs['targets'] as $format) {
		?>
		<div class="format" data-format="<?php echo S::safeHTML($format['name']);?>">
		<img src="<?php echo \FM::getFileIconURL(false, $format['name']);?>" width="96" height="96" border="0" />
			<?php echo S::safeHTML(strtoupper($format['name']));?>
		</div>
	<?php
	}
	?>
	</div>
</div>
</body>
</html>