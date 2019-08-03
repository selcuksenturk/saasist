<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_application_menu', 'contacts');
$ui->assign('_title', 'Accounts- '. $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);
$ui->assign('user', $user);

// Check which modules are enabled in this workspace
$all_modules = true;
$enabled_modules = false;
if(isset($config['plan']))
{
    $workspace_plan = Plan::find($config['plan']);

    if($workspace_plan)
    {
        $all_modules = false;
        $enabled_modules = json_decode($workspace_plan->modules, true);
    }

}
$ui->assign('all_modules', $all_modules);
$ui->assign('enabled_modules', $enabled_modules);

switch ($action) {
    case 'add':


        view('add-invoice');






        break;


    case 'view':

        break;

    case 'add-post':


        break;

    case 'list':
        $paginator = Paginator::bootstrap('sys_contacts');
        $d = ORM::for_table('sys_contacts')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('id')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);

        view('board');
        break;


    case 'edit-post':

        break;



    case 'post':

         $dt = urldecode('%D9%A2%D9%A0%D9%A1%D9%A7-%D9%A0%D9%A1-%D9%A2%D9%A9');

         echo date('Y-m-d',strtotime($dt));

        break;

    default:
        echo 'action not defined';
}