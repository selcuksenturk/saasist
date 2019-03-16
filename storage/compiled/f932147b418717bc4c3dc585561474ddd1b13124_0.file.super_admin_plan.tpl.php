<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:06:58
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_plan.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a082421661_67992550',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f932147b418717bc4c3dc585561474ddd1b13124' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_plan.tpl',
      1 => 1549836416,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a082421661_67992550 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12480497115c60a082416027_17555872', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11309183195c60a082420ae2_56481257', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_12480497115c60a082416027_17555872 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12480497115c60a082416027_17555872',
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
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Plan type'];?>
</label>
                            <select class="form-control" name="api_name">
                                <option value="basic" <?php if ($_smarty_tpl->tpl_vars['plan']->value && $_smarty_tpl->tpl_vars['plan']->value->api_name == 'basic') {?>selected<?php }?>>Basic [Has basic features]</option>
                                <option value="standard" <?php if ($_smarty_tpl->tpl_vars['plan']->value && $_smarty_tpl->tpl_vars['plan']->value->api_name == 'standard') {?>selected<?php }?>>Standard [Has standard features]</option>
                                <option value="plus" <?php if ($_smarty_tpl->tpl_vars['plan']->value && $_smarty_tpl->tpl_vars['plan']->value->api_name == 'plus') {?>selected<?php }?>>Plus [Has all features]</option>
                            </select>
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
class Block_11309183195c60a082420ae2_56481257 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_11309183195c60a082420ae2_56481257',
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


        });

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
