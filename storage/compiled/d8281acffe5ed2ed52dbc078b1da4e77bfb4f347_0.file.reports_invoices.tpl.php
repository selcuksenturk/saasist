<?php
/* Smarty version 3.1.33, created on 2019-03-07 07:52:16
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/reports_invoices.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c811400bca111_57612000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8281acffe5ed2ed52dbc078b1da4e77bfb4f347' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/reports_invoices.tpl',
      1 => 1538429398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c811400bca111_57612000 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11888611525c811400badea1_67069381', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2800636025c811400bc6f46_98308904', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_11888611525c811400badea1_67069381 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11888611525c811400badea1_67069381',
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
            <div class="ibox float-e-margins">
                <div class="ibox-title">


                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoices'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_L']->value['Paid'];?>
 [ <?php echo $_smarty_tpl->tpl_vars['_L']->value['Last 12 Months'];?>
 ]

                    <div class="ibox-tools">

                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/add/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Invoice'];?>
</a>

                    </div>
                </div>
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-9">
                            <div class="container_sales_chart" id="container_sales_chart" style="min-height: 450px;"></div>
                        </div>
                        <div class="col-md-3">
                            <a class="dashboard-stat green" href="javascript:void(0);">
                                <div class="visual">
                                    <i class="icon-credit-card-1"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span class="amount"><?php echo $_smarty_tpl->tpl_vars['total_invoice']->value;?>
</span>
                                    </div>
                                    <div class="desc text-right"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Invoice'];?>
 </div>
                                </div>
                            </a>

                            <?php if ($_smarty_tpl->tpl_vars['all_data']->value) {?>
                                <a class="dashboard-stat purple" href="javascript:void(0);">
                                    <div class="visual">
                                        <i class="fa fa-cubes"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="amount"><?php echo $_smarty_tpl->tpl_vars['total_invoice_items']->value;?>
</span>
                                        </div>
                                        <div class="desc text-right"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Sales Count'];?>
 </div>
                                    </div>
                                </a>
                            <?php }?>

                            <a class="dashboard-stat blue" href="javascript:void(0);">
                                <div class="visual">
                                    <i class="fa fa-calculator"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span class="amount"><?php echo $_smarty_tpl->tpl_vars['total_invoice_amount']->value;?>
</span>
                                    </div>
                                    <div class="desc text-right"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Amount'];?>
 </div>
                                </div>
                            </a>
                        </div>
                    </div>



                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Recent Invoices'];?>
</h4>

                    <?php if ($_smarty_tpl->tpl_vars['view_type']->value == 'filter') {?>
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="fa fa-search"></span>
                                        </div>
                                        <input type="text" name="name" id="foo_filter" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..."/>

                                    </div>
                                </div>

                            </div>
                        </form>
                    <?php }?>


                    <table class="table table-bordered table-hover sys_table footable" <?php if ($_smarty_tpl->tpl_vars['view_type']->value == 'filter') {?> data-filter="#foo_filter" data-page-size="50" <?php }?>>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Date'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
</th>
                            <th>
                                <?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>

                            </th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</th>
                            <th class="text-right" width="120px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
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
                                <td  data-value="<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['invoicenum'];
if ($_smarty_tpl->tpl_vars['ds']->value['cn'] != '') {?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['cn'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
 <?php }?></a> </td>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['userid'];?>
/"><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</a> </td>
                                <td class="amount" data-a-sign="<?php if ($_smarty_tpl->tpl_vars['ds']->value['currency_symbol'] == '') {?> <?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['currency_symbol'];
}?> "><?php echo $_smarty_tpl->tpl_vars['ds']->value['total'];?>
</td>
                                <td data-value="<?php echo strtotime($_smarty_tpl->tpl_vars['ds']->value['date']);?>
"><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                                <td data-value="<?php echo strtotime($_smarty_tpl->tpl_vars['ds']->value['duedate']);?>
"><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['duedate']));?>
</td>
                                <td>

                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Unpaid') {?>
                                        <span class="label label-danger"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Paid') {?>
                                        <span class="label label-success"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Partially Paid') {?>
                                        <span class="label label-info"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['ds']->value['status'] == 'Cancelled') {?>
                                        <span class="label"><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>
</span>
                                    <?php } else { ?>
                                        <?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['status']);?>

                                    <?php }?>



                                </td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['r'] == '0') {?>
                                        <span class="label label-default"><i class="fa fa-dot-circle-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Onetime'];?>
</span>
                                    <?php } else { ?>
                                        <span class="label label-default"><i class="fa fa-repeat"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Recurring'];?>
</span>
                                    <?php }?>
                                </td>
                                <td class="text-right">

                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/view/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
"><i class="fa fa-file-text-o"></i></a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/clone/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Clone'];?>
"><i class="fa fa-files-o"></i></a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
invoices/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
/" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger btn-xs cdelete" id="iid<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
"><i class="fa fa-trash"></i></a>


                                </td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </tbody>

                        <?php if ($_smarty_tpl->tpl_vars['view_type']->value == 'filter') {?>
                            <tfoot>
                            <tr>
                                <td colspan="8">
                                    <ul class="pagination">
                                    </ul>
                                </td>
                            </tr>
                            </tfoot>
                        <?php }?>

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
/* {block "script"} */
class Block_2800636025c811400bc6f46_98308904 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_2800636025c811400bc6f46_98308904',
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

            var container_sales_chart = document.getElementById("container_sales_chart");
            var salesChart = echarts.init(container_sales_chart);

            var salesChartOption;

            salesChartOption = {
                color: ['#2196f3'],
                tooltip : {
                    trigger: 'axis',
                    axisPointer : {
                        type : 'shadow'
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
                        data : [
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m']->value['display'], 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
                            '<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
',
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        ],
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
                        name:'<?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
',
                        type:'bar',
                        barWidth: '60%',
                        data:[
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m']->value['data'], 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>
                            <?php echo $_smarty_tpl->tpl_vars['d']->value;?>
,
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        ]
                    }
                ]
            };

            salesChart.setOption(salesChartOption, true);


        });



    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
