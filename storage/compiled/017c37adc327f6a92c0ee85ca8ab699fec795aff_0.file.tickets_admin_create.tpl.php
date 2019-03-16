<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:16:12
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/tickets_admin_create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a2ac846f98_91304107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '017c37adc327f6a92c0ee85ca8ab699fec795aff' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/tickets_admin_create.tpl',
      1 => 1543253759,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a2ac846f98_91304107 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16581089155c60a2ac839ef4_70137588', "content");
?>




<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_16581089155c60a2ac839ef4_70137588 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16581089155c60a2ac839ef4_70137588',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">

        <div class="col-md-12">
            <div class="ibox float-e-margins" id="ib_box">
                <div class="ibox-title">


                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Open Ticket'];?>
</h5>


                </div>
                <div class="ibox-content">


                    <form id="create_ticket" class="form-horizontal push-10-t push-10" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="cid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
</label>

                                <select id="cid" name="cid" class="form-control">
                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
...</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customers']->value, 'cs');
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
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="subject" name="subject" autofocus>
                                    <label for="subject"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subject'];?>
</label>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <div class="form-material floating">
                                    <select class="form-control" id="department" name="department" size="1">

                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['deps']->value, 'dep');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dep']->value) {
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['dep']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['dep']->value['dname'];?>
</option>
                                            <?php
}
} else {
?>
                                            <option value="0">None</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                    </select>
                                    <label for="department"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Department'];?>
</label>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-material floating">
                                    <select class="form-control" id="urgency" name="urgency" size="1">
                                        <option value="High"><?php echo $_smarty_tpl->tpl_vars['_L']->value['High'];?>
</option>
                                        <option value="Medium" selected><?php echo $_smarty_tpl->tpl_vars['_L']->value['Medium'];?>
</option>
                                        <option value="Low"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Low'];?>
</option>

                                    </select>
                                    <label for="urgency"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Priority'];?>
</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="content"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Message'];?>
</label>
                                <textarea id="content"  class="form-control sysedit" name="content"></textarea>
                                <div class="help-block"><a data-toggle="modal" href="#modal_add_item"><i class="fa fa-paperclip"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Attach File'];?>
</a> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">

                                <input type="hidden" name="attachments" id="attachments" value="">

                                <button class="btn btn-primary" id="ib_form_submit" type="submit"><i class="fa fa-send push-5-r"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>

    </div>

    <div id="modal_add_item" class="modal fade" tabindex="-1" data-width="600" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Attach File'];?>
</h4>
        </div>
        <div class="modal-body">
            <div class="row">



                <div class="col-md-12">
                    <form action="" class="dropzone" id="upload_container">

                        <div class="dz-message">
                            <h3> <i class="fa fa-cloud-upload"></i>  <?php echo $_smarty_tpl->tpl_vars['_L']->value['Drop File Here'];?>
</h3>
                            <br />
                            <span class="note"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Or'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['Click to Upload'];?>
</span>
                        </div>

                    </form>


                </div>




            </div>
        </div>
        <div class="modal-footer">

            <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Close'];?>
</button>

        </div>
    </div>

<?php
}
}
/* {/block "content"} */
}
