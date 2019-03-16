<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_application_menu', 'invoices');
$ui->assign('_st', $_L['Invoices']);
$ui->assign('_title', $_L['Sales'].'- ' . $config['CompanyName']);
$action = $routes['1'];
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);
$ui->assign('user', $user);


switch ($action) {



    case 'all':


	    $items = Item::where('workspace_id',$workspace_id)->get();

        api_response($items);



        break;




    default:
        echo 'action not defined';
}