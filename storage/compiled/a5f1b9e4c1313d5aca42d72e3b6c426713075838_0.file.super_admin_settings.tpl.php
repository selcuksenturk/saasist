<?php
/* Smarty version 3.1.33, created on 2019-08-20 08:26:34
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d5be6faf20c54_01977990',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5f1b9e4c1313d5aca42d72e3b6c426713075838' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_settings.tpl',
      1 => 1566303990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d5be6faf20c54_01977990 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2764586185d5be6faf09107_35929656', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10870858895d5be6faf1fa65_09999233', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_2764586185d5be6faf09107_35929656 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2764586185d5be6faf09107_35929656',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Settings'];?>
</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">


            <div class="panel">
                <div class="panel-body">
                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['General Settings'];?>
</h4>
                    <div class="hr-line-dashed"></div>
                    <form method="post" id="form_settings_page">
                        <div class="form-group">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default page'];?>
</label>
                            <select class="form-control" id="default_page">
                                <option value="login"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Login'];?>
</option>
                                <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Default landing page'];?>
</option>
                                <option value="redirect_to"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Redirect to another page'];?>
</option>
                            </select>
                        </div>

                        <div class="form-group" id="redirect_to_value" style="display: none;">
                            <label><?php echo $_smarty_tpl->tpl_vars['_L']->value['Redirect to'];?>
</label>
                            <input class="form-control" name="redirect_to" <?php if (isset($_smarty_tpl->tpl_vars['config']->value['homepage_redirect_to'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['config']->value['homepage_redirect_to'];?>
" <?php }?>>
                        </div>

                        <button class="btn btn-primary" type="submit"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
</button>

                    </form>
                </div>
            </div>
        </div>



    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">

                <div class="panel-body">

                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['Email Settings'];?>
</h4>
                    <div class="hr-line-dashed"></div>

                    <form role="form" name="eml" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/email_settings_post">


                        <div class="form-group">
                            <label for="email_method"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Send Email Using'];?>
</label>
                            <select name="email_method" id="email_method" class="form-control">
                                <option value="phpmail" <?php if ($_smarty_tpl->tpl_vars['e']->value['method'] == 'phpmail') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['PHP mail Function'];?>
</option>


                                <option value="smtp" <?php if ($_smarty_tpl->tpl_vars['e']->value['method'] == 'smtp') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMTP'];?>
</option>
                                <option value="mailgun" <?php if ($_smarty_tpl->tpl_vars['e']->value['method'] == 'mailgun') {?>selected="selected" <?php }?>>Mailgun</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sysemail"><?php echo $_smarty_tpl->tpl_vars['_L']->value['System Email'];?>
</label>
                            <input type="text" class="form-control" id="sysemail" name="sysemail" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sysEmail'];?>
">
                            <span class="help-block"><?php echo $_smarty_tpl->tpl_vars['_L']->value['All Outgoing Email Will'];?>
</span>
                        </div>

                        <div id="a_hide">
                            <div class="form-group">
                                <label for="smtp_host"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMTP Host'];?>
</label>
                                <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['host'];?>
">

                            </div>

                            <div class="form-group">
                                <label for="smtp_user"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMTP Username'];?>
</label>
                                <input type="text" class="form-control" id="smtp_user" name="smtp_user" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['username'];?>
">

                            </div>

                            <div class="form-group">
                                <label for="smtp_password"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMTP Password'];?>
</label>
                                <input type="password" class="form-control" id="smtp_password" name="smtp_password" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['password'];?>
">

                            </div>

                            <div class="form-group">
                                <label for="smtp_port"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMTP Port'];?>
</label>
                                <input type="text" class="form-control" id="smtp_port" name="smtp_port" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['port'];?>
">

                            </div>

                            <div class="form-group">
                                <label for="smtp_secure"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMTP Secure'];?>
</label>
                                <select name="smtp_secure" id="smtp_secure" class="form-control">
                                    <option value="tls" <?php if ($_smarty_tpl->tpl_vars['e']->value['secure'] == 'tls') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['TLS'];?>
</option>
                                    <option value="ssl" <?php if ($_smarty_tpl->tpl_vars['e']->value['secure'] == 'ssl') {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['_L']->value['SSL'];?>
</option>

                                </select>

                            </div>

                        </div>

                        <div id="sectionMailgunApi">
                            <div class="form-group">
                                <label for="mailgun_domain">Mailgun Domain</label>
                                <input type="text" class="form-control" id="mailgun_domain" name="mailgun_domain" value="<?php echo $_smarty_tpl->tpl_vars['mailgun_domain']->value;?>
">

                            </div>
                            <div class="form-group">
                                <label for="mailgun_api_key">Mailgun API Key</label>
                                <input type="text" class="form-control" id="mailgun_api_key" name="mailgun_api_key" value="<?php echo $_smarty_tpl->tpl_vars['mailgun_api_key']->value;?>
">

                            </div>
                        </div>

                        <div id="sectionSparkpostApi">
                            <div class="form-group">
                                <label for="sparkpost_api_key">Sparkpost Api Key</label>
                                <input type="text" class="form-control" id="sparkpost_api_key" name="sparkpost_api_key" value="<?php echo $_smarty_tpl->tpl_vars['sparkpost_api_key']->value;?>
">

                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button>
                    </form>

                </div>
            </div>

            <div class="panel">

                <div class="panel-body">

                    <h4><?php echo $_smarty_tpl->tpl_vars['_L']->value['CRM'];?>
</h4>
                    <div class="hr-line-dashed"></div>

                    <p>
                        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Industry'];?>
</strong>
                    </p>


                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['industries']->value, 'industry');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['industry']->value) {
?>
                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/update-industry">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input name="industry" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['industry']->value->industry;?>
">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['industry']->value->id;?>
">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> </button>
                                        <a class="btn btn-danger" href="javascript:;" onclick="confirmThenGoToUrl(event,'super_admin/delete-industry/<?php echo $_smarty_tpl->tpl_vars['industry']->value->id;?>
')"><i class="fa fa-trash"></i> </a>
                                    </div>
                                </div>
                            </form>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/add-industry">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="industry" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New'];?>
">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> </button>

                            </div>
                        </div>
                    </form>

                    <div class="hr-line-dashed"></div>

                    <p>
                        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Leads'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</strong>
                    </p>


                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lead_status']->value, 'status');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['status']->value) {
?>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/update-lead-status">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input name="status" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['status']->value->sname;?>
">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['status']->value->id;?>
">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> </button>
                                    <a class="btn btn-danger" href="javascript:;" onclick="confirmThenGoToUrl(event,'super_admin/delete-lead-status/<?php echo $_smarty_tpl->tpl_vars['status']->value->id;?>
')"><i class="fa fa-trash"></i> </a>
                                </div>
                            </div>
                        </form>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/add-lead-status">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="status" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New'];?>
">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> </button>

                            </div>
                        </div>
                    </form>


                    <div class="hr-line-dashed"></div>

                    <p>
                        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Leads'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_L']->value['Salutation'];?>
</strong>
                    </p>


                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['salutations']->value, 'salutation');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['salutation']->value) {
?>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/update-salutation">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input name="salutation" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['salutation']->value->sname;?>
">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['salutation']->value->id;?>
">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> </button>
                                    <a class="btn btn-danger" href="javascript:;" onclick="confirmThenGoToUrl(event,'super_admin/delete-salutation/<?php echo $_smarty_tpl->tpl_vars['salutation']->value->id;?>
')"><i class="fa fa-trash"></i> </a>
                                </div>
                            </div>
                        </form>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/add-salutation">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="salutation" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New'];?>
">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> </button>

                            </div>
                        </div>
                    </form>


                    <div class="hr-line-dashed"></div>

                    <p>
                        <strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Leads'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_L']->value['Source'];?>
</strong>
                    </p>


                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['lead_sources']->value, 'lead_source');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['lead_source']->value) {
?>
                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/update-lead-source">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input name="source" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['lead_source']->value->sname;?>
">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['lead_source']->value->id;?>
">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> </button>
                                    <a class="btn btn-danger" href="javascript:;" onclick="confirmThenGoToUrl(event,'super_admin/delete-lead-source/<?php echo $_smarty_tpl->tpl_vars['lead_source']->value->id;?>
')"><i class="fa fa-trash"></i> </a>
                                </div>
                            </div>
                        </form>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/add-lead-source">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input name="source" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New'];?>
">
                                </div>
                            </div>
                            <div class="col-md-4">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> </button>

                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>



    </div>


<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_10870858895d5be6faf1fa65_09999233 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_10870858895d5be6faf1fa65_09999233',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>

        var action_default_page = function(){
            var current_default_page = $('#default_page').val();
            if(current_default_page == 'redirect_to') {
                $('#redirect_to_value').show();
            }
        };

        $(function () {

            function _check_e_method(){
                var emethod = $( "#email_method" ).val();
                if(emethod === "smtp"){
                    $('#sectionMailgunApi').hide();
                    $('#sectionSparkpostApi').hide();
                    $("#a_hide").show();
                }
                else if(emethod == 'mailgun'){
                    $("#a_hide").hide();
                    $('#sectionMailgunApi').show();
                    $('#sectionSparkpostApi').hide();
                }
                else if(emethod == 'sparkpost'){
                    $("#a_hide").hide();
                    $('#sectionMailgunApi').hide();
                    $('#sectionSparkpostApi').show();
                }
                else{
                    $("#a_hide").hide();
                    $('#sectionMailgunApi').hide();
                    $('#sectionSparkpostApi').hide();
                }



            }
            _check_e_method();
            $( "#email_method" ).change(function() {
                _check_e_method();
            });


            action_default_page();
            $('#default_page').on('change',function () {
                action_default_page();
            });

            var $form_settings_page = $('#form_settings_page');

            $form_settings_page.submit(function( e ) {
                e.preventDefault();

                $.post( "<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/settings-post",$form_settings_page.serialize() ).done(function() {
                    window.location = '<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
super_admin/settings';
                }).fail(function(data) {
                    spNotify(data.responseText,'error');
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
