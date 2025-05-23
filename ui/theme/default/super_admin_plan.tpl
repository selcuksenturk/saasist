{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">

                    <h3>{$_L['Add plan']}</h3>
                    <div class="hr-line-dashed"></div>

                    <form id="mainForm" method="post" action="">
                        <div class="form-group">
                            <label>{$_L['Plan name']}</label>
                            <input class="form-control" name="name" {if $plan} value="{$plan->name}" {/if}>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{$_L['Billing period']}</label>
                                    <select class="form-control" name="billing_period">
                                        <option value="Monthly" {if $plan && $plan->billing_period == 'Monthly'}selected{/if}>{$_L['Monthly']}</option>
                                        <option value="Yearly" {if $plan && $plan->billing_period == 'Yearly'}selected{/if}>{$_L['Yearly']}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{$_L['Price per user']}</label>
                                    <input class="form-control" name="price" {if $plan} value="{$plan->price}" {/if}>
                                </div>
                            </div>
                        </div>

{*                        <div class="form-group">*}
{*                            <label>{$_L['Plan type']}</label>*}
{*                            <select class="form-control" name="api_name">*}
{*                                <option value="basic" {if $plan && $plan->api_name == 'basic'}selected{/if}>Basic [Has basic features]</option>*}
{*                                <option value="standard" {if $plan && $plan->api_name == 'standard'}selected{/if}>Standard [Has standard features]</option>*}
{*                                <option value="plus" {if $plan && $plan->api_name == 'plus'}selected{/if}>Plus [Has all features]</option>*}
{*                            </select>*}
{*                        </div>*}

                        <div class="form-group">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-bordered roles no-margin">
                                        <thead>
                                        <tr>
                                            <th class="bold">{$_L['Module']}</th>
                                            <th class="text-center bold">{$_L['Enabled']}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        {foreach $available_modules as $available_module}
                                            <tr>


                                                <td class="bold">

                                                    {$available_module['name']}

                                                </td>
                                                <td class="text-center">
                                                    <div class="checkbox">
                                                        <div class="i-checks"><label  style="padding-left: 0"> <input name="{$available_module['short_name']}" class="ib_checkbox" type="checkbox" {if $modules} {if isset($modules->$available_module['short_name'])} checked {/if} {else} checked{/if} value="yes"></label></div>
                                                    </div>
                                                </td>

                                            </tr>
                                        {/foreach}

                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Description']}</label>
                            <textarea class="form-control" rows="10" name="description">{if $plan}{$plan->description}{/if}</textarea>
                        </div>

                        <div class="form-group">

                            {if $plan}
                                <input type="hidden" name="plan_id" value="{$plan->id}">
                            {/if}

                            <button type="submit" class="btn btn-primary">{$_L['Save']}</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>



    </div>

{/block}

{block name=script}

    <script>

        $(function () {


            $( "#mainForm" ).submit(function( e ) {
                e.preventDefault();

                $.post( "{$_url}super_admin/plan-post", $('#mainForm').serialize() ).done(function() {
                    window.location = '{$_url}super_admin/plans';
                }).fail(function(data) {
                    spNotify(data.responseText,'error');
                });

            });


            $(function() {

                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue'
                });



            });


        });

    </script>


{/block}