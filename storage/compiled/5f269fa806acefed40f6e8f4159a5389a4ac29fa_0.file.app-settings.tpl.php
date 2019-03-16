<?php
/* Smarty version 3.1.33, created on 2019-03-07 09:33:44
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/app-settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c812bc8ea0611_32192150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f269fa806acefed40f6e8f4159a5389a4ac29fa' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/app-settings.tpl',
      1 => 1551969165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c812bc8ea0611_32192150 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14062969325c812bc8e857e0_03434769', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_892895575c812bc8ea00b2_39147093', "script");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_14062969325c812bc8e857e0_03434769 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14062969325c812bc8e857e0_03434769',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['General Settings'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/app-post">
                        <div class="form-group">
                            <label for="company"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Application Name'];?>
</label>
                            <input type="text" class="form-control" id="company" name="company"
                                   value="<?php echo $_smarty_tpl->tpl_vars['config']->value['CompanyName'];?>
">
                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['This Name will be'];?>
</span>
                        </div>


                                                                                                
                        
                                                                                                
                                                                                                                                                                                                                                                
                        <div class="form-group">
                            <label for="default_landing_page"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default Landing Page'];?>
</label>
                            <select name="default_landing_page" id="default_landing_page" class="form-control">
                                <option value="login"
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['default_landing_page'] == 'login') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Admin Login'];?>
</option>
                                <option value="client/login"
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['default_landing_page'] == 'client/login') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Client Login'];?>
</option>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="opt_dashboard"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Dashboard'];?>
</label>
                            <select name="dashboard" id="opt_dashboard" class="form-control">
                                <option value="canvas"
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['dashboard'] == 'canvas') {?>selected="selected" <?php }?>>Canvas</option>



                            </select>
                        </div>





                        <hr>

                        <div class="form-group">
                            <label for="caddress"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Pay To Address'];?>
</label>

                            <textarea class="form-control" id="caddress" name="caddress"
                                      rows="3"><?php echo $_smarty_tpl->tpl_vars['config']->value['caddress'];?>
</textarea>
                                                    </div>


                        <div class="form-group">
                            <label for="inputTaxSystem"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tax system'];?>
</label>
                            <select name="tax_system" id="inputTaxSystem" class="form-control">

                                <option value="default" <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'default') {?>selected="selected" <?php }?>>Default</option>
                                <option value="ca_quebec" <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'ca_quebec') {?>selected="selected" <?php }?>>Quebec Canada</option>
                                <option value="India" <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>selected="selected" <?php }?>>India</option>

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="inputBusinessLocation"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Business location'];?>
</label>
                            <?php if ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'default') {?>

                                <input type="text" class="form-control" id="inputBusinessLocation" name="business_location"
                                       value="<?php echo $_smarty_tpl->tpl_vars['config']->value['business_location'];?>
">
                                <?php } elseif ($_smarty_tpl->tpl_vars['config']->value['tax_system'] == 'India') {?>
                                <select name="business_location" id="inputBusinessLocation" class="form-control">

                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, Tax::indianStates(), 'state');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['state']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['state']->value['name'];?>
" <?php if ($_smarty_tpl->tpl_vars['config']->value['business_location'] == $_smarty_tpl->tpl_vars['state']->value['name']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['state']->value['name'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                </select>

                                <?php } else { ?>
                                <input type="text" class="form-control" id="inputBusinessLocation" name="business_location"
                                       value="<?php echo $_smarty_tpl->tpl_vars['config']->value['business_location'];?>
">
                            <?php }?>
                        </div>

                        <div class="form-group">

                            <label for="invoice_terms"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default Invoice Terms'];?>
</label>

                            <textarea class="form-control" id="invoice_terms" name="invoice_terms"
                                      rows="3"><?php echo $_smarty_tpl->tpl_vars['config']->value['invoice_terms'];?>
</textarea>

                        </div>

                        <div class="form-group">
                            <label for="iai"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Starting'];?>
 #</label>
                            <input type="text" class="form-control" id="iai" name="iai">
                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Enter to set the next invoice'];?>

                                - <strong><?php echo $_smarty_tpl->tpl_vars['ai']->value;?>
</strong> (<?php echo $_smarty_tpl->tpl_vars['_L']->value['Keep Blank for'];?>
)</span>
                        </div>

                        <div class="form-group">
                            <label for="show_quantity_as"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default'];?>
 : <?php echo $_smarty_tpl->tpl_vars['_L']->value['Show quantity as'];?>
</label>
                            <input type="text" class="form-control" id="show_quantity_as" name="show_quantity_as" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['show_quantity_as'];?>
">

                        </div>

                        <div class="form-group">
                            <label for="pdf_font"><?php echo $_smarty_tpl->tpl_vars['_L']->value['PDF Font'];?>
</label>
                            <select name="pdf_font" id="pdf_font" class="form-control">
                                <option value="default" <?php if ($_smarty_tpl->tpl_vars['config']->value['pdf_font'] == 'default') {?>selected="selected" <?php }?>>Default
                                    [Faster PDF Creation with Less Memory]
                                </option>
                                <option value="Helvetica" <?php if ($_smarty_tpl->tpl_vars['config']->value['pdf_font'] == 'Helvetica') {?>selected="selected" <?php }?>>
                                    Helvetica
                                </option>
                                <option value="dejavusanscondensed"
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['pdf_font'] == 'dejavusanscondensed') {?>selected="selected" <?php }?>>
                                    dejavusanscondensed [Embed fonts with supports UTF8]
                                </option>

                                <option value="AdobeCJK" <?php if ($_smarty_tpl->tpl_vars['config']->value['pdf_font'] == 'AdobeCJK') {?>selected="selected" <?php }?>>
                                    AdobeCJK [Adobe Asian Font pack]
                                </option>

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="i_driver"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Invoice Creation Method'];?>
</label>
                            <select name="i_driver" id="i_driver" class="form-control">
                                <option value="default"
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['i_driver'] == 'default') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Legacy'];?>
</option>
                                <option value="v2"
                                        <?php if ($_smarty_tpl->tpl_vars['config']->value['i_driver'] == 'v2') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['New'];?>
</option>


                            </select>
                        </div>




                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                    </form>

                </div>
            </div>





            <?php if ($_smarty_tpl->tpl_vars['user']->value->workspace_id == 1) {?>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Google reCAPTCHA</h5>

                    </div>
                    <div class="ibox-content">

                        <form role="form" name="accadd" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/recaptcha_post/">

                            <div class="form-group">
                                <label for="recaptcha"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Enable Recaptcha'];?>
</label>
                                <select name="recaptcha" id="recaptcha" class="form-control">
                                    <option value="1"
                                            <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
</option>
                                    <option value="0"
                                            <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '0') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
</option>


                                </select>
                            </div>

                            <div class="form-group">
                                <label for="recaptcha_sitekey"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Recaptcha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['Site Key'];?>
</label>
                                <input type="text" class="form-control" id="recaptcha_sitekey" name="recaptcha_sitekey" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_sitekey'];?>
">

                            </div>

                            <div class="form-group">
                                <label for="recaptcha_secretkey"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Recaptcha'];?>
 <?php echo $_smarty_tpl->tpl_vars['_L']->value['Secret Key'];?>
</label>
                                <input type="text" class="form-control" id="recaptcha_secretkey" name="recaptcha_secretkey" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_secretkey'];?>
">

                            </div>



                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                        </form>

                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Other settings'];?>
</h5>

                    </div>
                    <div class="ibox-content">

                        <form role="form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/other-settings-post/">


                            <div class="form-group">
                                <label for="gmap_api_key">Google Maps <?php echo $_smarty_tpl->tpl_vars['_L']->value['API Key'];?>
</label>
                                <input type="text" class="form-control" id="gmap_api_key" name="gmap_api_key" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['gmap_api_key'];?>
">

                            </div>






                            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                        </form>

                    </div>
                </div>



            <?php }?>





                                                

                                                                            
                                                                                                                                                                                                                                                                                  
                                                                                                                                                                                                                              
                                                                                                                                                                                                                                                                                  

                                            

                            

        </div>


                                                        
                                

                    

                            




        

    </div>
<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_892895575c812bc8ea00b2_39147093 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_892895575c812bc8ea00b2_39147093',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block "script"} */
}
