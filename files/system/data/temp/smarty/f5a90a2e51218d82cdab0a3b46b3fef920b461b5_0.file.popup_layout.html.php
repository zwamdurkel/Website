<?php
/* Smarty version 3.1.30, created on 2020-03-22 18:46:16
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/fileman/sections/default/html/pages/popup_layout.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77a468d59c18_95333923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5a90a2e51218d82cdab0a3b46b3fef920b461b5' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/fileman/sections/default/html/pages/popup_layout.html',
      1 => 1584894974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a468d59c18_95333923 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo \S::forHTML($_smarty_tpl->tpl_vars['app']->value['name']);?>
</title>
	<?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['insertCSSLink'][0][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['insertCSSLink'][0][0] : null;
if (!is_callable(array($_block_plugin1, 'insertLink'))) {
throw new SmartyException('block tag \'insertCSSLink\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('insertCSSLink', array());
$_block_repeat1=true;
echo $_block_plugin1::insertLink(array(), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
$_block_repeat1=false;
echo $_block_plugin1::insertLink(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

	<?php echo '<script'; ?>
 src="js/min.php?extjs=1<?php if ($_smarty_tpl->tpl_vars['app']->value['config']['misc']['developmentMode']) {?>&debug=1<?php }?>&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
	var URLRoot = '<?php echo $_smarty_tpl->tpl_vars['app']->value['url']['root'];?>
';
	<?php echo '</script'; ?>
>
	<?php if ($_smarty_tpl->tpl_vars['app']->value['headerContent']) {
$_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['contentTemplateFile']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>
</head>

<body id="theBODY">
<?php if (!$_smarty_tpl->tpl_vars['app']->value['headerContent']) {
$_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['contentTemplateFile']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>
</body>
</html><?php }
}
