<?php
/* Smarty version 3.1.33, created on 2019-03-07 06:35:53
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/billing.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8102192c0234_54934412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72e0dbb76ea454aa06d610f60fc58ed9888198ed' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/billing.tpl',
      1 => 1551127251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8102192c0234_54934412 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14105709315c8102192a7932_60700137', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3949310225c8102192bf577_42520814', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_14105709315c8102192a7932_60700137 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14105709315c8102192a7932_60700137',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-6">
            <?php if ($_smarty_tpl->tpl_vars['active_invoice']->value) {?>

                <div class="panel">
                    <div class="panel-body">
                        <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Pay Now'];?>
</h4>

                        <table class="table table-bordered table-hover sys_table">
                            <thead>
                            <tr>
                                <th>#</th>

                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>


                                <th class="text-right">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/iview/<?php echo $_smarty_tpl->tpl_vars['active_invoice']->value->id;?>
/token_<?php echo $_smarty_tpl->tpl_vars['active_invoice']->value->vtoken;?>
/"><?php echo $_smarty_tpl->tpl_vars['active_invoice']->value->invoicenum;
if ($_smarty_tpl->tpl_vars['active_invoice']->value->cn != '') {?> <?php echo $_smarty_tpl->tpl_vars['active_invoice']->value->cn;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['active_invoice']->value->id;?>
 <?php }?></a> </td>

                                <td><?php echo formatCurrency($_smarty_tpl->tpl_vars['active_invoice']->value->total,$_smarty_tpl->tpl_vars['super_home_currency']->value);?>
</td>

                                <td class="text-right">

                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
client/iview/<?php echo $_smarty_tpl->tpl_vars['active_invoice']->value->id;?>
/token_<?php echo $_smarty_tpl->tpl_vars['active_invoice']->value->vtoken;?>
/" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</a>

                                </td>
                            </tr>
                            </tbody>



                        </table>
                    </div>
                </div>

                <?php } else { ?>

                <div class="panel">
                    <div class="panel-body">
                        <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Upgrade'];?>
</h4>
                        <div class="hr-line-dashed"></div>

                        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Current plan'];?>
 :</strong> <?php echo $_smarty_tpl->tpl_vars['current_plan']->value;?>


                        <hr>

                        <form method="post" id="form_billing">
                            <div class="form-group">
                                <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Plan'];?>
</label>
                                <select class="form-control" id="plan" name="plan">

                                    <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Choose plan'];?>
...</option>

                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plans']->value, 'plan');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['plan']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['plan']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['plan']->value->name;?>
 [ <?php echo $_smarty_tpl->tpl_vars['plan']->value->billing_period;?>
 - <?php echo formatCurrency($_smarty_tpl->tpl_vars['plan']->value->price,$_smarty_tpl->tpl_vars['super_home_currency']->value);?>
 ]</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                </select>
                            </div>


                            <button class="btn btn-primary" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subscribe'];?>
</button>

                        </form>
                    </div>
                </div>
            <?php }?>
        </div>

        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Billing history'];?>
</h4>
                    <div class="hr-line-dashed"></div>

                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['No Data Available'];?>


                </div>
            </div>
        </div>

    </div>

<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_3949310225c8102192bf577_42520814 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3949310225c8102192bf577_42520814',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>

        $(function () {

            $( "#form_billing" ).submit(function( e ) {

                e.preventDefault();

                $.post( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/subscribe_post", $('#form_billing').serialize() ).done(function(data) {
                    location.reload();
                }).fail(function(data) {
                    spNotify(data.responseText,'error');
                });

            });

        })

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
