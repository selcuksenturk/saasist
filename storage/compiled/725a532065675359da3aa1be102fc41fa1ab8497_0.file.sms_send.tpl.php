<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:10:49
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/sms_send.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a1698eb043_49276999',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '725a532065675359da3aa1be102fc41fa1ab8497' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/sms_send.tpl',
      1 => 1549836645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a1698eb043_49276999 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19386062235c60a1698e3de0_20924967', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_19386062235c60a1698e3de0_20924967 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_19386062235c60a1698e3de0_20924967',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Send SMS'];?>
</h4>
                </div>
                <div class="panel-body">

                    <div id="result"></div>

                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/init/send_post/" method="post" id="iform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="from"><?php echo $_smarty_tpl->tpl_vars['_L']->value['From'];?>
 </label>

                            <div class="col-lg-6"><input type="text" name="from" id="from" class="form-control " value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sms_sender_name'];?>
">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sms_to"><?php echo $_smarty_tpl->tpl_vars['_L']->value['To'];?>
 </label>

                            <div class="col-lg-6">
                                <input type="text" name="sms_to" id="sms_to" class="form-control ">

                                <span class="help-block"><a data-toggle="modal" href="#modal_find_contact">| <?php echo $_smarty_tpl->tpl_vars['_L']->value['Or Choose from contact'];?>
</a> </span>

                            </div>
                        </div>


                        <div class="form-group"><label class="col-lg-2 control-label" for="message"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMS'];?>
 </label>

                            <div class="col-lg-6">

                                <textarea class="form-control" name="message" id="message" rows="4"></textarea>

                                <p class="help-block" id="sms-counter">
                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Remaining'];?>
: <span class="remaining"></span> | <?php echo $_smarty_tpl->tpl_vars['_L']->value['Length'];?>
: <span class="length"></span> | <?php echo $_smarty_tpl->tpl_vars['_L']->value['Messages'];?>
: <span class="messages"></span>
                                </p>

                                
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-6">
                                <button class="btn btn-primary" type="submit" id="send"><i
                                            class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Send'];?>
</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>

    <div id="modal_find_contact" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Find Phone Number</h4>
        </div>
        <div class="modal-body">
            <div class="row">


                <select id="cid" name="cid" class="form-control">
                    <option value="">Search Contact...</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c']->value, 'cs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['phone'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['account'];?>
 - <?php echo $_smarty_tpl->tpl_vars['cs']->value['phone'];?>
  <?php if ($_smarty_tpl->tpl_vars['cs']->value['email'] != '') {?> [ <?php echo $_smarty_tpl->tpl_vars['cs']->value['email'];?>
 ]<?php }?></option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                </select>



            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="file_link" id="file_link" value="">
            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>

        </div>
    </div>


<?php
}
}
/* {/block "content"} */
}
