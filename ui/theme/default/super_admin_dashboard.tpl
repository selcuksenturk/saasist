{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <h3 class="ibilling-page-header">{$_L['Dashboard']}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{$_L['Users']}</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{$total_users}</h1>
                    <small>{$_L['Total users']}</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{$_L['Workspaces']}</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{$total_workspaces}</h1>
                    <small>{$_L['Total workspaces']}</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{$_L['Monthly recurring revenue']}</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{$mrr}</h1>
                    <small>{$_L['Estimate monthly recurring revenue']}</small>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>{$_L['Latest users']}</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th>{$_L['Name']}</th>
                        <th>{$_L['Email']}</th>
                        <th class="text-right">{$_L['Date']}</th>
                        {foreach $saas_users as $saas_user}
                            {if $saas_user->id == $user->id}
                                {continue}
                            {/if}
                            <tr>
                                <td>{$user->fullname}</td>
                                <td>{$user->username}</td>
                                <td>
                                    {if $saas_user->created_at}
                                        {date( $config['df'], strtotime($saas_user->created_at))}
                                        {else}
                                        ---
                                    {/if}

                                </td>
                            </tr>
                        {/foreach}



                    </table>
                </div>
            </div>

        </div>


        <div class="col-md-6">


            <div class="ibox float-e-margins">
                <div class="ibox-title">

                    <h5>{$_L['Latest workspaces']}</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-striped table-bordered">
                        <th>{$_L['Name']}</th>
                        <th>{$_L['Status']}</th>
                        <th class="text-right">{$_L['Date']}</th>

                        {foreach $saas_workspaces as $saas_workspace}

                            {if $saas_workspace->id == $user->workspace_id}
                                {continue}
                            {/if}

                            <tr>
                                <td>{$saas_workspace->name}</td>
                                <td>
                                    {if $saas_workspace->is_active}
                                        <label class="label label-success">{$_L['Active']}</label>
                                        {else}
                                        <label class="label label-danger">{$_L['Inactive']}</label>
                                    {/if}
                                </td>
                                <td class="text-right amount">{date( $config['df'], strtotime($saas_workspace->created_at))}</td>
                            </tr>
                        {/foreach}



                    </table>
                </div>
            </div>

        </div>


    </div>

{/block}

{block name=script}

    <script>

    </script>


{/block}