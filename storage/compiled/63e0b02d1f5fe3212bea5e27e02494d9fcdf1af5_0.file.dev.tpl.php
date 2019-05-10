<?php
/* Smarty version 3.1.33, created on 2019-05-07 07:54:28
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/dev.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd171f4b02181_47682936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63e0b02d1f5fe3212bea5e27e02494d9fcdf1af5' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/dev.tpl',
      1 => 1557230065,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd171f4b02181_47682936 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10363011795cd171f4b00c46_22606999', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_10363011795cd171f4b00c46_22606999 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10363011795cd171f4b00c46_22606999',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">

                    <h3> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Developer'];?>
 </h3>



                    <hr>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
demo/create" class="btn btn-primary">Create Demo Workspace</a>


                </div>
            </div>
        </div>



    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_company" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>
<?php
}
}
/* {/block "content"} */
}
