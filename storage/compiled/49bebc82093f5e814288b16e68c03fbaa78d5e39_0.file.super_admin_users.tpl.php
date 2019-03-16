<?php
/* Smarty version 3.1.33, created on 2019-03-07 06:27:03
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c81000715c564_87297792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49bebc82093f5e814288b16e68c03fbaa78d5e39' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_users.tpl',
      1 => 1551957995,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c81000715c564_87297792 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13308268165c810007150e42_28175363', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_989687395c810007151e69_12478258', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11469135c81000715a5b8_03877130', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_13308268165c810007150e42_28175363 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_13308268165c810007150e42_28175363',
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
class Block_989687395c810007151e69_12478258 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_989687395c810007151e69_12478258',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Users'];?>
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
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['User'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Workspace'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['workspace_users']->value, 'workspace_user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['workspace_user']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->id == $_smarty_tpl->tpl_vars['workspace_user']->value->id) {?>
                            <?php continue 1;?>
                        <?php }?>
                        <tr>
                            <td  data-value="<?php echo $_smarty_tpl->tpl_vars['workspace_user']->value->id;?>
">

                                <?php echo $_smarty_tpl->tpl_vars['workspace_user']->value->fullname;?>


                                <div class="hr-line-dashed"></div>

                                <button onclick="confirmThenGoToUrl(event,'super_admin/login_as_user/<?php echo $_smarty_tpl->tpl_vars['workspace_user']->value->id;?>
');" class="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Login as'];?>
 <?php echo $_smarty_tpl->tpl_vars['workspace_user']->value->fullname;?>
</button>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['workspace_user']->value->username;?>






                            </td>
                            <td>
                                <?php if (isset($_smarty_tpl->tpl_vars['workspaces']->value[$_smarty_tpl->tpl_vars['workspace_user']->value->workspace_id])) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['workspaces']->value[$_smarty_tpl->tpl_vars['workspace_user']->value->workspace_id]['name'];?>

                                <?php }?>
                            </td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['workspace_user']->value->created_at) {?>
                                    <?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['workspace_user']->value->created_at));?>

                                    <?php } else { ?>
                                    ---
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
class Block_11469135c81000715a5b8_03877130 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_11469135c81000715a5b8_03877130',
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
