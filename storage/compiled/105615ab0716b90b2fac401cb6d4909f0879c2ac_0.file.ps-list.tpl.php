<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:32:12
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/ps-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a66c5eaa16_43016460',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '105615ab0716b90b2fac401cb6d4909f0879c2ac' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/ps-list.tpl',
      1 => 1546548905,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a66c5eaa16_43016460 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6584731755c60a66c5e4f25_79630361', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4836376585c60a66c5e96e3_66249607', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_6584731755c60a66c5e4f25_79630361 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_6584731755c60a66c5e4f25_79630361',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['List'];?>
 <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Product') {?> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Products'];?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Services'];?>
 <?php }?></h5>
                    <div class="ibox-tools">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Product'];?>
</a>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/s-new" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Service'];?>
</a>
                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="input-group"><input type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
" id="txtsearch" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" id="search" class="btn btn-sm btn-primary"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
</button> </span></div>
                    <input type="hidden" id="stype" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">

                    <div class="project-list mt-md">
                        <div id="progressbar">
                        </div>

                        <div id="application_ajaxrender">


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="_lan_are_you_sure" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
">
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_4836376585c60a66c5e96e3_66249607 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_4836376585c60a66c5e96e3_66249607',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        Dropzone.autoDiscover = false;

        $(document).ready(function () {




            var upload_resp;



            function updateDiv(){
                //   $("#application_ajaxrender").html('Loading...');
                $('#ibox_form').block({ message: null });




                var btnsearch = $("#search");

                //btnsearch.html(_L['Searching']);
                //btnsearch.addClass("btn-danger");
                var _url = $("#_url").val();
                $.post(_url + 'search/ps/', {

                    txtsearch: $('#txtsearch').val(),
                    stype: $('#stype').val()

                })
                    .done(function (data) {
                        var sbutton = $("#search");
                        var result =  $("#application_ajaxrender");
                        //sbutton.html('Search');
                        //sbutton.removeClass("btn-danger");

                        $('#ibox_form').unblock();
                        result.html(data);
                        result.show();
                    });

            }

            updateDiv();

            $("#search").click(function (e) {
                e.preventDefault();
                updateDiv();
            });
            var $modal = $('#ajax-modal');
            var sysrender = $('#application_ajaxrender');
            sysrender.on('click', '.cdelete', function(e){
                e.preventDefault();
                var id = this.id;
                var lan_msg = $("#_lan_are_you_sure").val();
                bootbox.confirm(lan_msg, function(result) {
                    if(result){
                        var _url = $("#_url").val();
                        window.location.href = _url + "delete/ps/" + id + '/';
                    }
                });
            });

            sysrender.on('click', '.cedit', function(e){
                e.preventDefault();
                var vid = this.id;
                var id = vid.replace("e", "");
                id = id.replace("t", "");

                // var id = $(this).closest('tr').attr('id');
                // create the backdrop and wait for next modal to be triggered
                $('body').modalmanager('loading');
                var _url = $("#_url").val();
                $modal.load(_url + 'ps/edit-form/' + id, '', function(){
                    $modal.modal();
                    $('.amount').autoNumeric('init', {
                        vMax: '9999999999999999.00',
                        vMin: '-9999999999999999.00'
                    });

                    $('#description').redactor(
                        {
                            minHeight: 200 // pixels
                        }
                    );

                    new Clipboard('.ib_btn_copy');

                    var $file_link = $("#file_link");
                    var ib_submit = $("#update");

                    var ib_file = new Dropzone("#upload_container",
                        {
                            url: _url + "ps/upload/",
                            maxFiles: 1
                        }
                    );


                    ib_file.on("sending", function() {

                        ib_submit.prop('disabled', true);

                    });

                    ib_file.on("success", function(file,response) {

                        ib_submit.prop('disabled', false);

                        upload_resp = response;

                        if(upload_resp.success == 'Yes'){

                            toastr.success(upload_resp.msg);
                            $file_link.val(upload_resp.file);


                        }
                        else{
                            toastr.error(upload_resp.msg);
                        }


                    });

                });
            });

            $modal.on('click', '#update', function(){
                $modal.modal('loading');

                var _url = $("#_url").val();
                $.post(_url + 'ps/edit-post/', $('#edit_form').serialize(), function(data){

                    var _url = $("#_url").val();
                    if ($.isNumeric(data)) {

                        location.reload();
                    }
                    else {

                        $modal
                            .modal('loading')
                            .find('.modal-body')
                            .prepend('<div class="alert alert-danger fade in">' + data +

                                '</div>');

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
