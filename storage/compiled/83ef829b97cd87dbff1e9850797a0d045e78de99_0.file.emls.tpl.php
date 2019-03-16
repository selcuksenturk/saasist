<?php
/* Smarty version 3.1.33, created on 2019-03-07 08:47:48
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/emls.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8121047823b0_01301205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83ef829b97cd87dbff1e9850797a0d045e78de99' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/emls.tpl',
      1 => 1551966463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8121047823b0_01301205 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9796759975c81210477f397_62326851', "content");
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_9796759975c81210477f397_62326851 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9796759975c81210477f397_62326851',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Settings'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="eml" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/eml-post">




                        <div class="form-group">
                            <label for="sysemail"><?php echo $_smarty_tpl->tpl_vars['_L']->value['System Email'];?>
</label>
                            <input type="text" class="form-control" id="sysemail" name="sysemail" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sysEmail'];?>
">
                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['All Outgoing Email Will'];?>
</span>
                        </div>



                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
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
