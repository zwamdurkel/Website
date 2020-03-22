<?php
/* Smarty version 3.1.30, created on 2020-03-22 17:39:13
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/users/sections/cpanel/html/add.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e7794b1590ec0_74860032',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b4568ade5e4f5d475fb1d36315a32d5bfb8de00' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/users/sections/cpanel/html/add.html',
      1 => 1584894975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7794b1590ec0_74860032 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
FR.roles = <?php echo $_smarty_tpl->tpl_vars['app']->value['roles'];?>
;
FR.FileRunInstallPath = '<?php echo \S::forHTML($_smarty_tpl->tpl_vars['app']->value['config']['path']['root']);?>
';
FR.adminHomeFolderPath = '<?php echo \S::forHTML($_smarty_tpl->tpl_vars['app']->value['user']['perms']['homefolder']);?>
';
FR.settings = {
	disable_file_history: <?php if ($_smarty_tpl->tpl_vars['app']->value['settings']['disable_file_history']) {?>true<?php } else { ?>false<?php }?>
};
FR.currentUserPerms = {
	admin_homefolder_template: <?php if ($_smarty_tpl->tpl_vars['app']->value['user']['perms']['admin_homefolder_template']) {?>true<?php } else { ?>false<?php }?>
}
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Users&calendar=1&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/add_user.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
