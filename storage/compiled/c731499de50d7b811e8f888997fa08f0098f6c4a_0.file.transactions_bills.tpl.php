<?php
/* Smarty version 3.1.33, created on 2019-06-10 18:36:34
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/transactions_bills.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cfedb7243a902_64195932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c731499de50d7b811e8f888997fa08f0098f6c4a' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/transactions_bills.tpl',
      1 => 1560206191,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cfedb7243a902_64195932 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13909346565cfedb72425e99_77264455', "content");
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10777270885cfedb7243a156_18217190', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_13909346565cfedb72425e99_77264455 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13909346565cfedb72425e99_77264455',
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
                    <li class="active"><a class="nav-link active show" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/bills"> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Summary'];?>
</a></li>
                    <li><a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
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
                                        <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Upcoming Bills'];?>
 </h3>
                                        <div class="hr-line-dashed"></div>
                                    </div>
                                </div>
                                <div class="row">

                                    <?php if (count($_smarty_tpl->tpl_vars['bills_upcoming']->value) > 0) {?>

                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bills_upcoming']->value, 'bill');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bill']->value) {
?>
                                            <div class="col-lg-3">
                                                <div class="ibox" style="box-shadow: none; border-radius: 0; border: 1px solid #e2e9ec;">
                                                    <div class="ibox-content">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <small><?php echo translate_date_string(date('D M d, Y',strtotime($_smarty_tpl->tpl_vars['bill']->value->next_date)),$_smarty_tpl->tpl_vars['_L']->value);?>
</small>
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/bill/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-file-text-o"></i></a>
                                                                <?php if ($_smarty_tpl->tpl_vars['bill']->value->website != '') {?>
                                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['bill']->value->website;?>
" target="_blank" class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['bill']->value->website;?>
"><i class="fa fa-globe"></i></a>
                                                                <?php }?>
                                                                <a href="javascript:;" onclick="confirmThenGoToUrl(event,'transactions/delete-bill/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
');" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
"><i class="fa fa-trash-o"></i></a>
                                                                <?php if ($_smarty_tpl->tpl_vars['bill']->value->is_paid == 0) {?>
                                                                    <a href="javascript:;" onclick="confirmThenGoToUrl(event,'transactions/bill-mark-as-paid/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
');" class="btn btn-green btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Mark as Paid'];?>
"><i class="fa fa-check"></i></a>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                        <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/bill/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
"><h4><?php echo $_smarty_tpl->tpl_vars['bill']->value->title;?>
</h4></a>
                                                        <h1 class="no-margins"><?php echo formatCurrency($_smarty_tpl->tpl_vars['bill']->value->net_amount,$_smarty_tpl->tpl_vars['bill']->value->currency);?>
</h1>
                                                        <?php if ($_smarty_tpl->tpl_vars['bill']->value->is_paid) {?>
                                                            <div class="stat-percent font-bold text-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Paid'];?>
</div>
                                                        <?php } else { ?>
                                                            <div class="stat-percent font-bold text-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due'];?>
</div>
                                                        <?php }?>
                                                        <small><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['bill']->value->recurring_type);?>
</small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                    <?php } else { ?>

                                        <div class="col-md-12">
                                            <p><?php echo $_smarty_tpl->tpl_vars['_L']->value['No Data Available'];?>
</p>
                                        </div>

                                    <?php }?>







                                </div>

                            <?php if (count($_smarty_tpl->tpl_vars['bills_past_due']->value) > 0) {?>

                            <div class="row">
                                <div class="col-md-12">
                                    <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Past Due'];?>
 </h3>
                                    <div class="hr-line-dashed"></div>
                                </div>
                            </div>
                            <div class="row">

                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['bills_past_due']->value, 'bill');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['bill']->value) {
?>
                                        <div class="col-lg-3">
                                            <div class="ibox" style="box-shadow: none; border-radius: 0; border: 1px solid #e2e9ec;">
                                                <div class="ibox-content">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <small><?php echo translate_date_string(date('D M d, Y',strtotime($_smarty_tpl->tpl_vars['bill']->value->next_date)),$_smarty_tpl->tpl_vars['_L']->value);?>
</small>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/bill/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-file-text-o"></i></a>
                                                            <?php if ($_smarty_tpl->tpl_vars['bill']->value->website != '') {?>
                                                                <a href="<?php echo $_smarty_tpl->tpl_vars['bill']->value->website;?>
" target="_blank" class="btn btn-inverse btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['bill']->value->website;?>
"><i class="fa fa-globe"></i></a>
                                                            <?php }?>
                                                            <a href="javascript:;" onclick="confirmThenGoToUrl(event,'transactions/delete-bill/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
');" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Delete'];?>
"><i class="fa fa-trash-o"></i></a>
                                                            <?php if ($_smarty_tpl->tpl_vars['bill']->value->is_paid == 0) {?>
                                                                <a href="javascript:;" onclick="confirmThenGoToUrl(event,'transactions/bill-mark-as-paid/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
');" class="btn btn-green btn-xs" data-toggle="tooltip" data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Mark as Paid'];?>
"><i class="fa fa-check"></i></a>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
transactions/bill/<?php echo $_smarty_tpl->tpl_vars['bill']->value->uuid;?>
"><h4><?php echo $_smarty_tpl->tpl_vars['bill']->value->title;?>
</h4></a>
                                                    <h1 class="no-margins"><?php echo formatCurrency($_smarty_tpl->tpl_vars['bill']->value->net_amount,$_smarty_tpl->tpl_vars['bill']->value->currency);?>
</h1>
                                                    <?php if ($_smarty_tpl->tpl_vars['bill']->value->is_paid) {?>
                                                        <div class="stat-percent font-bold text-primary"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Paid'];?>
</div>
                                                    <?php } else { ?>
                                                        <div class="stat-percent font-bold text-danger"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Due'];?>
</div>
                                                    <?php }?>
                                                    <small><?php echo ib_lan_get_line($_smarty_tpl->tpl_vars['bill']->value->recurring_type);?>
</small>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </div>

                            <?php }?>




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
class Block_10777270885cfedb7243a156_18217190 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_10777270885cfedb7243a156_18217190',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




    <?php echo '<script'; ?>
>


        $(function () {


            $('[data-toggle="tooltip"]').tooltip();


        });

    <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
