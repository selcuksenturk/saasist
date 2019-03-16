<?php
/* Smarty version 3.1.33, created on 2019-02-10 18:07:01
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/password_manager.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60ae95ec58e9_83010865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54b1cec2e259b3b83de8e7f34841b4ef07f7eff9' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/password_manager.tpl',
      1 => 1546537179,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60ae95ec58e9_83010865 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17024826115c60ae95eb5015_14799930', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11239274235c60ae95eb6b84_50945024', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11964396895c60ae95ec08c5_83182972', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_17024826115c60ae95eb5015_14799930 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_17024826115c60ae95eb5015_14799930',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/lib/datatables/light/datatables.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/lib/modal.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/lib/s2/css/select2.min.css" rel="stylesheet" type="text/css">
    <style>
        select.input-sm {
            line-height: 20px;
        }
    </style>
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_11239274235c60ae95eb6b84_50945024 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_11239274235c60ae95eb6b84_50945024',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">
                <div class="panel-body">

                    <a href="#" class="btn btn-primary add_password waves-effect waves-light" id="add_company"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['New Entry'];?>
</a>


                </div>

            </div>
        </div>



    </div>

    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">



                    <div class="table-responsive" id="ib_data_table">
                        <table class="table table-bordered table-hover" id="tableDataTable">
                            <thead>
                            <tr>
                                <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                                <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
</th>
                                <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['URL'];?>
</th>
                                <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Username'];?>
</th>
                                <th class="text-center bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['passwords']->value, 'password');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['password']->value) {
?>
                                <tr data-id="<?php echo $_smarty_tpl->tpl_vars['password']->value['id'];?>
">

                                    <td><?php echo $_smarty_tpl->tpl_vars['password']->value['name'];?>
</td>
                                    <td>
                                        <?php if (isset($_smarty_tpl->tpl_vars['cls']->value[$_smarty_tpl->tpl_vars['password']->value['client_id']])) {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['password']->value['client_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cls']->value[$_smarty_tpl->tpl_vars['password']->value['client_id']];?>
</a>
                                        <?php }?>
                                    </td>
                                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['password']->value['url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['password']->value['url'];?>
</a> </td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['password']->value['username'];?>
</td>
                                    <td class="text-right">

                                        <?php if ($_smarty_tpl->tpl_vars['password']->value['url'] != '') {?>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['password']->value['url'];?>
" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-globe"></i> </a>
                                        <?php }?>

                                        
                                        <a href="javascript:void(0);" class="btn btn-sm btn-info copy_to_clipboard" aria-label="<?php echo $_smarty_tpl->tpl_vars['password']->value->username;?>
"><i class="fa fa-clipboard"></i></a>

                                        <a href="javascript:void(0);" class="btn btn-sm btn-warning copy_to_clipboard" aria-label="<?php echo $_smarty_tpl->tpl_vars['password']->value->password;?>
"><i class="fa fa-lock"></i></a>

                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
" id="pe_<?php echo $_smarty_tpl->tpl_vars['password']->value['id'];?>
" class="btn btn-inverse btn-sm edit_password"><i class="fa fa-pencil"></i> </a>


                                        <a href="#" class="btn btn-danger btn-sm cdelete" id="c<?php echo $_smarty_tpl->tpl_vars['password']->value['id'];?>
" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
"><i class="fa fa-trash"></i> </a>
                                    </td>

                                </tr>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>






                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>



    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_password" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_11964396895c60ae95ec08c5_83182972 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_11964396895c60ae95ec08c5_83182972',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/datatables/light/datatables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/modal.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/clipboard.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/s2/js/select2.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(function () {

            var $modal = $('#ajax-modal');



            $('#tableDataTable').DataTable({
                columnDefs: [
                    { orderable: false, targets: -1 }
                ],
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
            });

            var clipboard = new Clipboard('.copy_to_clipboard', {
                text: function(trigger) {
                    return trigger.getAttribute('aria-label');
                }
            });

            clipboard.on('success', function(e) {
                toastr.success('Text Copied!');
                e.clearSelection();
            });

            $('.add_password').on('click', function(e){

                e.preventDefault();

                $('body').modalmanager('loading');


                $modal.load( base_url + 'password_manager/modal_password/', '', function(){

                    $modal.modal();

                    $modal.css("width", "700px");
                    $modal.css("margin-left", "-349px");

                    $modal.modal();

                    $("#ajax-modal .s2_contacts").select2({
                        theme: "bootstrap",
                        width: '100%'
                    });

                });
            });


            $('.edit_password').on('click', function(e){

                var e_id = this.id;
                e.preventDefault();

                $('body').modalmanager('loading');


                $modal.load( base_url + 'password_manager/modal_password/'+e_id, '', function(){

                    $modal.modal();

                    $modal.css("width", "700px");
                    $modal.css("margin-left", "-349px");

                    $modal.modal();

                    $("#ajax-modal .s2_contacts").select2({
                        theme: "bootstrap",
                        width: '100%'
                    });

                });
            });

            // $('.password_view').on('click', function(e){
            //
            //     var v_id = this.id;
            //
            //     e.preventDefault();
            //
            //     $('body').modalmanager('loading');
            //
            //
            //     $modal.load( base_url + 'password_manager/modal_view_password/'+v_id, '', function(){
            //
            //         $modal.modal();
            //
            //         $modal.css("width", "700px");
            //         $modal.css("margin-left", "-349px");
            //
            //         $modal.modal();
            //
            //         var clipboard = new Clipboard('.copy_to_clipboard', {
            //             text: function(trigger) {
            //                 return trigger.getAttribute('aria-label');
            //             }
            //         });
            //
            //         clipboard.on('success', function(e) {
            //            toastr.success('Text Copied!');
            //             e.clearSelection();
            //         });
            //
            //
            //
            //     });
            // });


            $modal.on('click', '.modal_submit', function(e){

                e.preventDefault();

                $modal.modal('loading');



                $.post( base_url + "password_manager/save/", $("#spForm").serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            $modal.modal('loading');
                            toastr.error(data);
                        }

                    });

            });


            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm(_L['are_you_sure'], function(result) {
                    if(result){
                        var _url = $("#_url").val();
                        window.location.href = _url + "delete/password/" + id + '/';
                    }
                });
            });



        })
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
