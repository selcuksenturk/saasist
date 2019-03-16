{extends file="$layouts_admin"}
{block name="style"}
    <link rel="stylesheet" type="text/css" href="{$app_url}ui/lib/footable/css/footable.core.min.css" />
{/block}
{block name="content"}

    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <h4>{$_L['Users']}</h4>
                <div class="hr-line-dashed"></div>

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
                        <th>{$_L['User']}</th>
                        <th>{$_L['Email']}</th>
                        <th>{$_L['Workspace']}</th>
                        <th>{$_L['Date']}</th>
                    </tr>
                    </thead>
                    <tbody>

                    {foreach $workspace_users as $workspace_user}
                        {if $user->id == $workspace_user->id}
                            {continue}
                        {/if}
                        <tr>
                            <td  data-value="{$workspace_user->id}">

                                {$workspace_user->fullname}

                                <div class="hr-line-dashed"></div>

                                <button onclick="confirmThenGoToUrl(event,'super_admin/login_as_user/{$workspace_user->id}');" class="btn btn-primary">{$_L['Login as']} {$workspace_user->fullname}</button>

                            </td>
                            <td>
                                {$workspace_user->username}





                            </td>
                            <td>
                                {if isset($workspaces[$workspace_user->workspace_id])}
                                    {$workspaces[$workspace_user->workspace_id]['name']}
                                {/if}
                            </td>
                            <td>
                                {if $workspace_user->created_at}
                                    {date( $config['df'], strtotime($workspace_user->created_at))}
                                    {else}
                                    ---
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