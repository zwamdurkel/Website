<?php
global $settings, $config;

$fileExtension = \FM::getExtension($fileName);

$chunkSize = \FileRun\Files\Utils::getUploadChunkSize();

$vars = [
	'URLRoot' => $config['url']['root'],
	'pluginURL' => $this->url,
	'folderPath' => \FM::dirname($data['relativePath']),
	'filePath' => $data['relativePath'],
	'filePathOBJ' => \FM::replaceExtension($data['relativePath'], 'obj'),
	'downloadBaseURL' => $config['url']['root'].'/?module=custom_actions&action=3d_viewer&method=download',
	'fileExtension' => $fileExtension,
	'fileNamePNG' => \FM::replaceExtension($fileName, 'png'),
	'theme' => $settings->ui_theme,
	'UploadChunkSize' => $chunkSize,
	'userCanUpload' => false,
	'windowId' => \S::fromHTML($_REQUEST['_popup_id'])
];


if (\FileRun\Perms::check('upload')) {
	if (!$data['shareInfo'] || ($data['shareInfo'] && $data['shareInfo']['perms_upload'])) {
		$vars['userCanUpload'] = true;
	}
}

if ($this->data['version']) {
	$vars['downloadBaseURL'] .= '&version='.\S::forURL($this->data['version']);
}

$requires = [
	'obj' => [
		'loaders/OBJLoader.js',
		'loaders/MTLLoader.js',
		'loaders/DDSLoader.js'
	],
	'stl' => ['loaders/STLLoader.js'],
	'fbx' => [
		'loaders/FBXLoader.js',
		'libs/inflate.min.js',
		'curves/NURBSCurve.js',
		'curves/NURBSUtils.js'
	],
	'dae' => ['loaders/ColladaLoader.js'],
	'x' => ['loaders/XLoader.js'],
	'3ds' => ['loaders/TDSLoader.js'],
	'3mf' => ['loaders/3MFLoader.js', 'libs/jszip.min.js'],
	'gltf' => [
		'loaders/GLTFLoader.js',
		'loaders/DRACOLoader.js'
	],
];
$requires['mtl'] = $requires['obj'];
$requires['glb'] = $requires['gltf'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<title><?php echo \S::safeHTML(\S::forHTML($fileName));?></title>
	<?php \FileRun\UI\CSS::insertLink();?>
	<style>
		canvas {
			width: 100%;
			height: 100%
		}
	</style>
</head>

<body>
<div id="loadMsg"><div><?php echo self::t('Loading..');?></div></div>

<script src="js/min.php?extjs=1&v=<?php echo $settings->currentVersion;?><?php if ($config['misc']['developmentMode']) {echo '&debug=1';}?>"></script>
<script src="<?php echo $this->url;?>/app.js?v=<?php echo $settings->currentVersion;?>"></script>
<script src="?module=fileman&section=utils&page=translation.js&sec=<?php echo \S::forURL(self::$localeSection)?>&lang=<?php echo \S::forURL(\FileRun\Lang::getCurrent())?>"></script>
<script src="js/jquery/croppie/canvas.toBlob.js?v=<?php echo $settings->currentVersion;?>"></script>
<script src="js/min.php?flow=1&v=<?php echo $settings->currentVersion;?><?php if ($config['misc']['developmentMode']) {echo '&debug=1';}?>"></script>
<script src="<?php echo $this->url;?>/three/three.min.js?v=<?php echo $settings->currentVersion;?>"></script>
<?php
if ($requires[$fileExtension]) {
	foreach ($requires[$fileExtension] as $req) {
		echo '<script src="'.$this->url.'/three/'.$req.'?v='.$settings->currentVersion.'"></script>';
	}
}
?>
<script src="<?php echo $this->url;?>/three/controls/OrbitControls.js?v=<?php echo $settings->currentVersion;?>"></script>
<script>
	FR.vars = <?php echo json_encode($vars); ?>
</script>
</body>
</html>