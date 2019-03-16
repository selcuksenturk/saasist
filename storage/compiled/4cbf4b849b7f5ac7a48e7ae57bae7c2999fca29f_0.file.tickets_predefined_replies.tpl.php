<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:16:18
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/tickets_predefined_replies.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a2b2ae0675_57206083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cbf4b849b7f5ac7a48e7ae57bae7c2999fca29f' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/tickets_predefined_replies.tpl',
      1 => 1543254266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a2b2ae0675_57206083 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4116731395c60a2b2ad92f2_98340583', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16202691905c60a2b2adfa60_95399636', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_4116731395c60a2b2ad92f2_98340583 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4116731395c60a2b2ad92f2_98340583',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Predefined Replies'];?>
</h5>

                </div>
                <div class="ibox-content">
                    <a data-toggle="modal" href="#modal_add_item" class="btn btn-success mb-md"><i class="fa fa-plus"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Predefined Reply'];?>
</a>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
tickets/admin/predefined_replies_reorder/" class="btn btn-primary mb-md"><i class="fa fa-arrows"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Reorder'];?>
</a>
                    <br>
                    <table class="table table-bordered table-hover sys_table">
                        <thead>
                        <tr>

                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Title'];?>
</th>
                            <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['replies']->value, 'reply');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['reply']->value) {
?>

                            <tr>

                                <td><?php echo $_smarty_tpl->tpl_vars['reply']->value['title'];?>
</td>


                                <td class="text-right">

                                    <a href="#" class="btn btn-info btn-sm item_edit" id="e<?php echo $_smarty_tpl->tpl_vars['reply']->value['id'];?>
"><i class="fa fa-pencil-square-o"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>
                                    <a href="#" class="btn btn-danger btn-sm cdelete" id="d<?php echo $_smarty_tpl->tpl_vars['reply']->value['id'];?>
"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>

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


    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="600" style="display: none;">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Predefined Reply'];?>
</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">

                    <form id="ib_modal_form">
                        <div class="form-group">
                            <label for="title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Title'];?>
</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>


                        <div class="form-group">
                            <label for="message"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Message'];?>
</label>
                            <textarea id="message" name="message" class="form-control" rows="5"></textarea>
                        </div>



                    </form>
                </div>




            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Close'];?>
</button>
            <button type="button" id="btn_modal_action" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>

        </div>

    </div>

<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_16202691905c60a2b2adfa60_95399636 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_16202691905c60a2b2adfa60_95399636',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
>
        $(function() {

            var _url = $("#_url").val();

            var $modal_add_item = $("#modal_add_item");

            var $message = $("#message");

            $modal_add_item.on('shown.bs.modal', function() {
                $message.redactor({
                    minHeight: 200,
                    paragraphize: false,
                    replaceDivs: false,
                    linebreaks: true
                });
            });

            var $btn_modal_action = $("#btn_modal_action");


            $btn_modal_action.on('click', function(e) {
                e.preventDefault();

                $modal_add_item.block({ message: block_msg });
                $.post( _url + "tickets/admin/predefined_replies_post/", $("#ib_modal_form").serialize())
                    .done(function( data ) {

                        if ($.isNumeric(data)) {

                            location.reload();

                        }

                        else {
                            $modal_add_item.unblock();
                            toastr.error(data);
                        }

                    });

            });


            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                bootbox.confirm('Are you sure?', function(result) {
                    if(result){

                        window.location.href = _url + "tickets/admin/predefined_replies_delete/" + id + "/";
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
