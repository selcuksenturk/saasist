<?php
/* Smarty version 3.1.33, created on 2019-06-10 18:12:38
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/assets_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfed5d6e1dc17_81953615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '128f116eedd5ffefc4478ea24d5fe3292df1fc56' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/assets_list.tpl',
      1 => 1560204756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfed5d6e1dc17_81953615 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_95921505cfed5d6e0d934_25237746', "style");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14630918695cfed5d6e0f177_23680677', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14356273835cfed5d6e19201_74950615', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_95921505cfed5d6e0d934_25237746 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_95921505cfed5d6e0d934_25237746',
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
class Block_14630918695cfed5d6e0f177_23680677 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14630918695cfed5d6e0f177_23680677',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="file-manager">
                        <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Assets'];?>
</h5>
                        <div class="hr-line-dashed"></div>

                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
assets/asset" class="btn btn-primary btn-block add_asset"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add an asset'];?>
</a>
                        <div class="hr-line-dashed"></div>
                        <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Categories'];?>
</h5>
                        <ul class="folder-list" style="padding: 0">
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
assets/list"><i class="fa fa-folder"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['All categories'];?>
</a></li>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
assets/list/<?php echo $_smarty_tpl->tpl_vars['category']->value->uuid;?>
"><i class="fa fa-folder"></i> <?php echo $_smarty_tpl->tpl_vars['category']->value->name;?>
</a></li>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>

                        <a href="javascript:;" id="btnNewCategory" class="btn btn-primary btn-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['New category'];?>
</a>

                        <?php if ($_smarty_tpl->tpl_vars['selected_category']->value) {?>
                            <a href="javascript:;" onclick="confirmThenGoToUrl(event,'delete/asset-category/<?php echo $_smarty_tpl->tpl_vars['category']->value->uuid;?>
');" class="btn btn-danger btn-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
</a>
                        <?php }?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">

            <div class="panel">
                <div class="panel-body">

                    <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
: <span class="amount"><?php echo $_smarty_tpl->tpl_vars['assets_value']->value;?>
</span></h3>

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
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Name'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date purchased'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Supported until'];?>
</th>
                            <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['assets']->value, 'asset');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['asset']->value) {
?>
                            <tr>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
assets/asset/<?php echo $_smarty_tpl->tpl_vars['asset']->value->uuid;?>
"><?php echo $_smarty_tpl->tpl_vars['asset']->value->name;?>
</a> </td>
                                <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['asset']->value->date_purchased));?>
</td>
                                <td><?php echo date($_smarty_tpl->tpl_vars['config']->value['df'],strtotime($_smarty_tpl->tpl_vars['asset']->value->supported_until));?>
</td>
                                <td class="amount"><?php echo $_smarty_tpl->tpl_vars['asset']->value->price;?>
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



<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_14356273835cfed5d6e19201_74950615 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_14356273835cfed5d6e19201_74950615',
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

            $('#btnNewCategory').click(function (e) {
                e.preventDefault();


                bootbox.prompt({
                    title: "<?php echo $_smarty_tpl->tpl_vars['_L']->value['Category Name'];?>
",
                    buttons: {
                        'cancel': {
                            label: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['Cancel'];?>
'
                        },
                        'confirm': {
                            label: '<?php echo $_smarty_tpl->tpl_vars['_L']->value['OK'];?>
'
                        }
                    },
                    callback: function(result) {
                        if (result === null) {

                        } else {
                            $.post( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
assets/category-post", { category: result } ).done(function() {
                                location.reload();
                            });
                        }
                    }
                });


            });


        });



    <?php echo '</script'; ?>
>


<?php
}
}
/* {/block 'script'} */
}
