<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:15:59
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/sms_sent.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a29f4d7281_32761613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5344b2773ccf667e46352795eff445f7d356c48c' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/sms_sent.tpl',
      1 => 1511373285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a29f4d7281_32761613 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19756543775c60a29f4d0f73_33984798', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_19756543775c60a29f4d0f73_33984798 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19756543775c60a29f4d0f73_33984798',
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
                            <th width="5%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['ID'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sent To'];?>
</th>
                            <th width="60%"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Message'];?>
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
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
</td>
                                <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['created_at']));?>
</td>
                                <td><?php echo urldecode($_smarty_tpl->tpl_vars['ds']->value['sms_to']);?>
</td>
                                <td><?php echo urldecode($_smarty_tpl->tpl_vars['ds']->value['sms']);?>
</td>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
delete/sms/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a></td>

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
