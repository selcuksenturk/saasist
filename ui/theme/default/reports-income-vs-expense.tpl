{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Reports Income Vs Expense']} </h5>

                </div>
                <div class="ibox-content">


                    <h3>{$_L['Income Vs Expense']}</h3>
                    <hr>
                    <h4>{$_L['Total Income']}: <span class="amount" data-a-sign="{$config['currency_code']} " data-p-sign="{$config['currency_symbol_position']}">{$ai}</span></h4>
                    <h4>{$_L['Total Expense']}: <span class="amount" data-a-sign="{$config['currency_code']} " data-p-sign="{$config['currency_symbol_position']}">{$ae}</span></h4>
                    <hr>
                    {$_L['Income minus Expense']} = <span class="amount" data-a-sign="{$config['currency_code']} " data-p-sign="{$config['currency_symbol_position']}">{$aime}</span>
                    <hr>
                    <h4>{$_L['Total Income This Month']}: <span class="amount" data-a-sign="{$config['currency_code']} " data-p-sign="{$config['currency_symbol_position']}">{$mi}</span></h4>
                    <h4>{$_L['Total Expense This Month']}: <span class="amount" data-a-sign="{$config['currency_code']} " data-p-sign="{$config['currency_symbol_position']}">{$me}</span></h4>
                    <hr>
                    {$_L['Income minus Expense']} = <span class="amount" data-a-sign="{$config['currency_code']} " data-p-sign="{$config['currency_symbol_position']}">{$mime}</span>
                    <hr>



                    <h4>{$_L['Income Vs Expense This Year']}</h4>
                    <hr>
                    <div id="placeholder" class="flot-placeholder"></div>
                    <hr>


                </div>
            </div>
        </div>


    </div>

{/block}

{block name="script"}
    <script type="text/javascript" src="{$app_url}ui/lib/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="{$app_url}ui/lib/flot/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="{$app_url}ui/lib/flot/jquery.flot.categories.js"></script>
    <script type="text/javascript" src="{$app_url}ui/lib/numeric.js"></script>
{/block}
