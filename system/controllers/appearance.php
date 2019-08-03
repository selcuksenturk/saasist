<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_title', $_L['Appearance'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Appearance']);
$ui->assign('_application_menu', 'appearance');
$action = $routes[1];
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

    case 'themes':

        $themes = glob('ui/theme/*');
        $themes = array_map('basename', array_filter($themes, 'is_dir'));
        $ui->assign('themes', $themes);



        view('appearance_themes');

        break;

    case 'ui':


        $ca = new Ib_Animate();

        $ca_options = $ca->options($config['contentAnimation']);
        $ui->assign('ca_options',$ca_options);



        view('appearance_user_interface');


        break;


    case 'customize':



        view('appearance_customize');


        break;


    case 'editor':

        abort(404);

        $ui->assign('xfooter',Asset::js(array('ace/ace','ace/ext-modelist','settings/editor')));
        $ui->assign('_include','box');


        view('appearance_editor');



        break;


    case 'themes_post':

        if(APP_STAGE == 'Demo'){
            r2(U . 'appearance/themes/', 'e', 'Sorry! This option is disabled in the demo mode.');
        }


        $theme = _post('theme');

        $nstyle = _post('nstyle');

        $logo_inverse_for = [
            'light_blue',
            'purple',
            'indigo_blue'
        ];

        if(in_array($nstyle,$logo_inverse_for))
        {
            update_option('top_bar_is_dark',1);
        }
        else{
            update_option('top_bar_is_dark',0);
        }


        update_option('theme',$theme);


        update_option('nstyle',$nstyle);


        r2(U.'appearance/themes/','s',$_L['Settings Saved Successfully']);


        break;

    case 'edit':








        break;


    default:
        echo 'action not defined';
}