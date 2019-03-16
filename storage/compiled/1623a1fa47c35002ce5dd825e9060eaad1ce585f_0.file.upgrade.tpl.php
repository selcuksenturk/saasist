<?php
/* Smarty version 3.1.33, created on 2019-02-25 09:17:41
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/upgrade.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c73f9052625c4_26895808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1623a1fa47c35002ce5dd825e9060eaad1ce585f' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/upgrade.tpl',
      1 => 1551104259,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c73f9052625c4_26895808 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10130234555c73f90525f1b0_14539073', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10285021805c73f905261e34_17348054', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_10130234555c73f90525f1b0_14539073 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10130234555c73f90525f1b0_14539073',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-6">


            <div class="panel">
                <div class="panel-body">
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Upgrade'];?>
</h4>
                    <div class="hr-line-dashed"></div>
                    <form method="post" id="form_settings_page">
                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Choose plan'];?>
</label>
                            <select class="form-control" id="default_page">
                                <option value="login">---</option>

                            </select>
                        </div>


                        <button class="btn btn-primary" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Subscribe'];?>
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
/* {block 'script'} */
class Block_10285021805c73f905261e34_17348054 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_10285021805c73f905261e34_17348054',
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
