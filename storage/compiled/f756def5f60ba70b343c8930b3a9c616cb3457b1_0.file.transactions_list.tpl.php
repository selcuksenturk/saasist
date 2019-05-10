<?php
/* Smarty version 3.1.33, created on 2019-05-07 07:48:00
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/transactions_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd17070803b98_16350000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f756def5f60ba70b343c8930b3a9c616cb3457b1' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/transactions_list.tpl',
      1 => 1556695882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd17070803b98_16350000 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1774599135cd170707f1367_42566159', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20988542645cd170707ff538_29595709', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_1774599135cd170707f1367_42566159 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1774599135cd170707f1367_42566159',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">



                    <div class="row">
                        <div class="col-md-3 col-sm-6">

                            <form>
                                <div class="form-group">
                                    <label for="reportrange"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date Range'];?>
</label>
                                    <input type="text" name="reportrange" class="form-control" id="reportrange">
                                </div>

                                <div class="form-group">
                                    <label for="tr_type"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Transaction'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</label>
                                    <select id="tr_type" name="tr_type" class="form-control">
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['All'];?>
</option>
                                        <option value="Income" <?php if ($_smarty_tpl->tpl_vars['tr_type']->value == 'Income') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Income'];?>
</option>
                                        <option value="Expense" <?php if ($_smarty_tpl->tpl_vars['tr_type']->value == 'Expense') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Expense'];?>
</option>
                                        <option value="Transfer" <?php if ($_smarty_tpl->tpl_vars['tr_type']->value == 'Transfer') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Transfer'];?>
</option>
                                    </select>
                                </div>

                                <div class="form-group" id="block_expense_type">
                                    <label for="tr_type">Expense <?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</label>
                                    <select id="tr_type" name="tr_type" class="form-control">
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['All'];?>
</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['expense_types']->value, 'expense_type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['expense_type']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['expense_type']->value->name;?>
"><?php echo $_smarty_tpl->tpl_vars['expense_type']->value->name;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</label>
                                    <select id="account" name="account" class="form-control">
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['All'];?>
</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['a']->value, 'as');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['as']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['as']->value['account'];?>
" <?php if ($_smarty_tpl->tpl_vars['p_account']->value == ($_smarty_tpl->tpl_vars['as']->value['id'])) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['as']->value['account'];?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Contact'];?>
</label>
                                    <select id="cid" name="cid" class="form-control">
                                        <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['All'];?>
</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c']->value, 'cs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"
                                                    <?php if ($_smarty_tpl->tpl_vars['p_cid']->value == ($_smarty_tpl->tpl_vars['cs']->value['id'])) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cs']->value['account'];?>
 <?php if ($_smarty_tpl->tpl_vars['cs']->value['email'] != '') {?>- <?php echo $_smarty_tpl->tpl_vars['cs']->value['email'];
}?></option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                    </select>
                                </div>







                                <button type="submit" id="ib_filter" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Filter'];?>
</button>

                                <br>
                            </form>


                        </div>
                        <div class="col-md-9 col-sm-6 ib_right_panel">


                            <div class="table-responsive" id="ib_data_panel">


                                <table class="table table-bordered table-hover display" id="ib_dt">
                                    <thead>
                                    <tr class="heading">
                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['ID'];?>
</th>
                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Type'];?>
</th>

                                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>

                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Dr'];?>
</th>
                                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cr'];?>
</th>
                                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Balance'];?>
</th>
                                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                                    </tr>
                                    </thead>




                                </table>
                            </div>

                        </div>
                    </div>





                </div>
            </div>

        </div>


    </div> <!-- Row end-->



<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_20988542645cd170707ff538_29595709 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_20988542645cd170707ff538_29595709',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        $(function () {

            var $block_expense_type = $("#block_expense_type");
            $block_expense_type.hide();

            $("#tr_type").on('change',function () {
                if($(this).val() == 'Expense'){
                    $block_expense_type.show('slow');
                }
                else{
                    $block_expense_type.hide('slow');
                }
            });


                var $ib_data_panel = $("#ib_data_panel");

                $ib_data_panel.block({ message:block_msg });

                var $cid = $('#cid');

                var $account = $("#account");

                $cid.select2({
                    theme: "bootstrap"
                });

                $account.select2({
                    theme: "bootstrap"
                });


                var start = moment().subtract(29, 'days');
                var end = moment();

                function cb(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }

                var $reportrange = $("#reportrange");

                $reportrange.daterangepicker({
                    startDate: start,
                    endDate: end,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    locale: {
                        format: 'YYYY/MM/DD'
                    }
                }, cb);

                cb(start, end);





                var ib_dt = $('#ib_dt').DataTable( {

                    "serverSide": true,
                    "ajax": {
                        "url": base_url + "transactions/tr_list/",
                        "type": "POST",
                        "data": function ( d ) {

                            d.tr_type = $('#tr_type').val();
                            d.reportrange = $reportrange.val();
                            d.cid = $cid.val();
                            d.account = $account.val();

                        }
                    },
                    "pageLength": 10,
                    responsive: true,
                    dom: "<'row'<'col-sm-6'i><'col-sm-6'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'><'col-sm-7'p>>",
                    fixedHeader: {
                        headerOffset: 50
                    },
                    lengthMenu: [
                        [ 10, 25, 50, -1 ],
                        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                    ],
                    buttons: [
                        {
                            extend:    'colvis',
                            text:      '<i class="fa fa-columns"></i>',
                            titleAttr: 'Columns'
                        },
                        {
                            extend:    'copyHtml5',
                            text:      '<i class="fa fa-files-o"></i>',
                            titleAttr: 'Copy'
                        },
                        {
                            extend:    'excelHtml5',
                            text:      '<i class="fa fa-file-excel-o"></i>',
                            titleAttr: 'Excel'
                        },
                        {
                            extend:    'csvHtml5',
                            text:      '<i class="fa fa-file-text-o"></i>',
                            titleAttr: 'CSV'
                        },
                        {
                            extend:    'pdfHtml5',
                            text:      '<i class="fa fa-file-pdf-o"></i>',
                            titleAttr: 'PDF'
                        },
                        {
                            extend:    'print',
                            text:      '<i class="fa fa-print"></i>',
                            titleAttr: 'Print'
                        },
                        {
                            extend:    'pageLength',
                            text:      '<i class="fa fa-bars"></i>',
                            titleAttr: 'Entries'
                        }
                    ],
                    "columnDefs": [
                        { "orderable": false, "targets": 9 }
                    ],
                    "order": [[ 0, 'desc' ]],
                    "scrollX": true,
                    "initComplete": function () {
                        $ib_data_panel.unblock();
                    },
                    language: {
                        "decimal":        "",
                        "emptyTable":     "<?php echo $_smarty_tpl->tpl_vars['_L']->value['No data available in table'];?>
",
                        "info":           "<?php echo $_smarty_tpl->tpl_vars['_L']->value['Showing'];?>
 _START_ <?php echo $_smarty_tpl->tpl_vars['_L']->value['to'];?>
 _END_ <?php echo $_smarty_tpl->tpl_vars['_L']->value['of'];?>
 _TOTAL_ <?php echo $_smarty_tpl->tpl_vars['_L']->value['entries'];?>
",
                        "infoEmpty":      "<?php echo $_smarty_tpl->tpl_vars['_L']->value['Showing 0 to 0 of 0 entries'];?>
",
                        "infoFiltered":   "(filtered from _MAX_ total entries)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "<?php echo $_smarty_tpl->tpl_vars['_L']->value['Show'];?>
 _MENU_ <?php echo $_smarty_tpl->tpl_vars['_L']->value['entries'];?>
",
                        "loadingRecords": "Loading...",
                        "processing":     "Processing...",
                        "search":         "<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
:",
                        "zeroRecords":    "No matching records found",
                        "paginate": {
                            "first":      "First",
                            "last":       "Last",
                            "next":       "<?php echo $_smarty_tpl->tpl_vars['_L']->value['Next'];?>
",
                            "previous":   "<?php echo $_smarty_tpl->tpl_vars['_L']->value['Previous'];?>
"
                        },
                        "aria": {
                            "sortAscending":  ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        }
                    }
                } );

                var $ib_filter = $("#ib_filter");



                $ib_filter.on('click', function(e) {
                    e.preventDefault();

                    $ib_data_panel.block({ message:block_msg });

                    ib_dt.ajax.reload(
                        function () {
                            $ib_data_panel.unblock();
                        }
                    );


                });


                // $('#ib_search').keyup(function(){
                //     ib_dt.search($(this).val()).draw() ;
                //
                // })





        })
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
