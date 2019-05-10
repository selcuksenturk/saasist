{extends file="$layouts_admin"}
{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/footable/css/footable.core.min.css" />
{/block}
{block name="content"}

    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <h4>{$_L['Workspaces']}</h4>
                <div class="hr-line-dashed"></div>

                {if APP_STAGE == 'Dev'}
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{$_url}demo/create" class="btn btn-primary" style="margin-bottom: 15px;">Create Demo Workspace</a>
                        </div>
                    </div>
                {/if}

                <form class="form-horizontal" method="post" action="">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-search"></span>
                                </div>
                                <input type="text" name="name" id="foo_filter" class="form-control" placeholder="{$_L['Search']}..."/>

                            </div>
                        </div>

                    </div>
                </form>

                <table class="table table-bordered table-hover sys_table footable" data-filter="#foo_filter" data-page-size="50">
                    <thead>
                    <tr>
                        <th>{$_L['Name']}</th>
                        <th>{$_L['Users']}</th>
                        <th>{$_L['Date']}</th>
                        <th>{$_L['Manage']}</th>
                    </tr>
                    </thead>
                    <tbody>

                    {foreach $workspaces as $workspace}
                        {if $workspace->id == 1}
                            {continue}
                        {/if}
                        <tr>
                            <td  data-value="{$workspace->id}">
                                <a href="{$_url}super_admin/workspace/{$workspace->id}">{$workspace->name}</a>
                            </td>
                            <td>
                                {if isset($workspace_users[$workspace->id])}
                                    {foreach $workspace_users[$workspace->id] as $workspace_user}
                                        {$workspace_user['fullname']} <br>
                                        <span class="font-italic">{$workspace_user['username']}</span>
                                        <div class="hr-line-dashed"></div>
                                    {/foreach}
                                {/if}
                            </td>
                            <td>
                                {if $workspace->created_at}

                                    {$_L['Created at']}: {date( $config['df'], strtotime($workspace->created_at))} <br>

                                    {else}
                                    ---
                                {/if}

                                {if $workspace->trial_ends_at}


                                    {$_L['Trial ends at']}: {date( $config['df'], strtotime('+30 days',strtotime($workspace->created_at)))}



                                {/if}

                                </td>
                            <td>
                                {if $workspace->is_active}
                                    <a href="{$_url}super_admin/workspace-suspend/{$workspace->id}" class="btn btn-danger">{$_L['Suspend']}</a>
                                    {else}
                                    <a href="{$_url}super_admin/workspace-unsuspend/{$workspace->id}" class="btn btn-primary">{$_L['Un suspend']}</a>
                                {/if}



                            </td>

                        </tr>
                    {/foreach}

                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <ul class="pagination">
                            </ul>
                        </td>
                    </tr>
                    </tfoot>

                </table>

            </div>
        </div>
    </div>

{/block}

{block name=script}

    <script type="text/javascript" src="{$app_url}ui/lib/footable/js/footable.all.min.js"></script>
    <script type="text/javascript" src="{$app_url}ui/lib/numeric.js"></script>

    <script>


        $(function() {

            $('.footable').footable();

            $('.amount').autoNumeric('init', {

                aSign: '{$config['currency_code']} ',
                dGroup: {$config['thousand_separator_placement']},
                aPad: {$config['currency_decimal_digits']},
                pSign: '{$config['currency_symbol_position']}',
                aDec: '{$config['dec_point']}',
                aSep: '{$config['thousands_sep']}',
                vMax: '9999999999999999.00',
                vMin: '-9999999999999999.00'

            });




        });



    </script>


{/block}