<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:33:15
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/reports_invoices_expense.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a6aba7cf94_91697289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a1c47bc68faebd590bc1ae71de402d9f2cf055b' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/reports_invoices_expense.tpl',
      1 => 1518124671,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a6aba7cf94_91697289 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18874198045c60a6aba6da80_12341889', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2534282735c60a6aba6f366_39268053', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_18874198045c60a6aba6da80_12341889 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18874198045c60a6aba6da80_12341889',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices'];?>
</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">


                    <div class="containerInvoicesVsExpense" id="containerInvoicesVsExpense" style="min-height: 450px;"></div>

                </div>
            </div>
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_2534282735c60a6aba6f366_39268053 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_2534282735c60a6aba6f366_39268053',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/chartjs.min.js?ver=<?php echo $_smarty_tpl->tpl_vars['file_build']->value;?>
"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>

        jQuery(document).ready(function() {


            var containerInvoicesVsExpense = document.getElementById("containerInvoicesVsExpense");
            var chartInvoicesVsExpense = echarts.init(containerInvoicesVsExpense);


            var optionInvoicesVsExpense = {
                title: {
                    text: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices Vs Expense'];?>
'
                },
                tooltip : {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'cross',
                        label: {
                            backgroundColor: '#6a7985'
                        }
                    }
                },
                legend: {
                    data:['<?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Invoice'];?>
','<?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Paid'];?>
','<?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Expense'];?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['expense_type_1'];?>
','<?php echo $_smarty_tpl->tpl_vars['config']->value['expense_type_2'];?>
']
                },
                toolbox: {
                    feature: {
                        saveAsImage: {}
                    }
                },
                grid: {
                    left: '2%',
                    right: '2%',
                    bottom: '15%',
                    containLabel: true
                },
                xAxis : [
                    {
                        type : 'category',
                        boundaryGap : false,
                        data : [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m']->value['display'], 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                            '<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
',
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>],
                        axisTick: {
                            alignWithLabel: true
                        },
                        axisLabel : {
                            rotate : 45,
                            interval : 0
                        }
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : [
                    {
                        name:'<?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Invoice'];?>
',
                        type:'line',
                        stack: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
',
                        areaStyle: { normal: {

                        }
                        },
                        data:[
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m']->value['invoice_total'], 'd_invoice_total');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d_invoice_total']->value) {
?>
                            <?php echo $_smarty_tpl->tpl_vars['d_invoice_total']->value;?>
,
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        ]
                    },
                    {
                        name:'<?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Paid'];?>
',
                        type:'line',
                        stack: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
',
                        areaStyle: { normal: {

                        } },
                        data:[
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m']->value['invoice_paid'], 'd_invoice_paid');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d_invoice_paid']->value) {
?>
                            <?php echo $_smarty_tpl->tpl_vars['d_invoice_paid']->value;?>
,
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        ]
                    },
                    {
                        name:'<?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Expense'];?>
',
                        type:'line',
                        stack: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
',
                        areaStyle: { normal: {

                        } },
                        data:[
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m']->value['expense_total'], 'd_expense_total');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d_expense_total']->value) {
?>
                            <?php echo $_smarty_tpl->tpl_vars['d_expense_total']->value;?>
,
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        ]
                    },
                    {
                        name:'<?php echo $_smarty_tpl->tpl_vars['config']->value['expense_type_1'];?>
',
                        type:'line',
                        stack: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
',
                        areaStyle: { normal: {

                        } },
                        data:[
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m']->value['expense_type_1'], 'd_expense_type_1');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d_expense_type_1']->value) {
?>
                            <?php echo $_smarty_tpl->tpl_vars['d_expense_type_1']->value;?>
,
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        ]
                    },
                    {
                        name:'<?php echo $_smarty_tpl->tpl_vars['config']->value['expense_type_2'];?>
',
                        type:'line',
                        stack: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
',
                        label: {
                            normal: {
                                show: true,
                                position: 'top'
                            }
                        },
                        areaStyle: { normal: {

                        } },
                        data:[
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m']->value['expense_type_2'], 'd_expense_type_2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d_expense_type_2']->value) {
?>
                            <?php echo $_smarty_tpl->tpl_vars['d_expense_type_2']->value;?>
,
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        ]
                    }
                ]
            };


            chartInvoicesVsExpense.setOption(optionInvoicesVsExpense, true);



        });



    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
