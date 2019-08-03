<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/
_auth();
$ui->assign('_application_menu', 'suppliers');
$ui->assign('_title', $_L['Suppliers'].' - '. $config['CompanyName']);

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

        if(!isset($enabled_modules['suppliers']))
        {
            permissionDenied();
        }

    }

}

$ui->assign('all_modules', $all_modules);
$ui->assign('enabled_modules', $enabled_modules);


switch ($action) {

    case 'add':


        if(!has_access($user->roleid,'suppliers','create')){
            permissionDenied();
        }

        $ui->assign('countries',Countries::all($config['country'])); // may add this $config['country_code']




        // find all companies

        $companies = ORM::for_table('sys_companies')->where('workspace_id',$workspace_id)->select('id')->select('company_name')->order_by_desc('id')->find_array();

        $ui->assign('companies',$companies);

        // find all groups

        $gs = ORM::for_table('crm_groups')->where('workspace_id',$workspace_id)->order_by_asc('sorder')->find_array();

        $ui->assign('gs',$gs);


        $c_selected_id = route(3);




        if($c_selected_id){
            $ui->assign('c_selected_id',$c_selected_id);
        }
        else{
            $ui->assign('c_selected_id','');
        }


        $ui->assign('xheader', Asset::css(array('modal','s2/css/select2.min')));
        $ui->assign('xfooter', Asset::js(array('modal','s2/js/select2.min','s2/js/i18n/'.lan(),'add-contact')));
        $tags = Tags::get_all('Contacts');
        $ui->assign('tags',$tags);
        $ui->assign('xjq', '
 $("#country").select2({
 theme: "bootstrap"
 });
 ');

        $ui->assign('jsvar', '
_L[\'Working\'] = \''.$_L['Working'].'\';
_L[\'Company Name\'] = \''.$_L['Company Name'].'\';
_L[\'New Company\'] = \''.$_L['New Company'].'\';
 ');


        $currencies = M::factory('Models_Currency')->where('workspace_id',$workspace_id)->find_array();



        view('suppliers_add',[
            'currencies' => $currencies
        ]);


        break;


    case 'list':




        break;


    default:
        echo 'action not defined';
}