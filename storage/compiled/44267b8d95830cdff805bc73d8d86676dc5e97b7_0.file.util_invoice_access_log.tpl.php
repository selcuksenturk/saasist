<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:33:26
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/util_invoice_access_log.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a6b6d64a63_31696700',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44267b8d95830cdff805bc73d8d86676dc5e97b7' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/util_invoice_access_log.tpl',
      1 => 1506420890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a6b6d64a63_31696700 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5022619655c60a6b6d3e8e1_82096932', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_5022619655c60a6b6d3e8e1_82096932 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5022619655c60a6b6d3e8e1_82096932',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Records'];?>
 <?php echo $_smarty_tpl->tpl_vars['paginator']->value['found'];?>

                        . <?php echo $_smarty_tpl->tpl_vars['_L']->value['Page'];?>
 <?php echo $_smarty_tpl->tpl_vars['paginator']->value['page'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['of'];?>
 <?php echo $_smarty_tpl->tpl_vars['paginator']->value['lastpage'];?>
. </h5>
                    


                </div>
                <div class="ibox-content" id="application_ajaxrender">


                    <table class="table table-bordered sys_table" id="sys_logs">
                        <thead>
                        <tr>

                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['IP'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Browser'];?>
</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                            <tr>

                                <td><?php echo date(($_smarty_tpl->tpl_vars['config']->value['df']).(' H:i:s'),strtotime($_smarty_tpl->tpl_vars['ds']->value['viewed_at']));?>
</td>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['cid'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['customer'];?>
</a> </td>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['iid'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['iid'];?>
</a> </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['ip'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['country'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['city'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['browser'];?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>

                    <?php echo $_smarty_tpl->tpl_vars['paginator']->value['contents'];?>


                </div>


            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}
