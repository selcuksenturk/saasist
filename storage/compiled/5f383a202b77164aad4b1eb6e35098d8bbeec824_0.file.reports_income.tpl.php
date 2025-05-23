<?php
/* Smarty version 3.1.33, created on 2019-06-10 06:43:35
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/reports_income.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfe3457a5e237_72272062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f383a202b77164aad4b1eb6e35098d8bbeec824' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/reports_income.tpl',
      1 => 1556695882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfe3457a5e237_72272062 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17448800905cfe3457a48421_47514149', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16705794575cfe3457a57722_98407871', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_17448800905cfe3457a48421_47514149 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17448800905cfe3457a48421_47514149',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">


        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Reports'];?>
 </h5>

                </div>
                <div class="ibox-content">

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
?>

                        <div class="row">
                            <div class="col-md-12">
                                <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income Summary'];?>
 [ <?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
 ]</h4>
                            </div>
                            <div class="col-md-3">
                                <a class="dashboard-stat blue" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/deposit/">
                                    <div class="visual">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['currency']->value->symbol;?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
"><?php echo $_smarty_tpl->tpl_vars['total_income_all_time']->value;?>
</span>
                                        </div>
                                        <div class="desc"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Income'];?>
 </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="dashboard-stat blue" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/deposit/">
                                    <div class="visual">
                                        <i class="fa fa-line-chart"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="amount" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['currency']->value->symbol;?>
 "><?php echo Transaction::totalAmount('Income',$_smarty_tpl->tpl_vars['currency']->value->id,'current_month',$_smarty_tpl->tpl_vars['all_data']->value);?>
</span>
                                        </div>
                                        <div class="desc"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Income This Month'];?>
 </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="dashboard-stat blue" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/deposit/">
                                    <div class="visual">
                                        <i class="fa fa-calculator"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="amount" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['currency']->value->symbol;?>
 "><?php echo Transaction::totalAmount('Income',$_smarty_tpl->tpl_vars['currency']->value->id,'current_week',$_smarty_tpl->tpl_vars['all_data']->value);?>
</span>
                                        </div>
                                        <div class="desc"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Income This Week'];?>
 </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="dashboard-stat blue" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/deposit/">
                                    <div class="visual">
                                        <i class="fa fa-columns"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span class="amount" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['currency']->value->symbol;?>
 "><?php echo Transaction::totalAmount('Income',$_smarty_tpl->tpl_vars['currency']->value->id,'last_30_days',$_smarty_tpl->tpl_vars['all_data']->value);?>
</span>
                                        </div>
                                        <div class="desc"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Income Last 30 days'];?>
 </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                    <hr>
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Last 20 deposit Income'];?>
</h4>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Category'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Payer'];?>
</th>



                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>

                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cr'];?>
</th>


                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                            <tr>
                                <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['ds']->value['date']));?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                                <td><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['ds']->value['type']);?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['ds']->value['category'] == 'Uncategorized') {
echo $_smarty_tpl->tpl_vars['_L']->value['Uncategorized'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['ds']->value['category'];?>
 <?php }?></td>
                                <td class="text-right amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['currency']->value->symbol;?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" ><?php echo $_smarty_tpl->tpl_vars['ds']->value['amount'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['payer'];?>
</td>



                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['description'];?>
</td>

                                <td class="text-right amount" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['currency']->value->symbol;?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
"><?php echo $_smarty_tpl->tpl_vars['ds']->value['cr'];?>
</td>


                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                    </table>
                    <hr>

                    <div id="placeholder" class="flot-placeholder"></div>
                    <hr>

                    <h4>Income by Categories</h4>

                    <div id="catChart" style="min-height: 500px;"></div>

                </div>
            </div>
        </div>

        <!-- Widget-2 end-->
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_16705794575cfe3457a57722_98407871 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_16705794575cfe3457a57722_98407871',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/lib/numeric.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/chartjs.min.js?ver=<?php echo $_smarty_tpl->tpl_vars['file_build']->value;?>
"><?php echo '</script'; ?>
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


            var myChart = echarts.init(document.getElementById('placeholder'));

            // specify chart configuration item and data
            var option = {
                title: {
                    text: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Monthly Income Graph'];?>
'
                },
                tooltip: { },
                legend: {
                    data:['<?php echo $_smarty_tpl->tpl_vars['_L']->value['Income'];?>
']
                },
                calculable : true,
                xAxis: {
                  //  data: ["shirt","cardign","chiffon shirt","pants","heels","socks"]
                    type : 'category',
                    data: [
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m_data']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>
                        "<?php echo $_smarty_tpl->tpl_vars['d']->value['month'];?>
",
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    ],
                    axisLabel : {
                        rotate : 45,
                        interval : 0
                    }
                },
                yAxis: { },
                series: [{
                    name: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Income'];?>
',
                    type: 'bar',
                    color: [
                        '#<?php echo $_smarty_tpl->tpl_vars['config']->value['graph_primary_color'];?>
'
                    ],
                    data: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['m_data']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>
                        <?php echo $_smarty_tpl->tpl_vars['d']->value['value'];?>
,
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>]
                }]
            };

            // use configuration item and data specified to show chart
            myChart.setOption(option);




            var cat_option = {

                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data:[<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cat_data']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>
                        "<?php echo $_smarty_tpl->tpl_vars['d']->value['category'];?>
",
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>]
                },
                series: [
                    {
                        name:'<?php echo $_smarty_tpl->tpl_vars['_L']->value['Income'];?>
',
                        type:'pie',
                        radius: ['50%', '70%'],
                        avoidLabelOverlap: false,
                        color: [
                            '#2196f3',
                            '#46BE8A',
                            '#8E44AD',
                            '#FFCC29',
                            '#F37070'
                        ],
                        label: {
                            normal: {
                                show: false,
                                position: 'center'
                            },
                            emphasis: {
                                show: true,
                                textStyle: {
                                    fontSize: '30',
                                    fontWeight: 'bold'
                                }
                            }
                        },
                        labelLine: {
                            normal: {
                                show: false
                            }
                        },
                        data:[

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cat_data']->value, 'd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
?>
                            { value:<?php echo $_smarty_tpl->tpl_vars['d']->value['value'];?>
, name:'<?php echo $_smarty_tpl->tpl_vars['d']->value['category'];?>
' },
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        ]
                    }
                ]
            };


            var catChart = echarts.init(document.getElementById('catChart'));
            catChart.setOption(cat_option);

        });

    <?php echo '</script'; ?>
>

<?php
}
}
/* {/block "script"} */
}
