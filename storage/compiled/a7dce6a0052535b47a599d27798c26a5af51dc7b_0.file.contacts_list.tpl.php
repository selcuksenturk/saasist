<?php
/* Smarty version 3.1.33, created on 2019-06-03 05:50:00
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/contacts_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf4ed48851842_90080305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7dce6a0052535b47a599d27798c26a5af51dc7b' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/contacts_list.tpl',
      1 => 1559555398,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf4ed48851842_90080305 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8071391445cf4ed488447b2_08806235', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11245579055cf4ed4884ae08_81740846', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_8071391445cf4ed488447b2_08806235 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8071391445cf4ed488447b2_08806235',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/add/" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Customer'];?>
</a>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/import_csv/" class="btn btn-success"><i class="fa fa-upload"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Import'];?>
</a>
                    
                    
                    


                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">



                    <div id="ib_act_hidden" style="display: none;">
                        <a href="#" id="send_group_email" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Send Email'];?>
</a>
                        <a href="#" id="assign_to_group" class="btn btn-primary"><i class="fa fa-users"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Assign to Group'];?>
</a>
                                                <a href="#" id="delete_multiple_customers" class="btn btn-danger"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>

                        <hr>
                    </div>

                    <div class="table-responsive" id="ib_data_panel">


                        <table class="table table-bordered table-hover display" id="ib_dt" width="100%">
                            <thead>
                            <tr class="heading">
                                <th><input id="d_select_all" type="checkbox" value="" name=""  class="i-checks"/></th>

                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Image'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company Name'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Group'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
</th>
                                <th class="text-right" style="width: 80px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                            </tr>

                            <tr class="heading">
                                <td></td>
                                <td></td>
                                <td><input type="text" id="account" name="account" class="form-control"></td>
                                <td><input type="text" id="filter_company" name="filter_company" class="form-control"></td>
                                <td><input type="text" id="filter_group" name="filter_group" class="form-control"></td>
                                <td><input type="email" id="filter_email" name="filter_email" class="form-control"></td>
                                <td><input type="text" id="filter_phone" name="filter_phone" class="form-control"></td>
                                <td class="text-right" style="width: 80px;"><button type="submit" id="ib_filter" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Filter'];?>
</button></td>
                            </tr>
                            </thead>




                        </table>
                    </div>



                </div>
            </div>
        </div>

    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_11245579055cf4ed4884ae08_81740846 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_11245579055cf4ed4884ae08_81740846',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        $(function() {

            var _url = $("#_url").val();

            var $ib_data_panel = $("#ib_data_panel");

            $ib_data_panel.block({ message:block_msg });

            var selected = [];
            var ib_act_hidden = $("#ib_act_hidden");
            function ib_btn_trigger() {
                if(selected.length > 0){
                    ib_act_hidden.show(200);
                }
                else{
                    ib_act_hidden.hide(200);
                }
            }


            $('[data-toggle="tooltip"]').tooltip();

            var ib_dt = $('#ib_dt').DataTable( {

                "serverSide": true,
                "ajax": {
                    "url": base_url + "contacts/json_list/<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
",
                    "type": "POST",
                    "data": function ( d ) {

                        d.account = $('#account').val();
                        d.email = $('#filter_email').val();
                        d.company = $('#filter_company').val();
                        d.group = $('#filter_group').val();
                        d.phone = $('#filter_phone').val();



                    }
                },
                "pageLength": 20,
                "rowCallback": function( row, data ) {
                    if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
                        $(row).addClass('selected');

                    }
                },
                responsive: true,
                dom: "<'row'<'col-sm-6'i><'col-sm-6'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'><'col-sm-7'p>>",

                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    {
                        extend:    'pageLength',
                        text:      '<i class="fa fa-bars"></i>',
                        titleAttr: 'Entries'
                    },
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
                    }

                ],
                "orderCellsTop": true,
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="' + base_url +'contacts/view/'+ row[9] +'">'+ data +'</a>';
                        },
                        "targets": 2
                    },
                    // {
                    //     "render": function (data) {
                    //         if(data){
                    //             return '<a href="#" class="phone_number">'+ data +'</a>';
                    //         }
                    //
                    //     },
                    //     "targets": 7
                    // },
                    { "orderable": false, "targets": 0 },
                    { "orderable": false, "targets": 7 },
                    { "orderable": false, "targets": 1 },
                    { className: "text-center", "targets": [ 1 ] },
                ],
                "order": [[ 2, 'desc' ]],
                "scrollX": true,
                "initComplete": function () {
                    $ib_data_panel.unblock();

                    listen_change();
                },
                select: {
                    info: false
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
                        listen_change();
                    }
                );


            });


            // $('#ib_dt tbody').on('click', 'tr', function () {
            //     var id = this.id;
            //     var index = $.inArray(id, selected);
            //
            //     if ( index === -1 ) {
            //         selected.push( id );
            //     } else {
            //         selected.splice( index, 1 );
            //     }
            //
            //     $(this).toggleClass('selected');
            //
            //     ib_btn_trigger();
            //
            //
            //
            // } );


            function listen_change() {

                var i_checks = $('.i-checks');
                i_checks.iCheck({
                    checkboxClass: 'icheckbox_square-blue'
                });

                i_checks.on('ifChanged', function (event) {

                    var id = $(this)[0].id;



                    var index = $.inArray(id, selected);

                    if($(this).iCheck('update')[0].checked){

                        if(id == 'd_select_all'){

                            //   ib_dt.rows().select();

                            i_checks.iCheck('check');

                            return;
                        }



                        selected.push( id );



                        //  $(this).closest('tr').toggleClass('selected');

                        ib_btn_trigger();

                    }
                    else{

                        if(id == 'd_select_all'){


                            i_checks.iCheck('uncheck');

                            return;
                        }

                        selected.splice( index, 1 );

                        //  $(this).closest('tr').toggleClass('selected');

                        ib_btn_trigger();

                    }

                });
            }

            listen_change();



            $('#ib_dt tbody').on('click', '.phone_number', function () {

                var phone_number = $(this).html();





            } );


            $ib_data_panel.on('click', '.cdelete', function(e){
                e.preventDefault();
                var lid = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){

                        $.get( base_url + "delete/crm-user/"+lid, function( data ) {
                            $ib_data_panel.block({ message:block_msg });

                            ib_dt.ajax.reload(
                                function () {
                                    $ib_data_panel.unblock();
                                    listen_change();
                                    $('.i-checks').iCheck('uncheck');
                                }
                            );
                        });


                    }
                });

            });

            $("#send_group_email").click(function(e){
                e.preventDefault();
                $.redirect(base_url + "handler/bulk_email/",{ type: "customers", ids: selected});
            });

            // $("#assign_to_group").click(function(e){
            //     e.preventDefault();
            //
            // });

            $('#assign_to_group').webuiPopover({
                type:'async',
                placement:'top',

                cache: false,
                width:'240',
                url: base_url + 'handler/groups/'
            });

            $('body').on('change', '#input_assign_group', function(e){

                $('.webui-popover').block({ message: block_msg});

                $.post( base_url + "contacts/set_group/", { gid: $('#input_assign_group').val(), ids: selected })
                    .done(function( data ) {

                        $('.webui-popover').unblock();
                        $ib_data_panel.block({ message:block_msg });
                        ib_dt.ajax.reload(
                            function () {
                                $ib_data_panel.unblock();
                                listen_change();
                                $('.i-checks').iCheck('uncheck');
                            }
                        );


                        toastr.success(data);


                    });



            });

            $("#delete_multiple_customers").click(function(e){
                e.preventDefault();
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        $.redirect(base_url + "delete/multiple/",{ type: "customers", ids: selected});
                    }
                });

            });




        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
