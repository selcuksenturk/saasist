<?php
/* Smarty version 3.1.33, created on 2019-06-03 05:43:29
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/contacts_orders.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf4ebc1225382_75318381',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07b14d3b06b006fe34cc40719646e701aff6b735' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/contacts_orders.tpl',
      1 => 1556695881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf4ebc1225382_75318381 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
orders/add/" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New Order'];?>
</a>

    <hr>

    <table class="table table-bordered table-hover sys_table">
        <thead>
        <tr>
            <th>#</th>
            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Order'];?>
 #</th>
            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
</th>
            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
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

                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
orders/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
</a> </td>
                <td>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
orders/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['ordernum'];?>
</a>

                </td>

                <td> <?php ob_start();
echo $_smarty_tpl->tpl_vars['ds']->value['date_added'];
$_prefixVariable1 = ob_get_clean();
echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_prefixVariable1));?>
 </td>
                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['cname'];?>
</td>

                <td>
                    <?php echo $_smarty_tpl->tpl_vars['ds']->value['amount'];?>


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


<?php }
}
