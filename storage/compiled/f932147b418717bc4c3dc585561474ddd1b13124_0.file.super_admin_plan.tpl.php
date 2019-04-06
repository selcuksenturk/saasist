<?php
/* Smarty version 3.1.33, created on 2019-04-03 04:02:36
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_plan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca4689c9e4fe2_22918944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f932147b418717bc4c3dc585561474ddd1b13124' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_plan.tpl',
      1 => 1554278553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca4689c9e4fe2_22918944 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2498950635ca4689c9d9882_70304104', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10010819375ca4689c9e44d6_90237498', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_2498950635ca4689c9d9882_70304104 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2498950635ca4689c9d9882_70304104',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">

                    <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add plan'];?>
</h3>
                    <div class="hr-line-dashed"></div>

                    <form id="mainForm" method="post" action="">
                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Plan name'];?>
</label>
                            <input class="form-control" name="name" <?php if ($_smarty_tpl->tpl_vars['plan']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['plan']->value->name;?>
" <?php }?>>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Billing period'];?>
</label>
                                    <select class="form-control" name="billing_period">
                                        <option value="Monthly" <?php if ($_smarty_tpl->tpl_vars['plan']->value && $_smarty_tpl->tpl_vars['plan']->value->billing_period == 'Monthly') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Monthly'];?>
</option>
                                        <option value="Yearly" <?php if ($_smarty_tpl->tpl_vars['plan']->value && $_smarty_tpl->tpl_vars['plan']->value->billing_period == 'Yearly') {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Yearly'];?>
</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price per user'];?>
</label>
                                    <input class="form-control" name="price" <?php if ($_smarty_tpl->tpl_vars['plan']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['plan']->value->price;?>
" <?php }?>>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-bordered roles no-margin">
                                        <thead>
                                        <tr>
                                            <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Module'];?>
</th>
                                            <th class="text-center bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Enabled'];?>
</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['available_modules']->value, 'available_module');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['available_module']->value) {
?>
                                            <tr>


                                                <td class="bold">

                                                    <?php echo $_smarty_tpl->tpl_vars['available_module']->value['name'];?>


                                                </td>
                                                <td class="text-center">
                                                    <div class="checkbox">
                                                        <div class="i-checks"><label  style="padding-left: 0"> <input name="<?php echo $_smarty_tpl->tpl_vars['available_module']->value['short_name'];?>
" class="ib_checkbox" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['modules']->value) {?> <?php if (isset($_smarty_tpl->tpl_vars['modules']->value->{$_smarty_tpl->tpl_vars['available_module']->value['short_name']})) {?> checked <?php }?> <?php } else { ?> checked<?php }?> value="yes"></label></div>
                                                    </div>
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

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</label>
                            <textarea class="form-control" rows="10" name="description"><?php if ($_smarty_tpl->tpl_vars['plan']->value) {
echo $_smarty_tpl->tpl_vars['plan']->value->description;
}?></textarea>
                        </div>

                        <div class="form-group">

                            <?php if ($_smarty_tpl->tpl_vars['plan']->value) {?>
                                <input type="hidden" name="plan_id" value="<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
">
                            <?php }?>

                            <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
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
/* {block 'script'} */
class Block_10010819375ca4689c9e44d6_90237498 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_10010819375ca4689c9e44d6_90237498',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>

        $(function () {


            $( "#mainForm" ).submit(function( e ) {
                e.preventDefault();

                $.post( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/plan-post", $('#mainForm').serialize() ).done(function() {
                    window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/plans';
                }).fail(function(data) {
                    spNotify(data.responseText,'error');
                });

            });


            $(function() {

                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue'
                });



            });


        });

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
