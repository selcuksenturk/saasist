<?php
/* Smarty version 3.1.33, created on 2019-02-10 16:45:10
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/ajax.contact-summary.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c609b66767cf2_25118116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74fa412b44d5d6b8dd274395446220a47e00c311' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/ajax.contact-summary.tpl',
      1 => 1538651855,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c609b66767cf2_25118116 (Smarty_Internal_Template $_smarty_tpl) {
?>
<p>

    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Full Name'];?>
: </strong> <?php echo $_smarty_tpl->tpl_vars['d']->value['account'];?>
 <br>
   <?php if (($_smarty_tpl->tpl_vars['d']->value['company']) != '') {?>
       <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Company Name'];?>
: </strong> <?php echo $_smarty_tpl->tpl_vars['d']->value['company'];?>
 <br>
   <?php }?>
    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email'];?>
: </strong> <?php if (($_smarty_tpl->tpl_vars['d']->value['email']) != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['email'];?>
 <?php } else { ?> N/A <?php }?> <br>

    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Phone'];?>
: </strong> <?php if (($_smarty_tpl->tpl_vars['d']->value['phone']) != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['phone'];?>
 <?php } else { ?> N/A <?php }?> <br>

    <?php if ($_smarty_tpl->tpl_vars['config']->value['fax_field'] == '1') {?>
        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Fax'];?>
: </strong> <?php if (($_smarty_tpl->tpl_vars['d']->value['fax']) != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['fax'];?>
 <?php } else { ?> N/A <?php }?> <br>
    <?php }?>

    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Address'];?>
: </strong> <?php if (($_smarty_tpl->tpl_vars['d']->value['address']) != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['address'];?>
 <?php } else { ?> N/A <?php }?> <br>
    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['City'];?>
: </strong> <?php if (($_smarty_tpl->tpl_vars['d']->value['city']) != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['city'];?>
 <?php } else { ?> N/A <?php }?> <br>
    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['State Region'];?>
: </strong> <?php if (($_smarty_tpl->tpl_vars['d']->value['state']) != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['state'];?>
 <?php } else { ?> N/A <?php }?> <br>
    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['ZIP Postal Code'];?>
: </strong> <?php if (($_smarty_tpl->tpl_vars['d']->value['zip']) != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['zip'];?>
 <?php } else { ?> N/A <?php }?> <br>
    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Country'];?>
: </strong> <?php if (($_smarty_tpl->tpl_vars['d']->value['country']) != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['country'];?>
 <?php } else { ?> N/A <?php }?> <br>
    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Tags'];?>
: </strong> <?php if (($_smarty_tpl->tpl_vars['d']->value['tags']) != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['tags'];?>
 <?php } else { ?> N/A <?php }?> <br>
    <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Group'];?>
: </strong> <?php if (($_smarty_tpl->tpl_vars['d']->value['gname']) != '') {?> <?php echo $_smarty_tpl->tpl_vars['d']->value['gname'];?>
 <?php } else { ?> N/A <?php }?> <br>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cf']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>

        <strong><?php echo $_smarty_tpl->tpl_vars['c']->value['fieldname'];?>
: </strong> <?php if (get_custom_field_value($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->tpl_vars['d']->value['id']) != '') {?> <?php echo get_custom_field_value($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->tpl_vars['d']->value['id']);?>
 <?php } else { ?> N/A <?php }?> <br>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</p>

<hr>

<a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contacts/view/<?php echo $_smarty_tpl->tpl_vars['d']->value->id;?>
/edit/" class="btn btn-warning"><i class="fa fa-pencil"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Edit'];?>
</a>


<?php if ($_smarty_tpl->tpl_vars['config']->value['add_fund'] == '1') {?>
    <hr>

    <h3><?php echo $_smarty_tpl->tpl_vars['_L']->value['Balance'];?>
 : <span class="amount"><?php echo $_smarty_tpl->tpl_vars['d']->value->balance;?>
</span></h3>
    <a href="javascript:void(0)" class="btn btn-primary add_fund"><i class="fa fa-plus"></i> Add Fund</a>
    <a href="javascript:void(0)" class="btn btn-danger return_fund"><i class="fa fa-minus"></i> Return Fund</a>
<?php }?>

    
                                                                                                                                                                                                                                                                            
        
        
                





<?php if ($_smarty_tpl->tpl_vars['config']->value['accounting'] == '1') {?>
    <hr>


    <table class="table table-hover margin bottom invoice-total">
        <thead>
        <tr>

            <th colspan="3"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Accounting Summary'];?>
</th>

        </tr>
        </thead>
        <tbody>
        <tr>

            <td> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Income'];?>

            </td>
            <td class="text-center"><span class="label label-primary amount" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-a-pad="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'];?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-d-group="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'];?>
"><?php echo $_smarty_tpl->tpl_vars['ti']->value;?>
</span></td>

        </tr>
        <tr>

            <td> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Total Expense'];?>

            </td>
            <td class="text-center"><span class="label label-danger amount" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-a-pad="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'];?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-d-group="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'];?>
"><?php echo $_smarty_tpl->tpl_vars['te']->value;?>
</span></td>


        </tr>



        </tbody>
    </table>

    <table class="table invoice-total">
        <tbody>

        <tr>
            <td><strong><?php echo $_smarty_tpl->tpl_vars['happened']->value;?>
 :</strong></td>
            <td class="text-center"><strong><span class="label label-<?php echo $_smarty_tpl->tpl_vars['css_class']->value;?>
 amount" data-a-dec="<?php echo $_smarty_tpl->tpl_vars['config']->value['dec_point'];?>
" data-a-sep="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousands_sep'];?>
" data-a-pad="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_decimal_digits'];?>
" data-p-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_symbol_position'];?>
" data-a-sign="<?php echo $_smarty_tpl->tpl_vars['config']->value['currency_code'];?>
 " data-d-group="<?php echo $_smarty_tpl->tpl_vars['config']->value['thousand_separator_placement'];?>
" style="font-size: 11px;"><?php echo $_smarty_tpl->tpl_vars['d_amount']->value;?>
</span></strong></td>
        </tr>
        </tbody>
    </table>
<?php }
}
}
