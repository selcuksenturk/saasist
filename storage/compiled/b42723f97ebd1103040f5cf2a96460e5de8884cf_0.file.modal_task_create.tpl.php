<?php
/* Smarty version 3.1.33, created on 2019-03-07 08:23:10
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/modal_task_create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c811b3e6a0ba2_89195605',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b42723f97ebd1103040f5cf2a96460e5de8884cf' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/modal_task_create.tpl',
      1 => 1538499748,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c811b3e6a0ba2_89195605 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="txt_modal_header">
        <?php if ($_smarty_tpl->tpl_vars['edit']->value) {?>
                        <?php echo $_smarty_tpl->tpl_vars['task']->value['title'];?>

        <?php } else { ?>
            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New'];?>

        <?php }?>
    </h3>
</div>
<div class="modal-body">


    <form id="ib-modal-form" method="post">

                                        
        <div class="form-group">
            <label for="title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subject'];?>
</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $_smarty_tpl->tpl_vars['task']->value['title'];?>
">
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="start_date"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Start Date'];?>
</label>
                    <input type="text" class="form-control" id="start_date" name="start_date" value="<?php echo $_smarty_tpl->tpl_vars['task']->value['started'];?>
">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="due_date"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due Date'];?>
</label>
                    <input type="text" class="form-control" id="due_date" name="due_date" value="<?php echo $_smarty_tpl->tpl_vars['task']->value['due_date'];?>
">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="priority"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Priority'];?>
</label>
                    <select class="form-control" id="priority" name="priority">
                        <option value="" <?php if ($_smarty_tpl->tpl_vars['task']->value['priority'] == 'None' || $_smarty_tpl->tpl_vars['task']->value['priority'] == '') {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
</option>
                        <option value="Low" <?php if ($_smarty_tpl->tpl_vars['task']->value['priority'] == 'Low') {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Low'];?>
</option>
                        <option value="Medium" <?php if ($_smarty_tpl->tpl_vars['task']->value['priority'] == 'Medium') {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Medium'];?>
</option>
                        <option value="High" <?php if ($_smarty_tpl->tpl_vars['task']->value['priority'] == 'High') {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['High'];?>
</option>
                        <option value="Urgent" <?php if ($_smarty_tpl->tpl_vars['task']->value['priority'] == 'Urgent') {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Urgent'];?>
</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="rel_type"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Related To'];?>
</label>
                    <select class="form-control" id="rel_type" name="rel_type">
                        <option value="None">--<?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
--</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['relations']->value, 'relation');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['relation']->value) {
?>
                            <option><?php echo $_smarty_tpl->tpl_vars['relation']->value;?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" style="display: none;" id="rel_id_input">
                    <label for="rel_id" id="lbl_rel_id"></label>
                    <select class="form-control" id="rel_id">
                        <option value="None">--<?php echo $_smarty_tpl->tpl_vars['_L']->value['None'];?>
--</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="subject"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>
            <textarea class="form-control" id="description" name="description" rows="10"><?php echo $_smarty_tpl->tpl_vars['task']->value['description'];?>
</textarea>
        </div>


        <input type="hidden" id="status" name="status" value="<?php echo $_smarty_tpl->tpl_vars['task']->value['status'];?>
">
        <input type="hidden" id="task_id" name="task_id" value="<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
">
    </form>

</div>
<div class="modal-footer">


    <button type="button" data-dismiss="modal" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
</button>
    <button class="btn btn-primary modal_submit" type="submit" id="modal_submit"><i
                class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
</div><?php }
}
