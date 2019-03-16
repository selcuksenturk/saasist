{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h3>{$_L['Plans']}</h3>

                    <a class="btn btn-primary" href="{$_url}super_admin/plan">{$_L['Add plan']}</a>
                    <div class="hr-line-dashed"></div>

                    <table class="table table-striped table-bordered">
                        <th>{$_L['Name']}</th>
                        <th>{$_L['Billing period']}</th>
                        <th class="text-right">{$_L['Price']}</th>
                        <th class="text-right">{$_L['Manage']}</th>

                        {foreach $plans as $plan}

                            <tr>
                                <td>
                                    <a href="{$_url}super_admin/plan/{$plan->id}">{$plan->name}</a>
                                </td>
                                <td>
                                    {$plan->billing_period}
                                </td>
                                <td class="text-right">
                                    {round($plan->price,2)}
                                </td>

                                <td class="text-right">
                                    <a href="{$_url}super_admin/plan/{$plan->id}" class="btn btn-primary">{$_L['Edit']}</a>
                                    <a href="{$_url}super_admin/plan-delete/{$plan->id}" class="btn btn-danger">{$_L['Delete']}</a>
                                </td>

                            </tr>

                            {foreachelse}

                            <tr>
                                <td colspan="4" class="text-center">{$_L['No Data Available']}</td>
                            </tr>

                        {/foreach}



                    </table>

                </div>
            </div>
        </div>
    </div>

{/block}

{block name=script}

    <script type="text/javascript" src="{$app_url}ui/lib/numeric.js"></script>

    <script>

        $(function () {
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