<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:32:15
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/add-ps.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a66f286023_22266843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b31d6cdc2cfa5194033ac7e927a4552eb39c596c' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/add-ps.tpl',
      1 => 1546549289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a66f286023_22266843 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15449265395c60a66f2769d7_63000406', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14298760495c60a66f285311_80590323', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_15449265395c60a66f2769d7_63000406 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15449265395c60a66f2769d7_63000406',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">

        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>
                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Product') {?>
                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Product'];?>

                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Service'];?>

                        <?php }?>


                    </h5>
                    <div class="ibox-tools">
                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Product') {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/p-list" class="btn btn-primary btn-xs"><?php echo $_smarty_tpl->tpl_vars['_L']->value['List Products'];?>
</a>

                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Service') {?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
ps/s-list" class="btn btn-primary btn-xs"><?php echo $_smarty_tpl->tpl_vars['_L']->value['List Services'];?>
</a>
                        <?php }?>


                    </div>
                </div>
                <div class="ibox-content" id="ibox_form">
                    <div class="alert alert-danger" id="emsg">
                        <span id="emsgbody"></span>
                    </div>

                    <form class="form-horizontal" id="rform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="name"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
*</label>

                            <div class="col-lg-10"><input type="text" id="name" name="name" class="form-control" autocomplete="off">

                            </div>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Product') {?>

                            <div class="form-group"><label class="col-lg-2 control-label" for="cost_price"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cost Price'];?>
</label>

                                <div class="col-lg-10"><input type="text" id="cost_price" name="cost_price" class="form-control amount" autocomplete="off" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
"  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-d-group="2">

                                </div>
                            </div>

                        <?php }?>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sales_price"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sales Price'];?>
</label>

                            <div class="col-lg-10">

                                <input type="text" id="sales_price" name="sales_price" class="form-control amount" autocomplete="off" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
"  data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-d-group="2">

                            </div>
                        </div>



                        <div class="form-group"><label class="col-lg-2 control-label" for="item_number"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Item Number'];?>
</label>

                            <div class="col-lg-10"><input type="text" id="item_number" value="<?php echo str_pad($_smarty_tpl->tpl_vars['nxt']->value,4,'0',STR_PAD_LEFT);?>
" name="item_number" class="form-control" autocomplete="off">

                            </div>
                        </div>



                        <div class="form-group"><label class="col-lg-2 control-label" for="description"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>

                            <div class="col-lg-10"><textarea id="description" class="form-control" rows="3"></textarea>

                            </div>
                        </div>

                        <hr>


                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'Product') {?>

                            <div class="form-group"><label class="col-lg-2 control-label" for="inventory"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Inventory To Add Subtract'];?>
</label>

                                <div class="col-lg-10"><input type="text" id="inventory" name="inventory" class="form-control" autocomplete="off">

                                </div>
                            </div>


                            <div class="form-group"><label class="col-lg-2 control-label" for="unit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Unit'];?>
</label>

                                <div class="col-lg-10">

                                    <select class="form-control" id="unit" name="unit">
                                        <option value="">...</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['units']->value, 'unit');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['unit']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['unit']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['unit']->value['name'];?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>

                                </div>
                            </div>

                            <div class="form-group"><label class="col-lg-2 control-label" for="inventory"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Weight'];?>
</label>

                                <div class="col-lg-10">

                                    <input type="text" id="inventory" name="inventory" class="form-control" autocomplete="off">

                                </div>
                            </div>

                        <?php }?>


                        <input type="hidden" id="type" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
                        <input type="hidden" name="file_link" id="file_link" value="">



                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">

                                <button class="btn btn-sm btn-primary" type="submit" id="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Image'];?>

                </div>
                <div class="ibox-content" id="ibox_form">

                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['Drop File Here'];?>
</h3>
                            <br />
                            <span class="note"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Click to Upload'];?>
</span>
                        </div>

                    </form>

                </div>
            </div>
        </div>


    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_14298760495c60a66f285311_80590323 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_14298760495c60a66f285311_80590323',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $(".progress").hide();
            $("#emsg").hide();

            var _url = $("#_url").val();

            var ib_submit = $("#submit");

            var $file_link = $("#file_link");

            var upload_resp;

            $('.amount').autoNumeric('init');

            $('#description').redactor(
                {
                    minHeight: 200 // pixels
                }
            );

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


            ib_submit.click(function (e) {
                e.preventDefault();
                $('#ibox_form').block({ message: null });
                var _url = $("#_url").val();
                $.post(_url + 'ps/add-post/', $( "#rform" ).serialize())
                    .done(function (data) {

                        if ($.isNumeric(data)) {

                            location.reload();
                        }
                        else {
                            $('#ibox_form').unblock();

                            $("#emsgbody").html(data);
                            $("#emsg").show("slow");
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
