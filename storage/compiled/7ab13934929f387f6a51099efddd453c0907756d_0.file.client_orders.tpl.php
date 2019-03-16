<?php
/* Smarty version 3.1.33, created on 2019-02-21 18:18:56
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/client_orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c6f31e0671f62_45975626',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ab13934929f387f6a51099efddd453c0907756d' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/client_orders.tpl',
      1 => 1509536925,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6f31e0671f62_45975626 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1690536965c6f31e066bd89_88013053', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_client']->value));
}
/* {block "content"} */
class Block_1690536965c6f31e066bd89_88013053 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1690536965c6f31e066bd89_88013053',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="panel panel-default">

        <div class="panel-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover sys_table">
                    <thead>
                    <tr>

                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>

                        
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Order'];?>
 #</th>


                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
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

                            <td> <?php ob_start();
echo $_smarty_tpl->tpl_vars['ds']->value['date_added'];
$_prefixVariable1 = ob_get_clean();
echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_prefixVariable1));?>
 </td>

                                                            

                            
                            <td>

                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/order_view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['ds']->value['ordernum'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['ordernum'];?>
</a>

                            </td>




                            <td class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 "><?php echo $_smarty_tpl->tpl_vars['ds']->value['amount'];?>
</td>

                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Active') {?>
                                    <span class="label label-success"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['_L']->value[$_smarty_tpl->tpl_vars['ds']->value['status']]);?>
</span>
                                <?php } else { ?>
                                    <span class="label label-danger"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['_L']->value[$_smarty_tpl->tpl_vars['ds']->value['status']]);?>
</span>
                                <?php }?>
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
    </div>
<?php
}
}
/* {/block "content"} */
}
