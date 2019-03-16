<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:31:43
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/kb_all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a64fa1f352_33399732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7723914b098bbcc062369a8aa6eae1fe6cf8a0a8' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/kb_all.tpl',
      1 => 1506990293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a64fa1f352_33399732 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1576545155c60a64fa12ec4_50276472', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_1576545155c60a64fa12ec4_50276472 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1576545155c60a64fa12ec4_50276472',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




    <div class="row">
        <div class="col-md-12">


            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="ib-search-bar" style="margin-bottom: 30px;">
                        <div class="input-group">
                            <input type="text" class="form-control" id="ib_search_input" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
..." autofocus> </div>
                    </div>

                    <div>
                        <table class="table table-bordered filter-table" id="tbl_articles">
                            <thead>
                            <tr>
                                <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Title'];?>
</th>
                                <th width="110px;"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>

                                <tr>

                                    <td><a href="javascript:void(0)" id="k<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="kb_view"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a> </td>

                                    <td class="text-right">


                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
kb/a/edit/<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> </a>
                                        <button class="btn btn-danger btn-xs" onclick="deleteKb(<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
)" id="da<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"><i class="fa fa-trash"></i> </button>

                                    </td>

                                </tr>

                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>


        </div>
    </div>

<?php
}
}
/* {/block "content"} */
}
