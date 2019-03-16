<?php

$action = route(1);

switch ($action)
{
    case '':

        view('signup');

        break;

    case 'post':

        $data = $request->all();

        $workspace = Workspace::createWorkspace($data);

        if($workspace['success'])
        {
            r2(U.'dashboard','s',$_L['Welcome aboard']);
        }
        else{
            r2(U.'signup','e',$workspace['errors']);
        }


        break;

    default:
        abort(404);
}
