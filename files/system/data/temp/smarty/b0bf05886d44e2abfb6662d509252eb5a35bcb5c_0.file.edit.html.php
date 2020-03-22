<?php
/* Smarty version 3.1.30, created on 2020-03-22 17:37:46
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/users/sections/cpanel/html/edit.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77945a930515_21171533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0bf05886d44e2abfb6662d509252eb5a35bcb5c' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/users/sections/cpanel/html/edit.html',
      1 => 1584894975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77945a930515_21171533 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
FR.roles = <?php echo $_smarty_tpl->tpl_vars['app']->value['roles'];?>
;
FR.userInfo = <?php echo $_smarty_tpl->tpl_vars['app']->value['userInfo'];?>
;
FR.settings = {
	disable_file_history: <?php if ($_smarty_tpl->tpl_vars['app']->value['settings']['disable_file_history']) {?>true<?php } else { ?>false<?php }?>
};
FR.FileRunInstallPath = '<?php echo \S::forHTML($_smarty_tpl->tpl_vars['app']->value['config']['path']['root']);?>
';
FR.adminHomeFolderPath = '<?php echo \S::forHTML($_smarty_tpl->tpl_vars['app']->value['user']['perms']['homefolder']);?>
';
FR.currentUserPerms = {
	admin_homefolder_template: <?php if ($_smarty_tpl->tpl_vars['app']->value['user']['perms']['admin_homefolder_template']) {?>true<?php } else { ?>false<?php }?>
}
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Users&calendar=1&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/edit_user.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
