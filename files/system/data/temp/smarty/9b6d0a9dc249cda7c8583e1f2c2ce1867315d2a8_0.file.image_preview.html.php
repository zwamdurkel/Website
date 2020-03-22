<?php
/* Smarty version 3.1.30, created on 2020-03-22 18:44:25
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/cpanel/sections/settings/html/pages/image_preview.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77a3f916cf62_76316603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b6d0a9dc249cda7c8583e1f2c2ce1867315d2a8' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/cpanel/sections/settings/html/pages/image_preview.html',
      1 => 1584894974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a3f916cf62_76316603 (Smarty_Internal_Template $_smarty_tpl) {
echo smarty_function_lang(array('section'=>"Admin: Settings"),$_smarty_tpl);?>

<?php echo '<script'; ?>
>
FR.settings = <?php echo $_smarty_tpl->tpl_vars['app']->value['AllSettings'];?>
;
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Setup&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/settings_image_preview.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
