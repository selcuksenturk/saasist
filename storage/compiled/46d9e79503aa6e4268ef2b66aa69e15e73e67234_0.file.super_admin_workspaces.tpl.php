<?php
/* Smarty version 3.1.33, created on 2019-05-01 03:54:53
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_workspaces.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc950cd65e491_62544084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46d9e79503aa6e4268ef2b66aa69e15e73e67234' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_workspaces.tpl',
      1 => 1556695882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc950cd65e491_62544084 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16661669065cc950cd642b20_70738235', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1760626555cc950cd644610_32071900', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10108338735cc950cd658971_73991517', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_16661669065cc950cd642b20_70738235 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_16661669065cc950cd642b20_70738235',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/footable/css/footable.core.min.css" />
<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_1760626555cc950cd644610_32071900 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1760626555cc950cd644610_32071900',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Workspaces'];?>
</h4>
                <div class="hr-line-dashed"></div>

                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" id="foo_filter" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..."/>

                            </div>
                        </div>

                    </div>
                </form>

                <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                    <thead>
                    <tr>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Users'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['workspaces']->value, 'workspace');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['workspace']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['workspace']->value->id == 1) {?>
                            <?php continue 1;?>
                        <?php }?>
                        <tr>
                            <td  data-value="<?php echo $_smarty_tpl->tpl_vars['workspace']->value->id;?>
">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/workspace/<?php echo $_smarty_tpl->tpl_vars['workspace']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['workspace']->value->name;?>
</a>
                            </td>
                            <td>
                                <?php if (isset($_smarty_tpl->tpl_vars['workspace_users']->value[$_smarty_tpl->tpl_vars['workspace']->value->id])) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['workspace_users']->value[$_smarty_tpl->tpl_vars['workspace']->value->id], 'workspace_user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['workspace_user']->value) {
?>
                                        <?php echo $_smarty_tpl->tpl_vars['workspace_user']->value['fullname'];?>
 <br>
                                        <span class="font-italic"><?php echo $_smarty_tpl->tpl_vars['workspace_user']->value['username'];?>
</span>
                                        <div class="hr-line-dashed"></div>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php }?>
                            </td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['workspace']->value->created_at) {?>

                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Created at'];?>
: <?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['workspace']->value->created_at));?>
 <br>

                                    <?php } else { ?>
                                    ---
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['workspace']->value->trial_ends_at) {?>


                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Trial ends at'];?>
: <?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime('+30 days',strtotime($_smarty_tpl->tpl_vars['workspace']->value->created_at)));?>




                                <?php }?>

                                </td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['workspace']->value->is_active) {?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/workspace-suspend/<?php echo $_smarty_tpl->tpl_vars['workspace']->value->id;?>
" class="btn btn-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Suspend'];?>
</a>
                                    <?php } else { ?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/workspace-unsuspend/<?php echo $_smarty_tpl->tpl_vars['workspace']->value->id;?>
" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Un suspend'];?>
</a>
                                <?php }?>



                            </td>

                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <ul class="pagination">
                            </ul>
                        </td>
                    </tr>
                    </tfoot>

                </table>

            </div>
        </div>
    </div>

<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_10108338735cc950cd658971_73991517 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_10108338735cc950cd658971_73991517',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/footable/js/footable.all.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/numeric.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>


        $(function() {

            $('.footable').footable();

            $('.amount').autoNumeric('init', {

                aSign: '<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 ',
                dGroup: <?php echo $_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'];?>
,
                aPad: <?php echo $_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'];?>
,
                pSign: '<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
',
                aDec: '<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
',
                aSep: '<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
',
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'

            });




        });



    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
