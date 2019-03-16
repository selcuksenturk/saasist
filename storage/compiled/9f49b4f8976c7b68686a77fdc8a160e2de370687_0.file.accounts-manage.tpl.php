<?php
/* Smarty version 3.1.33, created on 2019-02-10 16:45:04
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/accounts-manage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c609b607dcb56_80751658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f49b4f8976c7b68686a77fdc8a160e2de370687' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/accounts-manage.tpl',
      1 => 1512475675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c609b607dcb56_80751658 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15857014665c609b607d27e1_15353540', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15748587935c609b607dc404_61957011', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_15857014665c609b607d27e1_15353540 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15857014665c609b607d27e1_15353540',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage_Accounts'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Description'];?>
</th>
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['description'];?>
</td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/edit/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>

                                    <?php if ($_smarty_tpl->tpl_vars['ds']->value['ib_url'] != '') {?>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['ds']->value['ib_url'];?>
" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-globe"></i></a>
                                    <?php }?>

                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
accounts/delete/<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" id="did<?php echo $_smarty_tpl->tpl_vars['ds']->value['id'];?>
" class="cdelete btn btn-danger btn-xs"><i class="fa fa-trash"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
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


    <input type="hidden" id="_lan_are_you_sure" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['are_you_sure'];?>
">


<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_15748587935c609b607dc404_61957011 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_15748587935c609b607dc404_61957011',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>
        $(function () {
            $(".cdelete").click(function (e) {
                e.preventDefault();
                var id = this.id;
                var lan_msg = $("#_lan_are_you_sure").val();
                bootbox.confirm(lan_msg, function(result) {
                    if(result){
                        var _url = $("#_url").val();
                        window.location.href = _url + "accounts/delete/" + id + '/';
                    }
                });
            });
        })
    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block "script"} */
}
