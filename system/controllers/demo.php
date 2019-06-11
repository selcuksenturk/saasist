<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

if(APP_STAGE == 'Live'){
    r2(U.'login');
    exit;
}

$action = route(1);

switch ($action){

    case 'admin':
        // auto login to admin


        Ib_Internal::autoLogin('demo@example.com','123456');


        break;

    case 'client':


        Ib_Internal::autoLogin('customer@example.com','123456','customer');



        break;


    case 'create':

        $demo = Demo::makeReady();
        $workspace_id = $demo['workspace_id'];
        Transaction::rebuildCatData();

        r2(U.'dashboard');

        break;




}

