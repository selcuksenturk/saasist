<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:45:56
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/feature-settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a9a42acd23_43430151',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2d8cfa4bf6169e3204f2f58d5bc92fbc8dd2ce0' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/feature-settings.tpl',
      1 => 1538652880,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a9a42acd23_43430151 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11400934185c60a9a428ee48_93021184', "style");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7351906365c60a9a428fc13_80655165', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3050140345c60a9a42ac3e7_75094633', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "style"} */
class Block_11400934185c60a9a428ee48_93021184 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'style' => 
  array (
    0 => 'Block_11400934185c60a9a428ee48_93021184',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/editable/css/bootstrap-editable.css" rel="stylesheet">

<?php
}
}
/* {/block "style"} */
/* {block "content"} */
class Block_7351906365c60a9a428fc13_80655165 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7351906365c60a9a428fc13_80655165',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6">






            <div class="ibox float-e-margins" id="ui_settings">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Choose Features'];?>
</h5>


                </div>
                <div class="ibox-content">
                    <table class="table table-hover">
                        <tbody>

                        <tr>
                            <td width="80%"><label for="config_accounting"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Accounting'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('accounting') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_accounting"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_invoicing"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoicing'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('invoicing') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_invoicing"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_invoice_receipt_number"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoicing'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_L']->value['Receipt Number'];?>
</label></td>
                            <td> <input type="checkbox" <?php if (get_option('invoice_receipt_number') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_invoice_receipt_number"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_show_business_number"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoicing'];?>
 - Show Business Number</label></td>
                            <td> <input type="checkbox" <?php if (get_option('show_business_number') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_show_business_number"></td>
                        </tr>

                        <tr>
                            <td width="80%">
                                <label for="add_fund_minimum_deposit">Business Number Label Name </label> <br>

                            </td>
                            <td> <div class="form-material floating">
                                    <input class="form-control" type="text" id="label_business_number" name="add_fund_minimum_deposit" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['label_business_number'];?>
">
                                    <label for="label_business_number">Name</label>

                                </div></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_quotes"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Quotes'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('quotes') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_quotes"></td>
                        </tr>





                        <tr>
                            <td width="80%"><label for="config_companies"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Companies'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('companies') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_companies"></td>
                        </tr>

                                                                                                        
                        <tr>
                            <td width="80%"><label for="config_leads"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Leads'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('leads') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_leads"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_orders"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Orders'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('orders') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_orders"></td>
                        </tr>

                        <?php if ($_smarty_tpl->tpl_vars['config']->value['orders'] == '1') {?>

                            <tr>
                                <td width="80%">
                                    <label for="config_order_method">Order Method </label> <br>
                                </td>
                                <td>

                                    <select class="form-control" name="config_order_method" id="config_order_method">
                                        <option value="default" <?php if ($_smarty_tpl->tpl_vars['config']->value['order_method'] == 'default') {?> selected<?php }?>>Default</option>
                                        <option value="create_invoice_later" <?php if ($_smarty_tpl->tpl_vars['config']->value['order_method'] == 'create_invoice_later') {?> selected<?php }?>>Place Order, Create Invoice Later</option>

                                    </select>

                                </td>
                            </tr>





                        <?php }?>

                        <tr>
                            <td width="80%"><label for="config_support"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Support'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('support') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_support"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_kb"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Knowledgebase'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('kb') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_kb"></td>
                        </tr>


                                                                                                        
                                                                                                        
                        <tr>
                            <td width="80%"><label for="config_tasks"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tasks'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('tasks') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_tasks"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_calendar"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Calendar'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('calendar') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_calendar"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_documents"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Documents'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('documents') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_documents"></td>
                        </tr>


                        <tr>
                            <td width="80%"><label for="config_suppliers"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Suppliers'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('suppliers') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_suppliers"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_purchase"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Purchase'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('purchase') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_purchase"></td>
                        </tr>

                        <tr>
                            <td width="80%"><label for="config_inventory"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Inventory'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('inventory') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_inventory"></td>
                        </tr>





                        <tr>
                            <td width="80%"><label for="config_sms"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMS'];?>
 </label></td>
                            <td> <input type="checkbox" <?php if (get_option('sms') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_sms"></td>
                        </tr>


                                                                                                        
                                                                                                        
                                                                                                        
                                                                                                        
                        <tr>
                            <td width="80%"><label for="config_recaptcha_in_admin_login">Enable Recaptcha in Admin Login </label></td>
                            <td> <input type="checkbox" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login']) && $_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login'] == 1) {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_recaptcha_in_admin_login"></td>
                        </tr>

                                                                                                        

                        <tr>
                            <td width="80%">
                                <label for="config_add_fund"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Fund'];?>
 </label> <br>
                                <span>Option to enabled Add Fund to Client</span>
                            </td>
                            <td> <input type="checkbox" <?php if (get_option('add_fund') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_add_fund"></td>
                        </tr>

                        <?php if ($_smarty_tpl->tpl_vars['config']->value['add_fund'] == '1') {?>

                            <tr>
                                <td width="80%">
                                    <label for="add_fund_minimum_deposit">Minimum Deposit </label> <br>
                                    <span>Enter the minimum amount a client can add in a single transaction.</span>
                                </td>
                                <td> <div class="form-material floating">
                                        <input class="form-control" type="text" id="add_fund_minimum_deposit" name="add_fund_minimum_deposit" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['add_fund_minimum_deposit'];?>
">
                                        <label for="add_fund_minimum_deposit">Amount</label>

                                    </div></td>
                            </tr>


                            <tr>
                                <td width="80%">
                                    <label for="add_fund_maximum_deposit">Maximum Deposit </label> <br>
                                    <span>Enter the maximum amount a client can add in a single transaction.</span>
                                </td>
                                <td> <div class="form-material floating">
                                        <input class="form-control" type="text" id="add_fund_maximum_deposit" name="add_fund_maximum_deposit" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['add_fund_maximum_deposit'];?>
">
                                        <label for="add_fund_maximum_deposit">Amount</label>

                                    </div></td>
                            </tr>

                            <tr>
                                <td width="80%">
                                    <label for="config_add_fund_client"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add Fund'];?>
 From Client Portal</label> <br>
                                    <span>Adding of funds by clients from the client dashboard.</span>
                                </td>
                                <td> <input type="checkbox" <?php if (get_option('add_fund_client') == '1') {?>checked<?php }?> data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="config_add_fund_client"></td>
                            </tr>



                        <?php }?>


                                                                                                
                        </tbody>
                    </table>



                </div>
            </div>


        </div>

        <div class="col-md-6">

                                                

                                
                    
                    
                                                                                        
                    

                            


        </div>



    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_3050140345c60a9a42ac3e7_75094633 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3050140345c60a9a42ac3e7_75094633',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/editable/js/bootstrap-editable.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>

        $(function () {

            $('.editable_status').editable();

            $("#purchase_invoice_status_add_more").on('click',function () {
                bootbox.prompt("Enter Name", function(result){

                    $.post( base_url + "", { name: "result" })

                        .done(function( data ) {
                            window.location.reload();
                        });

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
