<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:31:36
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/kb_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a648bfd478_51196621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f75541d06e98177904506510b51d4764306321b' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/kb_edit.tpl',
      1 => 1549837892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a648bfd478_51196621 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8875132615c60a648bd69a1_42913312', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3763193365c60a648bedb81_22852980', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_8875132615c60a648bd69a1_42913312 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8875132615c60a648bd69a1_42913312',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row kb-page">
                                                        <div class="col-md-8" id="kb_add_area">
            <div class="panel panel-default">
                <h3 class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New Article'];?>
 </h3>
                <div class="panel-body">


                    <form id="ib_form" class="form-horizontal push-10-t push-10" method="post">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="title" name="title" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
" autofocus>
                                    <label for="title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Title'];?>
</label>

                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="description" name="description" rows="3"><?php echo $_smarty_tpl->tpl_vars['val']->value['description'];?>
</textarea>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-xs-12">




                                
                                <input type="hidden" name="kbid" id="kbid" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">

                                <button class="btn btn-primary" id="ib_form_submit" type="submit"><i class="fa fa-send push-5-r"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="panel panel-default">
                <h3 class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Group'];?>
 </h3>

                <div class="panel-body">


                    <form id="ib_add_group" class="form-horizontal push-10-t push-10" method="post">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="gname" name="gname">
                                    <label for="gname"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</label>

                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-xs-12">


                                <button class="btn btn-primary" id="ib_add_group_submit" type="submit"><i class="fa fa-check push-5-r"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                            </div>
                        </div>
                    </form>


                    <div id="div_groups">

                    </div>



                </div>
            </div>

            <div class="panel panel-default">
                <h3 class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Latest Articles'];?>
 </h3>

                <div class="panel-body">


                    <div class="topics-list">
                        <ul>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['kbs']->value, 'kb');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kb']->value) {
?>
                                <li><a href="javascript:void(0)" id="k<?php echo $_smarty_tpl->tpl_vars['kb']->value['id'];?>
" class="kb_view"> <?php echo $_smarty_tpl->tpl_vars['kb']->value['title'];?>
 </a></li>

                                <?php
}
} else {
?>
                                <p class="text-center">You do not have any Article</p>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        </ul>
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
class Block_3763193365c60a648bedb81_22852980 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3763193365c60a648bedb81_22852980',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/tinymce/tinymce.min.js"><?php echo '</script'; ?>
>

    <?php if ($_smarty_tpl->tpl_vars['user']->value['language'] != 'en' || $_smarty_tpl->tpl_vars['user']->value['language'] != '') {?>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/tinymce/langs/<?php echo getTinyMceLocale($_smarty_tpl->tpl_vars['user']->value['language']);?>
.js"><?php echo '</script'; ?>
>
    <?php }?>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/js/editor.js?v=3"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        function deleteKb(kbid) {
            bootbox.confirm(_L['are_you_sure'], function(result) {
                if(result){
                    window.location.href = base_url + "kb/a/delete/" + kbid;
                }
            });
        }

        function loadKbGroups() {

            var $div_groups = $("#div_groups");

            $div_groups.html(block_msg);

            $.get( base_url + "kb/a/ajax_groups/"+$("#kbid").val(), function( data ) {
                $div_groups.html(data);
                $('.ib_input_groups').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'icheckbox_square-blue',
                    increaseArea: '20%' // optional
                });

            });

        }

        $(function() {

            loadKbGroups();

            ib_editor("#description",400,true,true,'<?php echo getTinyMceLocale($_smarty_tpl->tpl_vars['user']->value['language']);?>
');

            var ib_form_submit = $("#ib_form_submit");

            var kb_add_area = $("#kb_add_area");

            ib_form_submit.on('click', function(e) {
                e.preventDefault();
                kb_add_area.block({ message: block_msg });
                var selected_groups = [];

                $('.ib_input_groups').filter(':checked').each(function() {
                    selected_groups.push(this.id);
                });
                console.log(selected_groups);
                $.post( base_url + "kb/a/save/", { title: $("#title").val(), description: tinyMCE.activeEditor.getContent(), kbid: $("#kbid").val(),groups: selected_groups })
                    .done(function (data) {
                        if ($.isNumeric(data)) {

                            window.location = base_url + 'kb/a/edit/' + data;

                        }
                        else {
                            kb_add_area.unblock();
                            toastr.error(data);

                        }
                    });

            });


            $(".kb_view").on('click',function (e) {
                e.preventDefault();
                iModal.ajax(base_url + "kb/a/a_view/"+this.id, $(this).html());
            });

            $("#ib_add_group_submit").on('click',function (e) {
                e.preventDefault();

                $("#ib_add_group").block({ message: block_msg });

                $.post(base_url + 'kb/a/group_create/', { gname: $("#gname").val() }, function (data) {

                    $("#ib_add_group").unblock();

                    $("#gname").val('');

                    loadKbGroups();

                })

            })


        });
    <?php echo '</script'; ?>
>

<?php
}
}
/* {/block "script"} */
}
