<?php
/* Smarty version 3.1.30, created on 2020-03-22 18:42:35
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/cpanel/sections/settings/html/pages/guest_users.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77a38bc63240_32588596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1af7239d93caf1bf442a66ec2be1609d7dd3c235' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/cpanel/sections/settings/html/pages/guest_users.html',
      1 => 1584894974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a38bc63240_32588596 (Smarty_Internal_Template $_smarty_tpl) {
echo smarty_function_lang(array('section'=>"Admin: Settings"),$_smarty_tpl);?>

<?php echo '<script'; ?>
>
FR.settings = <?php echo $_smarty_tpl->tpl_vars['app']->value['AllSettings'];?>
;
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&secAdmin%3A%20Guest%20Users&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/settings_guest_users.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
