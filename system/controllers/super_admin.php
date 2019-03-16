<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();

$app->emit('admin_controller_started');
$ui->assign('_application_menu', 'super_admin');
$ui->assign('_title', $_L['Dashboard'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Dashboard']);
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);
$ui->assign('user',$user);

if($user->workspace_id != 1)
{
    exit;
}

$action = route(1,'dashboard');


switch($action){

    case 'dashboard':


        $total_users = User::count();
        $total_workspaces = Workspace::count();

        $mrr = Workspace::where('is_subscribed',1)->sum('monthly_fee');

        $saas_users = User::orderBy('id','desc')->limit(10)->get();
        $saas_workspaces = Workspace::orderBy('id','desc')->limit(10)->get();

        view('super_admin_dashboard',[
            'total_users' => $total_users,
            'total_workspaces' => $total_workspaces,
            'mrr' => $mrr,
            'saas_users' => $saas_users,
            'saas_workspaces' => $saas_workspaces
        ]);


        break;


    case 'workspaces':

        $workspaces = Workspace::all();

        $workspace_users = User::all()
            ->groupBy('workspace_id')
            ->toArray();

        view('super_admin_workspaces',[
            'workspaces' => $workspaces,
            'workspace_users' => $workspace_users
        ]);

        break;


    case 'workspace':

        $id = route(2);

        $selected_workspace = Workspace::find($id);


        if($selected_workspace)
        {
            $selected_workspace_config = [];

            $selected_settings = Setting::where('workspace_id',$id)->get();

            foreach ($selected_settings as $selected_setting)
            {
                $selected_workspace_config[$selected_setting->setting] = $selected_setting->value;
            }


            view('super_admin_workspace',[
                'selected_workspace' => $selected_workspace,
                'selected_workspace_config' => $selected_workspace_config
            ]);
        }

        break;


    case 'workspace_save':

        $id = _post('selected_workspace_id');

        $trial_ends_at = _post('trial_ends_at');

        $workspace = Workspace::find($id);

        if($workspace && $trial_ends_at != '')
        {
            $workspace->trial_ends_at = $trial_ends_at;
            $workspace->save();

            // Other settings

            $subscription_status = _post('subscription_status');

            if($subscription_status == 1)
            {
                $selected_settings = new Setting;
                $selected_settings->workspace_id = $id;
                $selected_settings->setting = 'subscribed';
                $selected_settings->value = 1;
                $selected_settings->save();
            }
            else{
                $selected_settings = Setting::where('workspace_id',$id)
                    ->where('setting','subscribed')
                    ->first();
                if($selected_settings)
                {
                    $selected_settings->delete();
                }
            }



        }

        _msglog('s',$_L['Data Updated']);

        echo 'ok';


        break;



    case 'users':

        $workspace_users = User::all();

        $workspaces = Workspace::all()
            ->keyBy('id')
            ->toArray();

        view('super_admin_users',[
            'workspace_users' => $workspace_users,
            'workspaces' => $workspaces
        ]);

        break;

    case 'plans':

        if(!db_table_exist('plans')){
            r2(U.'super_admin/update');
        }

        $plans = Plan::all();

        view('super_admin_plans',[
            'plans' => $plans
        ]);


        break;

    case 'workspace-suspend':

        $id = route(2);
        $workspace = Workspace::find($id);

        if($workspace)
        {
            $workspace->is_active = 0;
            $workspace->save();

            r2(U.'super_admin/workspaces','s',$_L['Suspended successfully']);
        }

        break;

    case 'workspace-unsuspend':

        $id = route(2);
        $workspace = Workspace::find($id);

        if($workspace)
        {
            $workspace->is_active = 1;
            $workspace->save();

            r2(U.'super_admin/workspaces','s',$_L['Un suspended successfully']);
        }

        break;

    case 'plan':

        $plan = false;

        $id = route(2);

        if($id != '')
        {
            $plan = Plan::find($id);
        }

        view('super_admin_plan',[
            'plan' => $plan
        ]);


        break;


    case 'plan-post':


        $id = _post('plan_id');

        $name = _post('name');
        $billing_period = _post('billing_period');
        $price = _post('price');
        $api_name = _post('api_name');
        $description = $_POST['description'];

        if($name == '' || $billing_period == '' || $price == '' || $api_name == '' || $description == '')
        {
            responseWithError($_L['All Fields are Required']);
        }

        if(!is_numeric($price))
        {
            responseWithError($_L['amount_error']);
        }

        $term_length = 0;
        if($billing_period == 'Monthly')
        {
            $term_length = 30;
        }
        elseif ($billing_period == 'Yearly')
        {
            $term_length = 180;
        }

        $plan = false;
        if($id != '')
        {
            $plan = Plan::find($id);
        }

        if(!$plan){
            $plan = new Plan;
            $plan->workspace_id = 1;
            $plan->trial_length = 30;
            $plan->setup_fee = 0.00;
        }




        $plan->name = $name;
        $plan->api_name = $api_name;
        $plan->price = $price;
        $plan->description = $description;
        $plan->term_length = $term_length;
        $plan->billing_period = $billing_period;

        $plan->save();



        break;


    case 'plan-delete':

        $id = route(2);

        $plan = Plan::find($id);

        if($plan)
        {
            $plan->delete();
        }

        r2(U.'super_admin/plans','s',$_L['delete_successful']);

        break;


    case 'settings':

	    //find email settings

	    $e = ORM::for_table('sys_emailconfig')->where('workspace_id',$workspace_id)->find_one('1');
	    $ui->assign('e',$e);

	    // check mailgun api key is exist in the database

	    if(isset($config['mailgun_api_key']))
	    {
		    $mailgun_api_key = $config['mailgun_api_key'];
	    }
	    else{
		    add_option('mailgun_api_key','');
		    $mailgun_api_key = '';
	    }

	    if(isset($config['mailgun_domain']))
	    {
		    $mailgun_domain = $config['mailgun_domain'];
	    }
	    else{
		    add_option('mailgun_domain','');
		    $mailgun_domain = '';
	    }

	    if(isset($config['sparkpost_api_key']))
	    {
		    $sparkpost_api_key = $config['sparkpost_api_key'];
	    }

	    else{
		    add_option('sparkpost_api_key','');
		    $sparkpost_api_key = '';
	    }

        view('super_admin_settings',[
	        'mailgun_api_key' => $mailgun_api_key,
	        'mailgun_domain' => $mailgun_domain,
	        'sparkpost_api_key' => $sparkpost_api_key
        ]);

        break;


    case 'settings-post':

        $default_page = _post('default_page');
        $redirect_to = _post('redirect_to');


        update_option('default_page',$default_page);
        update_option('redirect_to',$redirect_to);


        break;

	case 'login_as_user':

		$user_id = route(2);

		$workspace_user = User::find($user_id);

		if($workspace_user)
		{
			if(strlen($workspace_user->autologin) > 20){
				$str = $workspace_user->autologin;
			}
			else{
				$str = Ib_Str::random_string(20).$workspace_user->id;
			}

			$workspace_user->autologin = $str;
			$workspace_user->save();

			setcookie('ib_at', $str, time() + (86400 * 180), "/");

			$_SESSION['uid'] = $workspace_user->id;
			$_SESSION['language'] = $workspace_user->language;
			$_SESSION['workspace_id'] = $workspace_user->workspace_id;

			r2(U.'dashboard');

		}

		break;

	case 'email_settings_post':

		if(APP_STAGE == 'Demo'){
			r2(U.'super_admin/settings','e',$_L['disabled_in_demo']);
		}



		$sysemail = _post('sysemail');
		if(Validator::Email($sysemail) == false){
			r2(U.'super_admin/settings','e',$_L['Invalid System Email']);
		}

		$d = ORM::for_table('sys_appconfig')->where('workspace_id',$workspace_id)->where('setting','sysEmail')->find_one();
		$d->value = $sysemail;
		$d->save();
		$email_method = _post('email_method');
		$e = ORM::for_table('sys_emailconfig')->find_one('1');


		if($email_method == 'smtp'){

			$smtp_user = _post('smtp_user');
			$smtp_host = _post('smtp_host');
			$smtp_password = _post('smtp_password');
			$smtp_port = _post('smtp_port');
			$smtp_secure = _post('smtp_secure');
			if($smtp_user == '' OR $smtp_password == '' OR $smtp_port == '' OR $smtp_host == ''){
				r2(U.'settings/emls/','e',$_L['smtp_fields_error']);
			}
			else{
				$e->method = 'smtp';
				$e->host = $smtp_host;
				$e->username = $smtp_user;
				$e->password = $smtp_password;
				$e->apikey = '';
				$e->port = $smtp_port;
				$e->secure = $smtp_secure;
			}
		}
		else{
			//  $e->method = 'phpmail';
			// From v 4.5
			$e->method = $email_method;
		}
		$e->save();

		update_option('mailgun_api_key',_post('mailgun_api_key'));
		update_option('mailgun_domain',_post('mailgun_domain'));
		update_option('sparkpost_api_key',_post('sparkpost_api_key'));

		r2(U.'super_admin/settings','s',$_L['Data Updated']);

		break;

    case 'delete-workspace':

        $id = route(2);

        if($id == 1)
        {
            r2(U.'super_admin/workspace/'.$id,'e','You can not delete super admin.');
        }

        $workspace = Workspace::find($id);

        if($workspace)
        {


            User::where('workspace_id',$id)->delete();
            Setting::where('workspace_id',$id)->delete();
            SMSTemplate::where('workspace_id',$id)->delete();
            Category::where('workspace_id',$id)->delete();
            Currency::where('workspace_id',$id)->delete();
            EmailTemplate::where('workspace_id',$id)->delete();
            EmailConfig::where('workspace_id',$id)->delete();
            Permission::where('workspace_id',$id)->delete();
            PaymentGateway::where('workspace_id',$id)->delete();
            PaymentMethod::where('workspace_id',$id)->delete();
            CronSchedule::where('workspace_id',$id)->delete();
            StatusType::where('workspace_id',$id)->delete();
            Tax::where('workspace_id',$id)->delete();
            TicketDepartment::where('workspace_id',$id)->delete();
            Account::where('workspace_id',$id)->delete();
            ApiKey::where('workspace_id',$id)->delete();
            Balance::where('workspace_id',$id)->delete();
            Company::where('workspace_id',$id)->delete();
            Contact::where('workspace_id',$id)->delete();
            ContactGroup::where('workspace_id',$id)->delete();
            CreditCard::where('workspace_id',$id)->delete();
            ExpenseType::where('workspace_id',$id)->delete();
           // Integration::where('workspace_id',$id)->delete();
            Invoice::where('workspace_id',$id)->delete();
            Item::where('workspace_id',$id)->delete();
            Knowledgebase::where('workspace_id',$id)->delete();
            Lead::where('workspace_id',$id)->delete();
            LeadStatus::where('workspace_id',$id)->delete();
            OrderItem::where('workspace_id',$id)->delete();
            PasswordManager::where('workspace_id',$id)->delete();
           // SharedPreference::where('workspace_id',$id)->delete();
            SMS::where('workspace_id',$id)->delete();
            Task::where('workspace_id',$id)->delete();
            Ticket::where('workspace_id',$id)->delete();
            Transaction::where('workspace_id',$id)->delete();
            TransactionCategory::where('workspace_id',$id)->delete();
            TransactionMethod::where('workspace_id',$id)->delete();
            Purchase::where('workspace_id',$id)->delete();
            PurchaseItem::where('workspace_id',$id)->delete();
            ContactCustomField::where('workspace_id',$id)->delete();
            ContactCustomFieldValue::where('workspace_id',$id)->delete();
            KnowledgebaseGroup::where('workspace_id',$id)->delete();
            Order::where('workspace_id',$id)->delete();
            Document::where('workspace_id',$id)->delete();
            SystemLog::where('workspace_id',$id)->delete();
            CannedResponse::where('workspace_id',$id)->delete();
            ShoppingCart::where('workspace_id',$id)->delete();
            EmailLog::where('workspace_id',$id)->delete();
            Quote::where('workspace_id',$id)->delete();
            Role::where('workspace_id',$id)->delete();
            UserPermissionRelation::where('workspace_id',$id)->delete();
            Tag::where('workspace_id',$id)->delete();
            Unit::where('workspace_id',$id)->delete();

            $workspace->delete();

            r2(U . 'super_admin/workspaces', 's', $_L['Deleted Successfully']);

        }

        break;


    case 'update':

        $script = '<script>
    $(function() {
        var delay = 10000;
        var $serverResponse = $("#serverResponse");
        var interval = setInterval(function(){
   $serverResponse.append(\'.\');
}, 500);
        
        setTimeout(function(){ window.location = \''.U.'super_admin/plans\'; }, delay);
    });
</script>';

        $message = 'Updating scehma... '.PHP_EOL;

        if(!db_table_exist('plans')){

            $message = 'Updating scehma to support Plan... '.PHP_EOL;

            ORM::execute('CREATE TABLE `plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workspace_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `billing_period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(16,8) NOT NULL,
  `is_quantity_editable` tinyint(4) NOT NULL DEFAULT \'0\',
  `term_length` int(10) unsigned NOT NULL,
  `auto_renew` tinyint(4) NOT NULL DEFAULT \'1\',
  `trial_length` int(10) unsigned NOT NULL,
  `setup_fee` decimal(16,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

            $message .= 'Plans table was created...'.PHP_EOL;

        }



        $message .= 'All tables were created...'.PHP_EOL;

        $message .= '---------------------------'.PHP_EOL;
        $message .= 'Redirecting, please wait...';


        HtmlCanvas::createTerminal($message,$script);

        break;







}