<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$action = $routes['1'];
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);
$ui->assign('user', $user);
switch ($action) {

    case 'tags':


        break;
    case 'contacts':
        header('Content-Type: application/json');
        $t = ORM::for_table('sys_tags')->where('workspace_id',$workspace_id)->where('type','Contacts')->find_many();
        $tags = '[';
        foreach ($t as $ts){


            $tags .= '{"id":"'.$ts['text'].'","text":"'.$ts['text'].'"},';
        }
        $tags = rtrim($tags,',');
        $tags .= ']';
        echo $tags;

        break;


    case 'income':
        header('Content-Type: application/json');
        $t = ORM::for_table('sys_tags')->where('workspace_id',$workspace_id)->where('type','Income')->find_many();
        $tags = '[';
        foreach ($t as $ts){


            $tags .= '{"id":"'.$ts['text'].'","text":"'.$ts['text'].'"},';
        }
        $tags = rtrim($tags,',');
        $tags .= ']';
        echo $tags;

        break;

    case 'expense':
        header('Content-Type: application/json');
        $t = ORM::for_table('sys_tags')->where('workspace_id',$workspace_id)->where('type','Expense')->find_many();
        $tags = '[';
        foreach ($t as $ts){


            $tags .= '{"id":"'.$ts['text'].'","text":"'.$ts['text'].'"},';
        }
        $tags = rtrim($tags,',');
        $tags .= ']';
        echo $tags;

        break;

    case 'transfer':
        header('Content-Type: application/json');
        $t = ORM::for_table('sys_tags')->where('workspace_id',$workspace_id)->where('type','Transfer')->find_many();
        $tags = '[';
        foreach ($t as $ts){


            $tags .= '{"id":"'.$ts['text'].'","text":"'.$ts['text'].'"},';
        }
        $tags = rtrim($tags,',');
        $tags .= ']';
        echo $tags;

        break;


    default:
        echo 'action not defined';
}