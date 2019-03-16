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


switch ($action) {

    case 'themes':

// by Max Mendez [ github user Akiracr ]

        //Scan for themes
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

        $d = ORM::for_table('sys_appconfig')->where('setting','theme')->where('workspace_id',$workspace_id)->find_one();
        $d->value = $theme;
        $d->save();

        $d = ORM::for_table('sys_appconfig')->where('setting','nstyle')->where('workspace_id',$workspace_id)->find_one();
        $d->value = $nstyle;
        $d->save();

        r2(U.'appearance/themes/','s',$_L['Settings Saved Successfully']);


        break;

    case 'edit':








        break;


    default:
        echo 'action not defined';
}