{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">



                    <div class="row">
                        <div class="col-md-3 col-sm-6">

                            <form>
                                <div class="form-group">
                                    <label for="reportrange">{$_L['Date Range']}</label>
                                    <input type="text" name="reportrange" class="form-control" id="reportrange">
                                </div>

                                <div class="form-group">
                                    <label for="tr_type">{$_L['Transaction']} - {$_L['Type']}</label>
                                    <select id="tr_type" name="tr_type" class="form-control">
                                        <option value="">{$_L['All']}</option>
                                        <option value="Income" {if $tr_type eq 'Income'}selected{/if}>{$_L['Income']}</option>
                                        <option value="Expense" {if $tr_type eq 'Expense'}selected{/if}>{$_L['Expense']}</option>
                                        <option value="Transfer" {if $tr_type eq 'Transfer'}selected{/if}>{$_L['Transfer']}</option>
                                    </select>
                                </div>

                                <div class="form-group" id="block_expense_type">
                                    <label for="tr_type">Expense {$_L['Type']}</label>
                                    <select id="tr_type" name="tr_type" class="form-control">
                                        <option value="">{$_L['All']}</option>
                                        {foreach $expense_types as $expense_type}
                                            <option value="{$expense_type->name}">{$expense_type->name}</option>
                                        {/foreach}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="account">{$_L['Account']}</label>
                                    <select id="account" name="account" class="form-control">
                                        <option value="">{$_L['All']}</option>
                                        {foreach $a as $as}
                                            <option value="{$as['account']}" {if $p_account eq ($as['id'])}selected="selected" {/if}>{$as['account']}</option>
                                        {/foreach}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="cid">{$_L['Contact']}</label>
                                    <select id="cid" name="cid" class="form-control">
                                        <option value="">{$_L['All']}</option>
                                        {foreach $c as $cs}
                                            <option value="{$cs['id']}"
                                                    {if $p_cid eq ($cs['id'])}selected="selected" {/if}>{$cs['account']} {if $cs['email'] neq ''}- {$cs['email']}{/if}</option>
                                        {/foreach}

                                    </select>
                                </div>







                                <button type="submit" id="ib_filter" class="btn btn-primary">{$_L['Filter']}</button>

                                <br>
                            </form>


                        </div>
                        <div class="col-md-9 col-sm-6 ib_right_panel">


                            <div class="table-responsive" id="ib_data_panel">


                                <table class="table table-bordered table-hover display" id="ib_dt">
                                    <thead>
                                    <tr class="heading">

                                        <th>{$_L['Date']}</th>
                                        <th>{$_L['Account']}</th>
                                        <th>{$_L['Type']}</th>

                                        <th>{$_L['Description']}</th>

                                        <th class="text-right">{$_L['Amount']}</th>



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



{/block}


{block name="script"}
    <script>
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
                    "autoWidth": false,
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
                        // { "orderable": false, "targets": 9 }
                    ],
                    "order": [[ 0, 'desc' ]],
                    "scrollX": true,
                    "initComplete": function () {
                        $ib_data_panel.unblock();
                    },
                    language: {
                        "decimal":        "",
                        "emptyTable":     "{$_L['No data available in table']}",
                        "info":           "{$_L['Showing']} _START_ {$_L['to']} _END_ {$_L['of']} _TOTAL_ {$_L['entries']}",
                        "infoEmpty":      "{$_L['Showing 0 to 0 of 0 entries']}",
                        "infoFiltered":   "(filtered from _MAX_ total entries)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "{$_L['Show']} _MENU_ {$_L['entries']}",
                        "loadingRecords": "Loading...",
                        "processing":     "Processing...",
                        "search":         "{$_L['Search']}:",
                        "zeroRecords":    "No matching records found",
                        "paginate": {
                            "first":      "First",
                            "last":       "Last",
                            "next":       "{$_L['Next']}",
                            "previous":   "{$_L['Previous']}"
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
    </script>
{/block}
