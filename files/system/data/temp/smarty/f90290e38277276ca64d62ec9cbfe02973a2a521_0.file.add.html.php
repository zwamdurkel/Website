<?php
/* Smarty version 3.1.30, created on 2020-03-22 17:41:20
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/user_groups/sections/cpanel/html/add.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e779530af74b3_59583151',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f90290e38277276ca64d62ec9cbfe02973a2a521' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/user_groups/sections/cpanel/html/add.html',
      1 => 1584894975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e779530af74b3_59583151 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Groups&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/add_group.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
