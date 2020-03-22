<?php
/* Smarty version 3.1.30, created on 2020-03-22 17:41:52
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/user_groups/sections/cpanel/html/edit.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e779550bf0b36_30292457',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c096f59f2ae44ca99c293f0c10949e2b7064ba2a' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/user_groups/sections/cpanel/html/edit.html',
      1 => 1584894975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e779550bf0b36_30292457 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
FR.groupInfo = <?php echo $_smarty_tpl->tpl_vars['app']->value['groupInfo'];?>
;
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Groups&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/edit_group.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
