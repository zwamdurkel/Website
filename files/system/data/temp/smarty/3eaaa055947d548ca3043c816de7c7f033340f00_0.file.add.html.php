<?php
/* Smarty version 3.1.30, created on 2020-03-22 17:41:06
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/user_roles/sections/cpanel/html/add.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e779522a61e71_63161394',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3eaaa055947d548ca3043c816de7c7f033340f00' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/user_roles/sections/cpanel/html/add.html',
      1 => 1584894975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e779522a61e71_63161394 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
FR.userCanSetHomeFolder = <?php if ($_smarty_tpl->tpl_vars['app']->value['can_set_homefolder']) {?>false<?php } else { ?>true<?php }?>;
FR.adminHomeFolderPath = '<?php echo \S::forHTML($_smarty_tpl->tpl_vars['app']->value['user']['perms']['homefolder']);?>
';
FR.settings = {
	disable_file_history: <?php if ($_smarty_tpl->tpl_vars['app']->value['settings']['disable_file_history']) {?>true<?php } else { ?>false<?php }?>
};
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Roles&sec2=Admin%3A%20Users&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/add_role.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
