<?php
/* Smarty version 3.1.30, created on 2020-03-22 18:44:35
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/cpanel/sections/settings/html/pages/license.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77a4038932d9_12110564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f959691bf89acaa62e3bc1d124f33364156f9ee8' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/cpanel/sections/settings/html/pages/license.html',
      1 => 1584894974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a4038932d9_12110564 (Smarty_Internal_Template $_smarty_tpl) {
echo smarty_function_lang(array('section'=>"Admin: Licensing"),$_smarty_tpl);?>

<?php echo '<script'; ?>
>
	var licenseInfo = {
		users: {
			current: <?php echo $_smarty_tpl->tpl_vars['app']->value['licenseInfo']['currentNrOfUsers'];?>
,
			maximum: <?php if ($_smarty_tpl->tpl_vars['app']->value['licenseInfo']['availableNr'] > 9999) {?>'<?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['t'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['t'][0] : null;
if (!is_callable($_block_plugin1)) {
throw new SmartyException('block tag \'t\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('t', array());
$_block_repeat1=true;
echo $_block_plugin1(array(), null, $_smarty_tpl, $_block_repeat1);
while ($_block_repeat1) {
ob_start();
?>
unlimited<?php $_block_repeat1=false;
echo $_block_plugin1(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat1);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
'<?php } else {
echo $_smarty_tpl->tpl_vars['app']->value['licenseInfo']['availableNr'];
}?>
		},
		expiry: <?php if ($_smarty_tpl->tpl_vars['app']->value['licenseInfo']['expiry']) {?>'<?php echo $_smarty_tpl->tpl_vars['app']->value['licenseInfo']['expiry'];?>
'<?php } else { ?>false<?php }?>,
		key: '<?php echo $_smarty_tpl->tpl_vars['app']->value['licenseInfo']['key'];?>
'
	};
	var userEmail = '<?php echo \S::safeJS(\S::safeHTML($_smarty_tpl->tpl_vars['app']->value['userEmail']));?>
';
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Licensing&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/licensing.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
