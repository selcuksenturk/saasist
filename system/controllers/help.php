<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_application_menu', 'accounts');
$ui->assign('_title', 'Accounts- '. $config['CompanyName']);
$ui->assign('_st', 'Accounts');
$action = $routes['1'];
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);
$ui->assign('user', $user);
switch ($action) {

    case 'dashboard':
        view('help-dashboard');
        break;



    default:
        echo 'action not defined';
}