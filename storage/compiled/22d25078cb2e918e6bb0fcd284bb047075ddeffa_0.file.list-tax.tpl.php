<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:45:48
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/list-tax.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a99cab2734_69627016',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22d25078cb2e918e6bb0fcd284bb047075ddeffa' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/list-tax.tpl',
      1 => 1514993627,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a99cab2734_69627016 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17544614785c60a99caa9c31_38882534', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_17544614785c60a99caa9c31_38882534 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17544614785c60a99caa9c31_38882534',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sales Taxes'];?>
 </h5>
        </div>
        <div class="ibox-content">
            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/add-tax/" id="item_add" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Tax'];?>
 </a>
            <hr>
            <table class="table table-bordered table-hover sys_table">
                <thead>
                <tr>
                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tax Rate'];?>
</th>

                    <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                    <tr id="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
">
                        <td> <?php if ($_smarty_tpl->tpl_vars['ds']->value['is_default'] == '1') {?> <label class="label label-success label-sm">Default</label> <?php }?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['name'];?>
 </td>
                        <td>
                                                                                                                                                    

                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['rate'] == '0.000' || $_smarty_tpl->tpl_vars['ds']->value['rate'] == '0.00') {?>
                                0%
                                <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['rate'] == '5.000') {?>
                                5%
                                <?php } else { ?>
                                <?php echo $_smarty_tpl->tpl_vars['ds']->value['rate'];?>
%
                            <?php }?>



                        </td>
                        <td>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/edit-tax/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-info btn-xs edit"><i class="fa fa-pencil"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
 </a>


                            <?php if ($_smarty_tpl->tpl_vars['ds']->value['is_default'] != '1') {?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/tax-make-default/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs mdef"><i class="fa fa-star"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Make Default'];?>
 </a>
                            <?php }?>
                            <button type="button" id="t<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-danger btn-xs cdelete"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
 </button>
                        </td>

                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                </tbody>
            </table>

        </div>
    </div>
    <input type="hidden" id="_lan_are_you_sure" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
">
<?php
}
}
/* {/block "content"} */
}
