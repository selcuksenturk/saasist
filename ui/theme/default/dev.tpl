{extends file="$layouts_admin"}

{block name="content"}


    <div class="row">



        <div class="col-md-12">



            <div class="panel panel-default">

                <div class="panel-body">

                    <h3> {$_L['Developer']} </h3>



                    <hr>

                    <a href="{$_url}demo/create" class="btn btn-primary">Create Demo Workspace</a>


                </div>
            </div>
        </div>



    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary waves-effect waves-light add_company" href="#">
            <i class="fa fa-plus"></i>
        </a>
    </div>
{/block}
