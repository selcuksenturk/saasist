<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:45:32
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/settings_add_role.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a98c9cfd93_14433590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da0d6dc0e920a87ee6a4cbadc51e7aa1d438ae05' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/settings_add_role.tpl',
      1 => 1549838730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a98c9cfd93_14433590 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12851829945c60a98c9b8f35_01700130', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_12851829945c60a98c9b8f35_01700130 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12851829945c60a98c9b8f35_01700130',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['New Role'];?>
</h5>

                </div>
                <div class="ibox-content">



                    <form action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/add_role_post/" method="post" accept-charset="utf-8">
                        <div class="form-group"><label for="rname" class="control-label"> <small class="req text-danger">* </small><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</label><input type="text" id="rname" name="rname" class="form-control" autofocus></div>

                        <hr>


                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-bordered roles no-margin">
                                    <thead>
                                    <tr>
                                        <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Permission'];?>
</th>
                                        <th class="text-center bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['View'];?>
</th>
                                        <th class="text-center bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</th>
                                        <th class="text-center bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Create'];?>
</th>
                                        <th class="text-center text-danger bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</th>
                                        <th class="bold"><?php echo $_smarty_tpl->tpl_vars['_L']->value['All Data'];?>
 <br><small><?php echo $_smarty_tpl->tpl_vars['_L']->value['view all data or only self created data'];?>
</small></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['permissions']->value, 'permission');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['permission']->value) {
?>

                                        <tr data-id="<?php echo $_smarty_tpl->tpl_vars['permission']->value['id'];?>
">


                                            <td class="bold">

                                                <?php if ($_smarty_tpl->tpl_vars['permission']->value['pname'] == 'Bank & Cash') {?>

                                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Bank n Cash'];?>


                                                <?php } elseif ($_smarty_tpl->tpl_vars['permission']->value['pname'] == 'Products & Services') {?>

                                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Products n Services'];?>


                                                <?php } else { ?>


                                                    <?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['permission']->value['pname']);?>



                                                <?php }?>

                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <div class="i-checks"><label  style="padding-left: 0"> <input name="<?php echo $_smarty_tpl->tpl_vars['permission']->value['shortname'];?>
_view" class="ib_checkbox" type="checkbox" value="yes"></label></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <div class="i-checks"><label> <input name="<?php echo $_smarty_tpl->tpl_vars['permission']->value['shortname'];?>
_edit" class="ib_checkbox" type="checkbox" value="yes"></label></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox">
                                                    <div class="i-checks"><label> <input name="<?php echo $_smarty_tpl->tpl_vars['permission']->value['shortname'];?>
_create" class="ib_checkbox" type="checkbox" value="yes"></label></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="checkbox checkbox-danger">
                                                    <div class="i-checks"><label> <input name="<?php echo $_smarty_tpl->tpl_vars['permission']->value['shortname'];?>
_delete" class="ib_checkbox" type="checkbox" value="yes"></label></div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="checkbox checkbox-danger">
                                                    <div class="i-checks"><label> <input name="<?php echo $_smarty_tpl->tpl_vars['permission']->value['shortname'];?>
_all_data" class="ib_checkbox" type="checkbox" value="yes"></label></div>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                    </tbody>
                                </table>

                                <button class="md-btn md-btn-primary" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>                        </div>

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
}
