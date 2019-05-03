<?php
/* Smarty version 3.1.33, created on 2019-05-03 07:46:23
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/localisation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ccc2a0f70c4d9_11165830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '26e46351bbac80c663279f15b7c7e749118724fa' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/localisation.tpl',
      1 => 1556695882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ccc2a0f70c4d9_11165830 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9912740835ccc2a0f6c7093_46824723', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_9912740835ccc2a0f6c7093_46824723 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9912740835ccc2a0f6c7093_46824723',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="row">


        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Localisation'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="localisation" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
settings/lc-post/">


                        <div class="form-group">
                            <label for="tzone"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Timezone'];?>
</label>
                            <select name="tzone" id="tzone">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tlist']->value, 'label', false, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value => $_smarty_tpl->tpl_vars['label']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"
                                            <?php if ($_smarty_tpl->tpl_vars['config']->value['timezone'] == $_smarty_tpl->tpl_vars['value']->value) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="country"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default Country'];?>
</label>
                            <select name="country" id="country">
                                <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select Country'];?>
</option>
                                <?php echo $_smarty_tpl->tpl_vars['countries']->value;?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="df"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Date Format'];?>
</label>
                            <select class="form-control" name="df" id="df">
                                <option value="d/m/Y" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'd/m/Y') {?> selected="selected" <?php }?>><?php echo date('d/m/Y');?>
</option>
                                <option value="d.m.Y" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'd.m.Y') {?> selected="selected" <?php }?>><?php echo date('d.m.Y');?>
</option>
                                <option value="d-m-Y" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'd-m-Y') {?> selected="selected" <?php }?>><?php echo date('d-m-Y');?>
</option>
                                <option value="m/d/Y" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'm/d/Y') {?> selected="selected" <?php }?>><?php echo date('m/d/Y');?>
</option>
                                <option value="Y/m/d" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'Y/m/d') {?> selected="selected" <?php }?>><?php echo date('Y/m/d');?>
</option>
                                <option value="Y-m-d" <?php if ($_smarty_tpl->tpl_vars['config']->value['df'] == 'Y-m-d') {?> selected="selected" <?php }?>><?php echo date('Y-m-d');?>
</option>
                                                                                                
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="lan"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default_Language'];?>
</label>
                            <select class="form-control" name="lan" id="lan">


                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['languages']->value, 'language');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
" <?php if ($_smarty_tpl->tpl_vars['config']->value['language'] == $_smarty_tpl->tpl_vars['language']->value['iso_code']) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cformat"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currency Format'];?>
</label>
                            <select class="form-control" name="cformat" id="cformat">
                                <option value="1" <?php if (($_smarty_tpl->tpl_vars['config']->value['dec_point'] == '.') && ($_smarty_tpl->tpl_vars['config']->value['thousands_sep'] == '')) {?> selected="selected" <?php }?>>
                                    1234.56
                                </option>
                                <option value="2" <?php if (($_smarty_tpl->tpl_vars['config']->value['dec_point'] == '.') && ($_smarty_tpl->tpl_vars['config']->value['thousands_sep'] == ',')) {?> selected="selected" <?php }?>>
                                    1,234.56
                                </option>
                                <option value="3" <?php if (($_smarty_tpl->tpl_vars['config']->value['dec_point'] == ',') && ($_smarty_tpl->tpl_vars['config']->value['thousands_sep'] == '')) {?> selected="selected" <?php }?>>
                                    1234,56
                                </option>
                                <option value="4" <?php if (($_smarty_tpl->tpl_vars['config']->value['dec_point'] == ',') && ($_smarty_tpl->tpl_vars['config']->value['thousands_sep'] == '.')) {?> selected="selected" <?php }?>>
                                    1.234,56
                                </option>
                            </select>
                        </div>

                                                                        
                                                                                                
                        

                        <div class="form-group">
                            <label for="home_currency"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Home Currency'];?>
</label>
                                                        


                            <select name="home_currency" id="home_currency">

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
?>

                                    <option data-symbol="<?php echo $_smarty_tpl->tpl_vars['currency']->value['symbol'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['currency']->value['code'];?>
" <?php if (($_smarty_tpl->tpl_vars['config']->value['home_currency'] == $_smarty_tpl->tpl_vars['currency']->value['code'])) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['currency']->value['symbol'];?>
 - <?php echo $_smarty_tpl->tpl_vars['currency']->value['name'];?>
 [ <?php echo $_smarty_tpl->tpl_vars['currency']->value['code'];?>
 ]</option>

                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                            </select>


                        </div>

                        <div class="form-group">
                            <label for="currency_code"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currency Symbol'];?>
</label>
                            <input type="text" class="form-control" id="currency_code" name="currency_code"
                                   value="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
">
                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Keep it blank if currency code'];?>
</span>
                        </div>

                        <div class="form-group">
                            <label for="currency_symbol_position"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currency Symbol Position'];?>
</label>
                            <select class="form-control" name="currency_symbol_position" id="currency_symbol_position">

                                <option value="p" <?php if (($_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'] == 'p')) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Left'];?>
</option>
                                <option value="s" <?php if (($_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'] == 's')) {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Right'];?>
</option>




                            </select>
                        </div>

                        <div class="form-group">
                            <label for="currency_decimal_digits"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Currency Decimal Digits'];?>
</label>
                            <select class="form-control" name="currency_decimal_digits" id="currency_decimal_digits">

                                <option value="false" <?php if (($_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'] == 'false')) {?> selected="selected" <?php }?>>0 (e.g. 100)</option>
                                <option value="true" <?php if (($_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'] == 'true')) {?> selected="selected" <?php }?>>2 (e.g. 100.00)</option>




                            </select>
                        </div>

                        <div class="form-group">
                            <label for="thousand_separator_placement"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Thousand Separator Placement'];?>
</label>
                            <select class="form-control" name="thousand_separator_placement" id="thousand_separator_placement">

                                <option value="2" <?php if (($_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'] == '2')) {?> selected="selected" <?php }?>>2 (e.g. - 22,22,22,333)</option>
                                <option value="3" <?php if (($_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'] == '3')) {?> selected="selected" <?php }?>>3 (e.g. - 333,333,333)</option>
                                <option value="4" <?php if (($_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'] == '4')) {?> selected="selected" <?php }?>>4 (e.g. - 4,4444,4444)</option>




                            </select>
                        </div>

                        <div class="form-group">
                            <label for="df"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Calendar first day'];?>
</label>
                            <select class="form-control" name="calendar_first_day" id="calendar_first_day">

                                <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['calendar_first_day']) && $_smarty_tpl->tpl_vars['config']->value['calendar_first_day'] == '0') {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Sunday'];?>
</option>
                                <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['calendar_first_day']) && $_smarty_tpl->tpl_vars['config']->value['calendar_first_day'] == '1') {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Monday'];?>
</option>
                                <option value="2" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['calendar_first_day']) && $_smarty_tpl->tpl_vars['config']->value['calendar_first_day'] == '2') {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tuesday'];?>
</option>
                                <option value="3" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['calendar_first_day']) && $_smarty_tpl->tpl_vars['config']->value['calendar_first_day'] == '3') {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Wednesday'];?>
</option>
                                <option value="4" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['calendar_first_day']) && $_smarty_tpl->tpl_vars['config']->value['calendar_first_day'] == '4') {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Thursday'];?>
</option>
                                <option value="5" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['calendar_first_day']) && $_smarty_tpl->tpl_vars['config']->value['calendar_first_day'] == '5') {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Friday'];?>
</option>
                                <option value="6" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['calendar_first_day']) && $_smarty_tpl->tpl_vars['config']->value['calendar_first_day'] == '6') {?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['Saturday'];?>
</option>


                            </select>
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
