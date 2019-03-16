<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:03:21
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_plans.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c609fa94a53c3_10990282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3770451d24c1fba0f4445e0651582082860667b' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_plans.tpl',
      1 => 1549836184,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c609fa94a53c3_10990282 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5315187295c609fa949cd49_28711220', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2875210905c609fa94a34a2_91020642', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_5315187295c609fa949cd49_28711220 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5315187295c609fa949cd49_28711220',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Plans'];?>
</h3>

                    <a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/plan"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add plan'];?>
</a>
                    <div class="hr-line-dashed"></div>

                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Billing period'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'plan');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
?>

                            <tr>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/plan/<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['plan']->value->name;?>
</a>
                                </td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['plan']->value->billing_period;?>

                                </td>
                                <td class="text-right">
                                    <?php echo round($_smarty_tpl->tpl_vars['plan']->value->price,2);?>

                                </td>

                                <td class="text-right">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/plan/<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/plan-delete/<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
                                </td>

                            </tr>

                            <?php
}
} else {
?>

                            <tr>
                                <td colspan="4" class="text-center"><?php echo $_smarty_tpl->tpl_vars['_L']->value['No Data Available'];?>
</td>
                            </tr>

                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                    </table>

                </div>
            </div>
        </div>
    </div>

<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_2875210905c609fa94a34a2_91020642 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_2875210905c609fa94a34a2_91020642',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/numeric.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>

        $(function () {
            $('.amount').autoNumeric('init', {

                aSign: '<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 ',
                dGroup: <?php echo $_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'];?>
,
                aPad: <?php echo $_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'];?>
,
                pSign: '<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
',
                aDec: '<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
',
                aSep: '<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
',
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'

            });
        });

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
