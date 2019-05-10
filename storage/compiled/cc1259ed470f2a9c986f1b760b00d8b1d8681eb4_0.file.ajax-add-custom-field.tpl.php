<?php
/* Smarty version 3.1.33, created on 2019-05-09 05:46:44
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/ajax-add-custom-field.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd3f704dad347_24740952',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc1259ed470f2a9c986f1b760b00d8b1d8681eb4' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/ajax-add-custom-field.tpl',
      1 => 1556695881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd3f704dad347_24740952 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Custom Field'];?>
</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form role="form" name="add_form" id="add_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/customfields-post">
                    <div class="form-group">
                        <label for="fieldname"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Field Name'];?>
</label>
                        <input type="text" class="form-control" id="fieldname" name="fieldname">
                    </div>

                    <div class="form-group">
                        <label for="fieldtype"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Field Type'];?>
</label>
                        <select class="form-control" name="fieldtype" id="fieldtype">

                            <option value="text" selected=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Text Box'];?>
</option>
                            <option value="password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Password'];?>
</option>
                            <option value="dropdown"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Drop Down'];?>
</option>
                            <option value="textarea"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Text Area'];?>
</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>
                        <input type="text" class="form-control" id="description" name="description">
                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Optional Description help'];?>
</span>
                    </div>
                    <div class="form-group">
                        <label for="validation"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Validation'];?>
</label>
                        <input type="text" class="form-control" id="validation" name="validation">
                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Regular Expression Validation'];?>
</span>
                    </div>
                    <div class="form-group">
                        <label for="options"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Options'];?>
</label>
                        <input type="text" class="form-control" id="options" name="options">
                        <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Comma Separated List'];?>
</span>
                    </div>

                    <div class="form-group">
                        <label for="options"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Show in View Invoice'];?>
</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="showinvoice" id="showInvoiceYes" value="Yes">
                                <?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>

                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="showinvoice" id="showInvoiceNo" value="No" checked>
                                <?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>

                            </label>
                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">

        <button type="button" class="btn btn-primary" id="add_submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
    </div>




<?php }
}
