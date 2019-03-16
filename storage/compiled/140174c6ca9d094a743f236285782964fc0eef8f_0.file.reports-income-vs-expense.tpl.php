<?php
/* Smarty version 3.1.33, created on 2019-03-07 08:07:37
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/reports-income-vs-expense.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c811799618912_43510856',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '140174c6ca9d094a743f236285782964fc0eef8f' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/reports-income-vs-expense.tpl',
      1 => 1546551798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c811799618912_43510856 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18787988955c811799610c83_14012685', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13221939645c811799617dd2_97693072', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_18787988955c811799610c83_14012685 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18787988955c811799610c83_14012685',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Reports Income Vs Expense'];?>
 </h5>

                </div>
                <div class="ibox-content">


                    <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Vs Expense'];?>
</h3>
                    <hr>
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Income'];?>
: <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
"><?php echo $_smarty_tpl->tpl_vars['ai']->value;?>
</span></h4>
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Expense'];?>
: <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
"><?php echo $_smarty_tpl->tpl_vars['ae']->value;?>
</span></h4>
                    <hr>
                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Income minus Expense'];?>
 = <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
"><?php echo $_smarty_tpl->tpl_vars['aime']->value;?>
</span>
                    <hr>
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Income This Month'];?>
: <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
"><?php echo $_smarty_tpl->tpl_vars['mi']->value;?>
</span></h4>
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Expense This Month'];?>
: <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
"><?php echo $_smarty_tpl->tpl_vars['me']->value;?>
</span></h4>
                    <hr>
                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Income minus Expense'];?>
 = <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
"><?php echo $_smarty_tpl->tpl_vars['mime']->value;?>
</span>
                    <hr>



                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Vs Expense This Year'];?>
</h4>
                    <hr>
                    <div id="placeholder" class="flot-placeholder"></div>
                    <hr>


                </div>
            </div>
        </div>


    </div>

<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_13221939645c811799617dd2_97693072 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_13221939645c811799617dd2_97693072',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/flot/jquery.flot.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/flot/jquery.flot.resize.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/flot/jquery.flot.categories.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/numeric.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
