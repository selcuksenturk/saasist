<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_application_menu', 'password_manager');
$ui->assign('_st', $_L['Password Manager']);
$ui->assign('_title', $_L['Password Manager'] . '- ' . $config['CompanyName']);
$action = route(1,'manage');
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

        if(!isset($enabled_modules['password_manager']))
        {
            permissionDenied();
        }

    }

}

$ui->assign('all_modules', $all_modules);
$ui->assign('enabled_modules', $enabled_modules);

switch ($action) {


    case 'manage':



        $passwords = PasswordManager::where('workspace_id',$workspace_id)->get();

        $clients = Contact::select('id','account')->where('workspace_id',$workspace_id)->get();

        $cls = [];

        foreach ($clients as $cl)
        {
            $cls[$cl->id] = $cl->account;
        }



        view('password_manager',[
            'passwords' => $passwords,
            'cls' => $cls
        ]);

        break;

    case 'modal_password':



        $id = route(2);



        $edit = false;

        if($id == ''){


            $password = [
                'id' => '',
                'client_id' => '',
                'name' => '',
                'url' => '',
                'username' => '',
                'password' => '',
                'notes' => ''
            ];



        }

        else{

            $id = str_replace('pe_','',$id);

            $p = PasswordManager::where('workspace_id',$workspace_id)->find($id);

            if($p){
                $edit = true;
                $password = [
                    'id' => $p->id,
                    'client_id' => $p->client_id,
                    'name' => $p->name,
                    'url' => $p->url,
                    'username' => $p->username,
                    'password' => $p->password,
                    'notes' => $p->notes,
                ];
            }

        }

        $c = Contact::where('workspace_id',$workspace_id)->get();

        view('modal_password',[
            'edit' => $edit,
            'password' => $password,
            'c' => $c
        ]);


        break;


    case 'save':

        $id = _post('password_id');


        $name = _post('name');

        if($name == ''){
            exit($_L['name_error']);
        }

        if($id != ''){

            $p = PasswordManager::where('workspace_id',$workspace_id)->find($id);
            if($p){

                $p->client_id = _post('client_id');
                $p->name = _post('name');
                $p->url = _post('url');
                $p->username = _post('username');
                $p->password = _post('password');
                $p->notes = _post('notes');
                $p->save();
                $id = $p->id;
            }


        }
        else{
            $p = new PasswordManager;
            $p->workspace_id = $workspace_id;
            $p->client_id = _post('client_id');
            $p->name = _post('name');
            $p->url = _post('url');
            $p->username = _post('username');
            $p->password = _post('password');
            $p->notes = _post('notes');
            $p->save();
            $id = $p->id;
        }

        echo $id;


        break;


    case 'modal_view_password':


        $id = route(2);
        $id = str_replace('v_','',$id);

        $p = PasswordManager::where('workspace_id',$workspace_id)->find($id);

        if($p){

            view('modal_view_password',[
                'p' => $p
            ]);

        }


        break;



    default:
        echo 'action not defined';


}