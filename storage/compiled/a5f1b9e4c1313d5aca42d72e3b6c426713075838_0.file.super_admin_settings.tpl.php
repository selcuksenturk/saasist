<?php
/* Smarty version 3.1.33, created on 2019-05-05 05:33:16
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cceaddc8e1e21_89672707',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5f1b9e4c1313d5aca42d72e3b6c426713075838' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/super_admin_settings.tpl',
      1 => 1557048326,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cceaddc8e1e21_89672707 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_172066655cceaddc8d5160_80573095', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18509671915cceaddc8e0c70_92608007', 'script');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_172066655cceaddc8d5160_80573095 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_172066655cceaddc8d5160_80573095',
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
        </div>



    </div>


<?php
}
}
/* {/block "content"} */
/* {block 'script'} */
class Block_18509671915cceaddc8e0c70_92608007 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_18509671915cceaddc8e0c70_92608007',
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
