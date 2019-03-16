<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:07:35
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/accounts_balances.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a0a7a38177_69674319',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd37fdef9a9df9632fbfc2e20442c89d342bab0db' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/accounts_balances.tpl',
      1 => 1546548746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a0a7a38177_69674319 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10773302775c60a0a7a320a5_83548866', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19766055145c60a0a7a37369_55941914', 'script');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_10773302775c60a0a7a320a5_83548866 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10773302775c60a0a7a320a5_83548866',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Financial Balances'];?>
</h5>

                </div>
                <div class="ibox-content">




                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
?>
                            <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Balance'];?>
 [ <?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
 ]</th>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['accounts']->value, 'account');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['account']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['account']->value->account;?>
</td>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
?>

                                    <td class="text-right amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['currency']->value->symbol;?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" ><?php echo Account::getBalance($_smarty_tpl->tpl_vars['account']->value->id,$_smarty_tpl->tpl_vars['currency']->value->id);?>
</td>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tr>
                        <?php
}
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
class Block_19766055145c60a0a7a37369_55941914 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_19766055145c60a0a7a37369_55941914',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/lib/numeric.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        jQuery(document).ready(function() {



            $('.amount').autoNumeric('init', {
                dGroup: 3,
                aPad: true,
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
