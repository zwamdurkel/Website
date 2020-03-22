<?php
/* Smarty version 3.1.30, created on 2020-03-22 18:42:36
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/cpanel/sections/settings/html/pages/login_registration.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77a38c51bd67_87652656',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ed200228b5f6aa78802668b2f652a58b1666314' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/cpanel/sections/settings/html/pages/login_registration.html',
      1 => 1584894974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a38c51bd67_87652656 (Smarty_Internal_Template $_smarty_tpl) {
echo smarty_function_lang(array('section'=>"Admin: Settings"),$_smarty_tpl);?>

<?php echo '<script'; ?>
>
FR.pluginsInfo = <?php echo $_smarty_tpl->tpl_vars['app']->value['pluginsInfo'];?>
;
FR.settings = <?php echo $_smarty_tpl->tpl_vars['app']->value['AllSettings'];?>
;
FR.roles = <?php echo $_smarty_tpl->tpl_vars['app']->value['roles'];?>
;
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Setup&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/settings_login_registration.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
