<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_title', $_L['Utilities'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Utilities']);
$ui->assign('_application_menu', 'util');
$action = $routes['1'];
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);
$ui->assign('user', $user);

use Intervention\Image\ImageManager;

switch ($action) {

    case 'activity':


        $ui->assign('xjq', '
	 $("#clear_logs").click(function (e) {
        e.preventDefault();
        bootbox.confirm("This will delete all logs older than 30 days. Are you sure?", function(result) {
           if(result){
               var _url = $("#_url").val();
               $.get( _url+"util/clear_logs", function( data ) {
location.reload();
});
           }
        });
    });

 ');

        $paginator = Paginator::bootstrap('sys_logs');
        $d = ORM::for_table('sys_logs')->where('workspace_id',$workspace_id)->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);


        view('util-activity');
        break;

    case 'ajax_logs':

        $table = 'sys_logs';

// Table's primary key
        $primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
        $df = $config['df'].' H:i:s';

        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array(
                'db'        => 'date',
                'dt'        => 1,
                'formatter' => function( $d, $row) {
                    global $df;
                    return date( $df, strtotime($d));


                }
            ),
            array( 'db' => 'type',   'dt' => 2 ),
            array( 'db' => 'description',     'dt' => 3 ),
            array( 'db' => 'userid',     'dt' => 4 ),
            array( 'db' => 'ip',     'dt' => 5 ),

        );

// SQL server connection information
        $sql_details = array(
            'user' => DB_USER,
            'pass' => DB_PASSWORD,
            'db'   => DB_NAME,
            'host' => DB_HOST
        );


        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP
         * server-side, there is no need to edit below this line.
         */

        // require( 'ssp.class.php' );

        $dt = Ssp::simple( $_GET, $sql_details, $table, $primaryKey, $columns );
        $x= json_encode(
            $dt
        );

        echo $x;

        break;

    case 'clear_logs':
        $b30 = date('Y-m-d H:i:s',strtotime('-30 days', time()));
        $d = ORM::for_table('sys_logs')
            ->where_lte('date', $b30)
            ->delete_many();
        _msglog('s',$_L['Logs has been deleted']);

        break;


    case 'sent-emails':

        $paginator = Paginator::bootstrap('sys_email_logs');
        $d = ORM::for_table('sys_email_logs')->where('workspace_id',$workspace_id)->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);


        view('util-sent-emails');
        break;

    case 'cronlogs':

        $paginator = Paginator::bootstrap('sys_schedulelogs','','','','','','','','',5);
        $d = ORM::for_table('sys_schedulelogs')->where('workspace_id',$workspace_id)->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);


        view('util_cron_logs');
        break;

    case 'ajax_sent-emails':

        $table = 'sys_email_logs';
        $df = $config['df'].' H:i:s';
// Table's primary key
        $primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array(
                'db'        => 'date',
                'dt'        => 1,
                'formatter' => function( $d, $row) {
                    global $df;
                    return date( $df, strtotime($d));


                }
            ),

            array( 'db' => 'email',     'dt' => 2 ),
            array( 'db' => 'subject',     'dt' => 3 ),
            array(
                'db'        => 'id',
                'dt'        => 4,
                'formatter' => function( $d, $row ) {
                    //  return date( 'jS M y', strtotime($d));
                    //
                    return '<a href="'.U.'util/view-email/'.$d.'/" class="btn btn-primary btn-outline btn-xs"><i class="fa fa-envelope-o"></i> View</a>';
                }
            )

        );

// SQL server connection information
        $sql_details = array(
            'user' => DB_USER,
            'pass' => DB_PASSWORD,
            'db'   => DB_NAME,
            'host' => DB_HOST
        );


        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP
         * server-side, there is no need to edit below this line.
         */

        // require( 'ssp.class.php' );

        $x= json_encode(
            Ssp::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
        );
        //  Dev::_log($x);
        header('Content-Type: application/json');
        echo $x;

        break;




    case 'dbstatus':

        break;

    case 'dbbackup':



        break;


    case 'view-email':

        $id = $routes['2'];

        $d = ORM::for_table('sys_email_logs')->where('workspace_id',$workspace_id)->find_one($id);
        if($d){

            $ui->assign('d',$d);
            view('view-email');

        }
        else{

        }


        break;


    case 'activity-ajax':

        $d = ORM::for_table('sys_logs')->order_by_desc('id')->limit(5)->where('workspace_id',$workspace_id)->find_many();
        $html = '';
        $df = $config['df'].' H:i:s';
        foreach($d as $ds){
            $html .= ' <li>
                                <a href="javascript:void(0)">
                                    <div>
                                        '.$ds['description'].'
                                        <span class="pull-right text-muted small">'.date( $df, strtotime($ds['date'])).'</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>';
        }

        $html .= '<li>
                                <div class="text-center link-block">
                                    <a href="'.U.'util/activity/">
                                        <strong>'.$_L['See All Activity'].' </strong>
                                       <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>';
        echo $html;

        break;

    case 'terminal':


        $ui->assign('xheader',Asset::css(array('terminal/terminal')));
        $ui->assign('xfooter',Asset::js(array('terminal/terminal','terminal/ib')));
        view('terminal');


        break;

    case 'sys_status':

        $ui->assign('pinfo',Ib_System::info());

        $xjq = "function displayTime() {
    var time = moment().format('D MMMM YYYY H:mm:ss');
    $('#clock').html(time);
    setTimeout(displayTime, 1000);
}
 displayTime();";

        $ui->assign('xjq',$xjq);
        $ui->assign('app_stage',APP_STAGE);

        view('util_sys_status');


        break;

    case 'sys_status_dl':


        $pdf = new Ib_Pdf();

        $pdf->from(Ib_System::info())->setFileName('server_info')->download();


        break;


    case 'integrationcode':


        $xheader = Asset::css(array('prism/prism'));
        $xfooter = Asset::js(array('prism/prism'));


        $ui->assign('xheader',$xheader);
        $ui->assign('xfooter',$xfooter);

        $s_client_login = '<form method="post" action="'.U.'client/auth/">
<input type="email" class="form-control" name="username" placeholder="'.$_L['Email Address'].'"/>
<input type="password" class="form-control" name="password" placeholder="'.$_L['Password'].'"/>
<button type="submit" class="btn btn-primary">Login</button>
</form>';

        $s_client_register = '<a href="'.U.'client/register/">'.$_L['Register'].'</a>';

        $form_client_login = htmlentities($s_client_login);
        $form_client_register = htmlentities($s_client_register);

        $ui->assign('form_client_login',$form_client_login);
        $ui->assign('form_client_register',$form_client_register);


        view('util_integrationcode');



        break;

    case 'invoice_access_log':

        $paginator = Paginator::bootstrap('ib_invoice_access_log');
        $d = ORM::for_table('ib_invoice_access_log')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('viewed_at')->where('workspace_id',$workspace_id)->find_array();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);


        view('util_invoice_access_log');


        break;

    case 'media':




        $folders = array_diff(scandir('./storage/'), array('..', '.','index.html','.DS_Store'));

        $current_path = route(2);

        $imgs = array();

        if($current_path != ''){
            $files = glob("./storage/$current_path/*.*");
            for ($i=0; $i<count($files); $i++)
            {
                $image = $files[$i];
                $supported_file = array(
                    'gif',
                    'jpg',
                    'jpeg',
                    'png'
                );

                $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                if (in_array($ext, $supported_file)) {
                    $imgs[] = $image;
                } else {
                    continue;
                }
            }
        }




        view('util_media',[
            'folders' => $folders,
            'imgs' => $imgs
        ]);




        break;

    case 'tools':




        view('util_tools');



        break;

    case 'import':


        $importFrom = _post('importFrom');
        $fromUrl = _post('fromUrl');
        $apiKey = _post('apiKey');

        $_SESSION['fromUrl'] = $fromUrl;
        $_SESSION['apiKey'] = $apiKey;

        $import_appConfig = _post('appConfig');

        $import_customers = _post('customers');
        $import_groups = _post('groups');
        $import_companies = _post('companies');

        $import_invoices = _post('invoices');
        $import_invoice_items = _post('invoice_items');

        $import_accounts = _post('accounts');
        $import_transactions = _post('transactions');
        $import_currencies = _post('currencies');
        $import_items = _post('items');


        $message = '';

        switch ($importFrom){


        }



        break;


    case 'rebuild_cat_summary':





        break;



    case 'rebuild_item_sales':

        



        break;


    case 'clear-financial-data-cache':


        Transaction::rebuildCatData();

        Item::rebuildSalesData();

        r2(U.'util/tools','s',$_L['Data Updated']);


        break;


    case 'backup-database':





        break;






    default:
        echo 'action not defined';
}