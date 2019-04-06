{extends file="$layouts_admin"}

{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/dp/dist/datepicker.min.css" />
{/block}
{block name="content"}

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <h4>{$selected_workspace->name}</h4>
                    <div class="hr-line-dashed"></div>

                    <form method="post" id="mainForm">

                        <div class="form-group">
                            <label>{$_L['Status']}</label>
                            <select class="form-control" name="subscription_status">
                                <option {if !isset($selected_workspace_config['subscribed'])} selected{/if} value="0">{$_L['Not subscribed']}</option>
                                <option {if isset($selected_workspace_config['subscribed'])} selected{/if} value="1">{$_L['Subscribed']}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Plan']}</label>
                            <select class="form-control" name="workspace_plan">


                                <option {if !isset($selected_workspace_config['plan'])} selected{/if} value="0">{$_L['Default']}</option>

                                {foreach $plans as $plan}

                                    <option value="{$plan->id}" {if isset($selected_workspace_config['plan']) && ($selected_workspace_config['plan'] == $plan->id)} selected{/if} >{$plan->name}</option>

                                {/foreach}

                                {if isset($selected_workspace_config['subscribed'])}

                                    {foreach $plans as $plan}

                                        <option value="{$plan->id}">{$plan->name}</option>

                                    {/foreach}

                                {/if}

                            </select>
                        </div>

                        <div class="form-group">
                            <label>{$_L['Trial ends at']}</label>
                            <input class="form-control" name="trial_ends_at" value="{$selected_workspace->trial_ends_at}" datepicker data-date-format="yyyy-mm-dd" data-auto-close="true">
                        </div>

                        <div class="form-group">

                            <input type="hidden" name="selected_workspace_id" value="{$selected_workspace->id}">

                            <button type="submit" class="btn btn-primary" id="btnSubmit">{$_L['Save']}</button>
                        </div>


                    </form>

                    <div class="hr-line-dashed"></div>

                    <a href="{$_url}super_admin/workspaces">{$_L['Back To The List']}</a>

                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="panel">
                <div class="panel-body">
                    <a href="javascript:;" onclick="confirmThenGoToUrl(event,'super_admin/delete-workspace/{$selected_workspace->id}');" class="btn btn-danger">{$_L['Delete']}</a>
                </div>
            </div>

        </div>

    </div>

{/block}

{block name=script}

    <script type="text/javascript" src="{$app_url}ui/lib/dp/dist/datepicker.min.js"></script>
    <script>

        $(function () {

            $('[data-toggle="datepicker"]').datepicker();


            var $btnSubmit = $('#btnSubmit');
            var $mainForm = $('#mainForm');

            $mainForm.on('submit',function (e) {
                e.preventDefault();
                $btnSubmit.prop('disabled',true);
                $.post( "{$_url}super_admin/workspace_save", $mainForm.serialize() ).done(function() {
                    window.location = '{$_url}super_admin/workspace/{$selected_workspace->id}';
                }).fail(function(data) {
                    spNotify(data.responseText,'error');
                    $btnSubmit.prop('disabled',false);
                });

            });

        });
    </script>


{/block}