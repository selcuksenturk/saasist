<?php
/* Smarty version 3.1.33, created on 2019-06-10 18:40:39
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/transactions_bills_all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfedc67b38270_01536168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1894bc0cec0ad590cb653f88018555cf4af40f2' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/transactions_bills_all.tpl',
      1 => 1560206437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfedc67b38270_01536168 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9621528795cfedc67b2daa5_33063213', "style");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8198992165cfedc67b2ef03_77196759', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16086787805cfedc67b37669_50071517', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_9621528795cfedc67b2daa5_33063213 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_9621528795cfedc67b2daa5_33063213',
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
class Block_8198992165cfedc67b2ef03_77196759 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8198992165cfedc67b2ef03_77196759',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Bills'];?>
</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li><a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/bills"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Summary'];?>
</a></li>
                    <li class="active"><a class="nav-link active show" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/bills-all"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['All'];?>
</a></li>
                    <li><a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/bill"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add a bill'];?>
</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show">
                        <div class="panel-body panel-body-with-border" style="background-color: #fff;">


                            <div class="row">

                                <div class="col-md-12">

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
                                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Title'];?>
</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Amount'];?>
</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Next Due Date'];?>
</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Manage'];?>
</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bills']->value, 'bill');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bill']->value) {
?>
                                            <tr>
                                                <td  data-value="<?php echo $_smarty_tpl->tpl_vars['bill']->value->id;?>
">
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/bill/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
">
                                                        <?php echo $_smarty_tpl->tpl_vars['bill']->value->title;?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo formatCurrency($_smarty_tpl->tpl_vars['bill']->value->net_amount,$_smarty_tpl->tpl_vars['bill']->value->currency);?>
 <br>
                                                    <div class="hr-line-dashed"></div>
                                                    <?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['bill']->value->recurring_type);?>

                                                </td>
                                                <td>
                                                    <?php echo translate_date_string(date('D M d, Y',strtotime($_smarty_tpl->tpl_vars['bill']->value->next_date)),$_smarty_tpl->tpl_vars['_L']->value);?>

                                                </td>
                                                <td>
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/bill/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="javascript:;" class="btn btn-danger btn-xs" onclick="confirmThenGoToUrl(event,'transactions/delete-bill/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
');" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
"><i class="fa fa-trash"></i></a>
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
                    </div>

                </div>


            </div>
        </div>
    </div>


<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_16086787805cfedc67b37669_50071517 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_16086787805cfedc67b37669_50071517',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/footable/js/footable.all.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(function () {
            $('.footable').footable();
            $('[data-toggle="tooltip"]').tooltip();
        });
    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
