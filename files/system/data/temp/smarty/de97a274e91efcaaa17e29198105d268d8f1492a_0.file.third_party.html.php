<?php
/* Smarty version 3.1.30, created on 2020-03-22 18:43:28
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/cpanel/sections/settings/html/pages/third_party.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77a3c00dd7f2_95615690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de97a274e91efcaaa17e29198105d268d8f1492a' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/cpanel/sections/settings/html/pages/third_party.html',
      1 => 1584894974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a3c00dd7f2_95615690 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
FR.settings = <?php echo $_smarty_tpl->tpl_vars['app']->value['AllSettings'];?>
;
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Setup&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/settings_third_party.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
