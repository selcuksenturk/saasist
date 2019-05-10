{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header">{$_L['Settings']}</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">


            <div class="panel">
                <div class="panel-body">
                    <h4>{$_L['General Settings']}</h4>
                    <div class="hr-line-dashed"></div>
                    <form method="post" id="form_settings_page">
                        <div class="form-group">
                            <label>{$_L['Default page']}</label>
                            <select class="form-control" id="default_page">
                                <option value="login">{$_L['Login']}</option>
                                <option value="">{$_L['Default landing page']}</option>
                                <option value="redirect_to">{$_L['Redirect to another page']}</option>
                            </select>
                        </div>

                        <div class="form-group" id="redirect_to_value" style="display: none;">
                            <label>{$_L['Redirect to']}</label>
                            <input class="form-control" name="redirect_to" {if isset($config['homepage_redirect_to'])} value="{$config['homepage_redirect_to']}" {/if}>
                        </div>

                        <button class="btn btn-primary" type="submit">{$_L['Save']}</button>

                    </form>
                </div>
            </div>
        </div>



    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel">

                <div class="panel-body">

                    <h4>{$_L['Email Settings']}</h4>
                    <div class="hr-line-dashed"></div>

                    <form role="form" name="eml" method="post" action="{$_url}super_admin/email_settings_post">


                        <div class="form-group">
                            <label for="email_method">{$_L['Send Email Using']}</label>
                            <select name="email_method" id="email_method" class="form-control">
                                <option value="phpmail" {if $e['method'] eq 'phpmail'}selected="selected" {/if}>{$_L['PHP mail Function']}</option>


                                <option value="smtp" {if $e['method'] eq 'smtp'}selected="selected" {/if}>{$_L['SMTP']}</option>
                                <option value="mailgun" {if $e['method'] eq 'mailgun'}selected="selected" {/if}>Mailgun</option>
                                {*<option value="sparkpost" {if $e['method'] eq 'sparkpost'}selected="selected" {/if}>Sparkpost</option>*}

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sysemail">{$_L['System Email']}</label>
                            <input type="text" class="form-control" id="sysemail" name="sysemail" value="{$config['sysEmail']}">
                            <span class="help-block">{$_L['All Outgoing Email Will']}</span>
                        </div>

                        <div id="a_hide">
                            <div class="form-group">
                                <label for="smtp_host">{$_L['SMTP Host']}</label>
                                <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="{$e['host']}">

                            </div>

                            <div class="form-group">
                                <label for="smtp_user">{$_L['SMTP Username']}</label>
                                <input type="text" class="form-control" id="smtp_user" name="smtp_user" value="{$e['username']}">

                            </div>

                            <div class="form-group">
                                <label for="smtp_password">{$_L['SMTP Password']}</label>
                                <input type="password" class="form-control" id="smtp_password" name="smtp_password" value="{$e['password']}">

                            </div>

                            <div class="form-group">
                                <label for="smtp_port">{$_L['SMTP Port']}</label>
                                <input type="text" class="form-control" id="smtp_port" name="smtp_port" value="{$e['port']}">

                            </div>

                            <div class="form-group">
                                <label for="smtp_secure">{$_L['SMTP Secure']}</label>
                                <select name="smtp_secure" id="smtp_secure" class="form-control">
                                    <option value="tls" {if $e['secure'] eq 'tls'}selected="selected" {/if}>{$_L['TLS']}</option>
                                    <option value="ssl" {if $e['secure'] eq 'ssl'}selected="selected" {/if}>{$_L['SSL']}</option>

                                </select>

                            </div>

                        </div>

                        <div id="sectionMailgunApi">
                            <div class="form-group">
                                <label for="mailgun_domain">Mailgun Domain</label>
                                <input type="text" class="form-control" id="mailgun_domain" name="mailgun_domain" value="{$mailgun_domain}">

                            </div>
                            <div class="form-group">
                                <label for="mailgun_api_key">Mailgun API Key</label>
                                <input type="text" class="form-control" id="mailgun_api_key" name="mailgun_api_key" value="{$mailgun_api_key}">

                            </div>
                        </div>

                        <div id="sectionSparkpostApi">
                            <div class="form-group">
                                <label for="sparkpost_api_key">Sparkpost Api Key</label>
                                <input type="text" class="form-control" id="sparkpost_api_key" name="sparkpost_api_key" value="{$sparkpost_api_key}">

                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>

                </div>
            </div>
        </div>



    </div>


{/block}

{block name=script}

    <script>

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

                $.post( "{$_url}super_admin/settings-post",$form_settings_page.serialize() ).done(function() {
                    window.location = '{$_url}super_admin/settings';
                }).fail(function(data) {
                    spNotify(data.responseText,'error');
                });

            });

        });

    </script>


{/block}