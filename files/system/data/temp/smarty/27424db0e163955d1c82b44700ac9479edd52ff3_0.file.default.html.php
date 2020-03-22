<?php
/* Smarty version 3.1.30, created on 2020-03-22 19:07:49
  from "D:\Users\aloys\Documents\GitHub\PersonalWebsite\files/system/modules/metadata/sections/default/html/pages/default.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5e77a9753946a0_91247646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27424db0e163955d1c82b44700ac9479edd52ff3' => 
    array (
      0 => 'D:\\Users\\aloys\\Documents\\GitHub\\PersonalWebsite\\files/system/modules/metadata/sections/default/html/pages/default.html',
      1 => 1584894974,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a9753946a0_91247646 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
FR = { };
FR.filename = '<?php echo \S::safeJS(\S::forHTML($_smarty_tpl->tpl_vars['app']->value['filename']));?>
';
FR.path = '<?php echo \S::safeJS(\S::forHTML($_smarty_tpl->tpl_vars['app']->value['path']));?>
';
FR.filetypes = <?php echo $_smarty_tpl->tpl_vars['app']->value['fileTypes'];?>
;
FR.popupId = '<?php echo $_smarty_tpl->tpl_vars['app']->value['popupId'];?>
';
FR.selectedFileType = '<?php echo $_smarty_tpl->tpl_vars['app']->value['fileTypeId'];?>
';
FR.data = <?php echo $_smarty_tpl->tpl_vars['app']->value['data'];?>
;
FR.editable = <?php if ($_smarty_tpl->tpl_vars['app']->value['editable']) {?>true<?php } else { ?>false<?php }?>;
FR.UI = { translations: [] };
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="?module=fileman&section=utils&v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
&sec=Metadata&lang=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['language']);?>
&page=translation.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/ext/ux/SuperBoxSelect.min.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/fileman/metadata.js?v=<?php echo \S::forURL($_smarty_tpl->tpl_vars['app']->value['settings']['currentVersion']);?>
"><?php echo '</script'; ?>
>
<style>.x-fieldset { border: none; }</style><?php }
}
