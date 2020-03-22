<?php
/* Smarty version 3.1.30, created on 2020-03-22 18:43:30
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/software_update/sections/cpanel/html/default.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77a3c20edd56_58191206',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30e483520e84c305d8725882466aa5e145278573' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/software_update/sections/cpanel/html/default.html',
      1 => 1584894975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a3c20edd56_58191206 (Smarty_Internal_Template $_smarty_tpl) {
echo smarty_function_lang(array('section'=>"Admin: Settings"),$_smarty_tpl);?>

<?php echo '<script'; ?>
>
FR.currentVersion = '<?php echo $_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion'];?>
';
FR.uploadChunkSize = <?php echo $_smarty_tpl->tpl_vars['app']->value['upload_chunk_size'];?>
;
ScriptMgr.load({ scripts:[
	'?module=fileman&section=utils&sec=Admin%3A%20Software update&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&page=translation.js',
	'js/cpanel/software_update.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
'
]});
<?php echo '</script'; ?>
><?php }
}
