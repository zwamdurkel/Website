<?php
/* Smarty version 3.1.30, created on 2020-03-22 19:00:59
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/cpanel/sections/settings/html/pages/files.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77a7db1fec87_21664989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a6b9d08467dfa165feec8bc7cf656cbbf5556db' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/cpanel/sections/settings/html/pages/files.html',
      1 => 1584894974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a7db1fec87_21664989 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
FR.settings = <?php echo $_smarty_tpl->tpl_vars['app']->value['AllSettings'];?>
;
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Setup&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/settings_files.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
