{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-6">
            {if $active_invoice}

                <div class="panel">
                    <div class="panel-body">
                        <h4>{$_L['Pay Now']}</h4>

                        <table class="table table-bordered table-hover sys_table">
                            <thead>
                            <tr>
                                <th>#</th>

                                <th>{$_L['Amount']}</th>


                                <th class="text-right">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td><a target="_blank" href="{$_url}client/iview/{$active_invoice->id}/token_{$active_invoice->vtoken}/">{$active_invoice->invoicenum}{if $active_invoice->cn neq ''} {$active_invoice->cn} {else} {$active_invoice->id} {/if}</a> </td>

                                <td>{formatCurrency($active_invoice->total,$super_home_currency)}</td>

                                <td class="text-right">

                                    <a href="{$_url}client/iview/{$active_invoice->id}/token_{$active_invoice->vtoken}/" class="btn btn-primary">{$_L['View']}</a>

                                </td>
                            </tr>
                            </tbody>



                        </table>
                    </div>
                </div>

                {else}

                <div class="panel">
                    <div class="panel-body">
                        <h4>{$_L['Upgrade']}</h4>
                        <div class="hr-line-dashed"></div>

                        <strong>{$_L['Current plan']} :</strong> {$current_plan}

                        <hr>

                        <form method="post" id="form_billing">
                            <div class="form-group">
                                <label>{$_L['Plan']}</label>
                                <select class="form-control" id="plan" name="plan">

                                    <option value="">{$_L['Choose plan']}...</option>

                                    {foreach $plans as $plan}
                                        <option value="{$plan->id}">{$plan->name} [ {$plan->billing_period} - {formatCurrency($plan->price,$super_home_currency)} ]</option>
                                    {/foreach}

                                </select>
                            </div>


                            <button class="btn btn-primary" type="submit">{$_L['Subscribe']}</button>

                        </form>
                    </div>
                </div>
            {/if}
        </div>

        <div class="col-md-6">
            <div class="panel">
                <div class="panel-body">
                    <h4>{$_L['Billing history']}</h4>
                    <div class="hr-line-dashed"></div>

                    {$_L['No Data Available']}

                </div>
            </div>
        </div>

    </div>

{/block}

{block name=script}

    <script>

        $(function () {

            $( "#form_billing" ).submit(function( e ) {

                e.preventDefault();

                $.post( "{$_url}settings/subscribe_post", $('#form_billing').serialize() ).done(function(data) {
                    location.reload();
                }).fail(function(data) {
                    spNotify(data.responseText,'error');
                });

            });

        })

    </script>


{/block}