{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{$_L['Email Settings']}</h5>

                </div>
                <div class="ibox-content">

                    <form role="form" name="eml" method="post" action="{$_url}settings/eml-post">




                        <div class="form-group">
                            <label for="sysemail">{$_L['System Email']}</label>
                            <input type="text" class="form-control" id="sysemail" name="sysemail" value="{$config['sysEmail']}">
                            <span class="help-block">{$_L['All Outgoing Email Will']}</span>
                        </div>



                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {$_L['Submit']}</button>
                    </form>

                </div>
            </div>
        </div>



    </div>
{/block}

