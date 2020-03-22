<?php
/* Smarty version 3.1.30, created on 2020-03-22 19:00:55
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/cpanel/sections/settings/html/pages/file_search.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77a7d71a8212_36304758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44aad1295b3674ca0590901152cb3166cd7c7a16' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/cpanel/sections/settings/html/pages/file_search.html',
      1 => 1584894974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a7d71a8212_36304758 (Smarty_Internal_Template $_smarty_tpl) {
echo smarty_function_lang(array('section'=>"Admin: Settings"),$_smarty_tpl);?>

<?php echo '<script'; ?>
>
FR.settings = <?php echo $_smarty_tpl->tpl_vars['app']->value['AllSettings'];?>
;
FR.stats = <?php echo $_smarty_tpl->tpl_vars['app']->value['stats'];?>
;
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Setup&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/forms/settings_file_search.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
