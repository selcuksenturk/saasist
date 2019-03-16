<?php
/* Smarty version 3.1.33, created on 2019-02-18 06:34:37
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c6a984dbe2827_02113703',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6003b3f57535b186290d214ba904cd5c29c18878' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_dashboard.tpl',
      1 => 1550489675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6a984dbe2827_02113703 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21276311005c6a984dbb1363_13600924', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8610306045c6a984dbe2029_11510714', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_21276311005c6a984dbb1363_13600924 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_21276311005c6a984dbb1363_13600924',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Dashboard'];?>
</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Users'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $_smarty_tpl->tpl_vars['total_users']->value;?>
</h1>
                    <small><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total users'];?>
</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Workspaces'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $_smarty_tpl->tpl_vars['total_workspaces']->value;?>
</h1>
                    <small><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total workspaces'];?>
</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Monthly recurring revenue'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $_smarty_tpl->tpl_vars['mrr']->value;?>
</h1>
                    <small><?php echo $_smarty_tpl->tpl_vars['_L']->value['Estimate monthly recurring revenue'];?>
</small>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Latest users'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['saas_users']->value, 'saas_user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['saas_user']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['saas_user']->value->id == $_smarty_tpl->tpl_vars['user']->value->id) {?>
                                <?php continue 1;?>
                            <?php }?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['user']->value->fullname;?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['user']->value->username;?>
</td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['saas_user']->value->created_at) {?>
                                        <?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['saas_user']->value->created_at));?>

                                        <?php } else { ?>
                                        ---
                                    <?php }?>

                                </td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                    </table>
                </div>
            </div>

        </div>


        <div class="col-md-6">


            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Latest workspaces'];?>
</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date'];?>
</th>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['saas_workspaces']->value, 'saas_workspace');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['saas_workspace']->value) {
?>

                            <?php if ($_smarty_tpl->tpl_vars['saas_workspace']->value->id == $_smarty_tpl->tpl_vars['user']->value->workspace_id) {?>
                                <?php continue 1;?>
                            <?php }?>

                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['saas_workspace']->value->name;?>
</td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['saas_workspace']->value->is_active) {?>
                                        <label class="label label-success"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Active'];?>
</label>
                                        <?php } else { ?>
                                        <label class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Inactive'];?>
</label>
                                    <?php }?>
                                </td>
                                <td class="text-right amount"><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['saas_workspace']->value->created_at));?>
</td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



                    </table>
                </div>
            </div>

        </div>


    </div>

<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_8610306045c6a984dbe2029_11510714 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_8610306045c6a984dbe2029_11510714',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>

    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
