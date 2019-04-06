<?php
/* Smarty version 3.1.33, created on 2019-04-03 04:06:28
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_workspace.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca46984af5327_98774662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51e7925eac4d2102c3fde3d1cc77a72b9ef23c60' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_workspace.tpl',
      1 => 1554277607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca46984af5327_98774662 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10972108575ca46984ae9ee9_01383627', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15128715295ca46984aeae71_89055419', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17218408405ca46984af4511_05000462', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_10972108575ca46984ae9ee9_01383627 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_10972108575ca46984ae9ee9_01383627',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dp/dist/datepicker.min.css" />
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_15128715295ca46984aeae71_89055419 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15128715295ca46984aeae71_89055419',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <h4><?php echo $_smarty_tpl->tpl_vars['selected_workspace']->value->name;?>
</h4>
                    <div class="hr-line-dashed"></div>

                    <form method="post" id="mainForm">

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</label>
                            <select class="form-control" name="subscription_status">
                                <option <?php if (!isset($_smarty_tpl->tpl_vars['selected_workspace_config']->value['subscribed'])) {?> selected<?php }?> value="0"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Not subscribed'];?>
</option>
                                <option <?php if (isset($_smarty_tpl->tpl_vars['selected_workspace_config']->value['subscribed'])) {?> selected<?php }?> value="1"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subscribed'];?>
</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Plan'];?>
</label>
                            <select class="form-control" name="workspace_plan">


                                <option <?php if (!isset($_smarty_tpl->tpl_vars['selected_workspace_config']->value['plan'])) {?> selected<?php }?> value="0"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default'];?>
</option>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'plan');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
?>

                                    <option value="<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
" <?php if (isset($_smarty_tpl->tpl_vars['selected_workspace_config']->value['plan']) && ($_smarty_tpl->tpl_vars['selected_workspace_config']->value['plan'] == $_smarty_tpl->tpl_vars['plan']->value->id)) {?> selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['plan']->value->name;?>
</option>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <?php if (isset($_smarty_tpl->tpl_vars['selected_workspace_config']->value['subscribed'])) {?>

                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'plan');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
?>

                                        <option value="<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['plan']->value->name;?>
</option>

                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                <?php }?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Trial ends at'];?>
</label>
                            <input class="form-control" name="trial_ends_at" value="<?php echo $_smarty_tpl->tpl_vars['selected_workspace']->value->trial_ends_at;?>
" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">
                        </div>

                        <div class="form-group">

                            <input type="hidden" name="selected_workspace_id" value="<?php echo $_smarty_tpl->tpl_vars['selected_workspace']->value->id;?>
">

                            <button type="submit" class="btn btn-primary" id="btnSubmit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>
                        </div>


                    </form>

                    <div class="hr-line-dashed"></div>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/workspaces"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Back To The List'];?>
</a>

                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="panel">
                <div class="panel-body">
                    <a href="javascript:;" onclick="confirmThenGoToUrl(event,'super_admin/delete-workspace/<?php echo $_smarty_tpl->tpl_vars['selected_workspace']->value->id;?>
');" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
                </div>
            </div>

        </div>

    </div>

<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_17218408405ca46984af4511_05000462 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_17218408405ca46984af4511_05000462',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/dp/dist/datepicker.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>

        $(function () {

            $('[data-toggle="datepicker"]').datepicker();


            var $btnSubmit = $('#btnSubmit');
            var $mainForm = $('#mainForm');

            $mainForm.on('submit',function (e) {
                e.preventDefault();
                $btnSubmit.prop('disabled',true);
                $.post( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/workspace_save", $mainForm.serialize() ).done(function() {
                    window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/workspace/<?php echo $_smarty_tpl->tpl_vars['selected_workspace']->value->id;?>
';
                }).fail(function(data) {
                    spNotify(data.responseText,'error');
                    $btnSubmit.prop('disabled',false);
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
