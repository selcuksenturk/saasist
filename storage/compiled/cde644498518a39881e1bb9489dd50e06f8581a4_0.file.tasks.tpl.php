<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:31:54
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/tasks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a65a059559_00905916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cde644498518a39881e1bb9489dd50e06f8581a4' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/tasks.tpl',
      1 => 1543255071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a65a059559_00905916 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4833687685c60a65a044bf1_34322955', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_4833687685c60a65a044bf1_34322955 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4833687685c60a65a044bf1_34322955',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">

        <div class="col-md-12">


            <div style="overflow: auto;">

                <div style="min-width: 1545px; max-width: 1545px;">

                    <!--sütun başlangıç-->
                    <div class="panel panel-deep-orange kanban-col">
                        <div class="panel-heading">

                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Not Started'];?>


                        </div>

                        <div class="panel-body">
                            <div id="not_started" class="kanban-centered kanban-droppable-area">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks_not_started']->value, 'tns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tns']->value) {
?>
                                    <article class="kanban-entry cursor-move" id="item_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" draggable="true">
                                        <div class="kanban-entry-inner">
                                            <div class="kanban-label">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" id="v_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" class="v_item"><?php echo $_smarty_tpl->tpl_vars['tns']->value['title'];?>
</a>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['tns']->value['aid']);?>
" class="img-circle" style="max-width: 30px; margin-bottom: 5px;" alt="<?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>



                                                    </div>


                                                    <div class="col-md-12">

                                                        <small class="mmnt"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tns']->value['created_at'];
$_prefixVariable1 = ob_get_clean();
echo strtotime($_prefixVariable1);?>
</small>
                                                                                                                                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>



                                                                                                
                                                                                                                                                                                                                                                                                                
                                                                                                                                                
                                                                                                
                    </div>
                    <!--sütun bitiş-->
                    <!--sütun başlangıç-->
                    <div class="panel panel-primary kanban-col">
                        <div class="panel-heading">

                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['In Progress'];?>


                        </div>
                        <div class="panel-body">
                            <div id="in_progress" class="kanban-centered kanban-droppable-area">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks_in_progress']->value, 'tns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tns']->value) {
?>
                                    <article class="kanban-entry cursor-move" id="item_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" draggable="true">
                                        <div class="kanban-entry-inner">
                                            <div class="kanban-label">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" id="v_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" class="v_item"><?php echo $_smarty_tpl->tpl_vars['tns']->value['title'];?>
</a>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['tns']->value['aid']);?>
" class="img-circle" style="max-width: 30px; margin-bottom: 5px;" alt="<?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>



                                                    </div>


                                                    <div class="col-md-12">

                                                        <small class="mmnt"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tns']->value['created_at'];
$_prefixVariable2 = ob_get_clean();
echo strtotime($_prefixVariable2);?>
</small>
                                                                                                                                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </div>
                        </div>

                    </div>
                    <!--sütun bitiş-->
                    <!--sütun başlangıç-->
                    <div class="panel panel-light-green kanban-col">
                        <div class="panel-heading">

                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Completed'];?>


                        </div>
                        <div class="panel-body">
                            <div id="completed" class="kanban-centered kanban-droppable-area">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks_completed']->value, 'tns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tns']->value) {
?>
                                    <article class="kanban-entry cursor-move" id="item_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" draggable="true">
                                        <div class="kanban-entry-inner">
                                            <div class="kanban-label">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" id="v_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" class="v_item"><?php echo $_smarty_tpl->tpl_vars['tns']->value['title'];?>
</a>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['tns']->value['aid']);?>
" class="img-circle" style="max-width: 30px; margin-bottom: 5px;" alt="<?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>



                                                    </div>


                                                    <div class="col-md-12">

                                                        <small class="mmnt"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tns']->value['created_at'];
$_prefixVariable3 = ob_get_clean();
echo strtotime($_prefixVariable3);?>
</small>
                                                                                                                                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </div>
                        </div>

                    </div>

                    <div class="panel panel-blue-grey kanban-col">
                        <div class="panel-heading">

                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Deferred'];?>


                        </div>
                        <div class="panel-body">
                            <div id="deferred" class="kanban-centered kanban-droppable-area">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks_deferred']->value, 'tns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tns']->value) {
?>
                                    <article class="kanban-entry cursor-move" id="item_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" draggable="true">
                                        <div class="kanban-entry-inner">
                                            <div class="kanban-label">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" id="v_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" class="v_item"><?php echo $_smarty_tpl->tpl_vars['tns']->value['title'];?>
</a>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['tns']->value['aid']);?>
" class="img-circle" style="max-width: 30px; margin-bottom: 5px;" alt="<?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>



                                                    </div>


                                                    <div class="col-md-12">

                                                        <small class="mmnt"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tns']->value['created_at'];
$_prefixVariable4 = ob_get_clean();
echo strtotime($_prefixVariable4);?>
</small>
                                                                                                                                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </div>
                        </div>

                    </div>

                    <div class="panel panel-grey kanban-col" style="border-right: 1px solid #ffffff;">
                        <div class="panel-heading">

                            <?php echo $_smarty_tpl->tpl_vars['_L']->value['Waiting on someone else'];?>


                        </div>
                        <div class="panel-body">
                            <div id="waiting_on_someone" class="kanban-centered kanban-droppable-area">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks_waiting']->value, 'tns');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tns']->value) {
?>
                                    <article class="kanban-entry cursor-move" id="item_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" draggable="true">
                                        <div class="kanban-entry-inner">
                                            <div class="kanban-label">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" id="v_<?php echo $_smarty_tpl->tpl_vars['tns']->value['id'];?>
" class="v_item"><?php echo $_smarty_tpl->tpl_vars['tns']->value['title'];?>
</a>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <img src="<?php echo getAdminImage($_smarty_tpl->tpl_vars['tns']->value['aid']);?>
" class="img-circle" style="max-width: 30px; margin-bottom: 5px;" alt="<?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tns']->value['created_by'];?>



                                                    </div>


                                                    <div class="col-md-12">

                                                        <small class="mmnt"><?php ob_start();
echo $_smarty_tpl->tpl_vars['tns']->value['created_at'];
$_prefixVariable5 = ob_get_clean();
echo strtotime($_prefixVariable5);?>
</small>
                                                                                                                                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </article>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </div>
                        </div>

                    </div>
                    <!--sütun bitiş-->


                </div>
            </div>



        </div>

    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_task" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>
<?php
}
}
/* {/block "content"} */
}
