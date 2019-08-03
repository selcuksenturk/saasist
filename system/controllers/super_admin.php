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

$saas_current_build = 201;

if($user->workspace_id != 1)
{
    exit;
}

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

        if(!isset($enabled_modules['accounting']))
        {
            permissionDenied();
        }

    }

}

$ui->assign('all_modules', $all_modules);
$ui->assign('enabled_modules', $enabled_modules);


$action = route(1,'dashboard');


switch($action){

    case 'dashboard':

	    if(!isset($settings['saas_build']) || $settings['saas_build'] != $saas_current_build)
	    {
	    	r2(U.'super_admin/update');
	    }


        $total_users = User::count();
        $total_workspaces = Workspace::count();

        $mrr = Workspace::where('is_subscribed',1)->sum('fee');

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

        $workspaces = Workspace::orderBy('id','desc')->get();

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

            $plans = Plan::all();



            view('super_admin_workspace',[
                'selected_workspace' => $selected_workspace,
                'selected_workspace_config' => $selected_workspace_config,
	            'plans' => $plans,
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

            $workspace_plan = _post('workspace_plan');

	        $selected_settings = new Setting;
	        $selected_settings->workspace_id = $id;
	        $selected_settings->setting = 'plan';
	        $selected_settings->value = $workspace_plan;
	        $selected_settings->save();

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
	    $modules = false;

        $id = route(2);

        if($id != '')
        {
            $plan = Plan::find($id);


            if($plan->modules)
            {
            	$modules = json_decode($plan->modules);
            }
        }



	    $available_modules = Plan::availableModules();



	    view('super_admin_plan',[
            'plan' => $plan,
		    'available_modules' => $available_modules,
		    'modules' => $modules
        ]);


        break;


    case 'plan-post':


        $id = _post('plan_id');

        $name = _post('name');
        $billing_period = _post('billing_period');
        $price = _post('price');
        $api_name = 'default';
        $description = $_POST['description'];

        $available_modules = Plan::availableModules();

        $enabled_modules = [];

        foreach ($available_modules as $available_module)
        {
        	if(isset($_POST[$available_module['short_name']]))
	        {
	        	$enabled_modules[$available_module['short_name']] = 1;
	        }
        }

        $modules = json_encode($enabled_modules);





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

        $plan->modules = $modules;

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


        if(!db_column_exist('plans','modules'))
        {
        	ORM::execute('ALTER TABLE `plans` ADD `modules` TEXT NULL DEFAULT NULL AFTER `description`');
        }

        if(!db_column_exist('clx_shared_preferences','workspace_id'))
        {
        	ORM::execute('ALTER TABLE `clx_shared_preferences` ADD `workspace_id` INT(11) NULL DEFAULT NULL AFTER `id`');
        }


        if(!db_column_exist('clx_shared_preferences','workspace_id'))
        {
            ORM::execute('ALTER TABLE `clx_shared_preferences` ADD `workspace_id` INT(11) NULL DEFAULT NULL AFTER `id`');
        }

        if(!db_column_exist('workspaces','is_subscribed'))
        {
            ORM::execute('ALTER TABLE `workspaces` 
  ADD `is_subscribed` TINYINT(1) NOT NULL DEFAULT \'0\' after `parent_id`, 
  ADD `plan` VARCHAR(100) NULL DEFAULT NULL after `is_subscribed`, 
  ADD `fee` DECIMAL(14, 2) NOT NULL DEFAULT \'0.00\' after `plan`, 
  ADD `trial_ends_at` DATE NULL DEFAULT NULL after `fee`');
        }

        if(!db_column_exist('workspaces','plan'))
        {
            ORM::execute('ALTER TABLE `workspaces` 
  ADD `plan` VARCHAR(100) NULL DEFAULT NULL after `is_subscribed`, 
  ADD `fee` DECIMAL(14, 2) NOT NULL DEFAULT \'0.00\' after `plan`');
        }







        if(!isset($config['saas_build']) || $config['saas_build'] < 200)
        {
            ORM::execute('ALTER TABLE `crm_accounts` ADD `uuid` CHAR(36) NULL DEFAULT NULL AFTER `workspace_id`, ADD `code` VARCHAR(100) NULL DEFAULT NULL');

            $message .= 'Contacts: Added uuid column...'.PHP_EOL;

            $contacts = Contact::all();

            foreach ($contacts as $contact)
            {
                $uuid = Str::uuid();
                $contact->uuid = $uuid;
                $contact->save();

                $message .= 'Updated: '.$contact->account.PHP_EOL;
            }


            ORM::execute('ALTER TABLE `crm_leads` ADD `uuid` CHAR(36) NULL DEFAULT NULL AFTER `workspace_id`, ADD `code` VARCHAR(100) NULL DEFAULT NULL');

            $message .= 'Leads: Added uuid column...'.PHP_EOL;

            $leads = Lead::all();

            foreach ($leads as $lead)
            {
                $uuid = Str::uuid();
                $lead->uuid = $uuid;
                $lead->save();

            }


            ORM::execute('ALTER TABLE `sys_companies` ADD `uuid` CHAR(36) NULL DEFAULT NULL AFTER `workspace_id`, ADD `code` VARCHAR(100) NULL DEFAULT NULL');

            $message .= 'Companies: Added uuid column...'.PHP_EOL;

            $companies = Company::all();

            foreach ($companies as $company)
            {
                $uuid = Str::uuid();
                $company->uuid = $uuid;
                $company->save();

            }

            ORM::execute('ALTER TABLE `sys_transactions` ADD `uuid` CHAR(36) NULL DEFAULT NULL AFTER `workspace_id`, ADD `code` VARCHAR(100) NULL DEFAULT NULL');

            $message .= 'Transactions: Added uuid column...'.PHP_EOL;

            $transactions = Transaction::all();

            foreach ($transactions as $transaction)
            {
                $uuid = Str::uuid();
                $transaction->uuid = $uuid;
                $transaction->save();
            }


            ORM::execute('ALTER TABLE `sys_invoices` ADD `uuid` CHAR(36) NULL DEFAULT NULL AFTER `workspace_id`, ADD `code` VARCHAR(100) NULL DEFAULT NULL');

            $message .= 'Invoices: Added uuid column...'.PHP_EOL;

            $invoices = Invoice::all();

            foreach ($invoices as $invoice)
            {
                $uuid = Str::uuid();
                $invoice->uuid = $uuid;
                $invoice->save();
            }


            ORM::execute('ALTER TABLE `sys_quotes` ADD `uuid` CHAR(36) NULL DEFAULT NULL AFTER `workspace_id`, ADD `code` VARCHAR(100) NULL DEFAULT NULL');

            $message .= 'Quotes: Added uuid column...'.PHP_EOL;

            $quotes = Quote::all();

            foreach ($quotes as $quote)
            {
                $uuid = Str::uuid();
                $quote->uuid = $uuid;
                $quote->save();
            }


            ORM::execute('ALTER TABLE `sys_tickets` ADD `uuid` CHAR(36) NULL DEFAULT NULL AFTER `workspace_id`, ADD `code` VARCHAR(100) NULL DEFAULT NULL');

            $message .= 'Tickets: Added uuid column...'.PHP_EOL;

            $tickets = Ticket::all();

            foreach ($tickets as $ticket)
            {
                $uuid = Str::uuid();
                $ticket->uuid = $uuid;
                $ticket->save();
            }


            ORM::execute('ALTER TABLE `sys_orders` ADD `uuid` CHAR(36) NULL DEFAULT NULL AFTER `workspace_id`');

            $message .= 'Orders: Added uuid column...'.PHP_EOL;

            $orders = Order::all();

            foreach ($orders as $order)
            {
                $uuid = Str::uuid();
                $order->uuid = $uuid;
                $order->save();
            }

            $message .= 'Creating Bills Table ...'.PHP_EOL;
            $message .= '...'.PHP_EOL;
            ORM::execute('CREATE TABLE `bills` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `workspace_id` int(10) unsigned NOT NULL,
  `uuid` CHAR(36) NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_account_id` int(10) unsigned DEFAULT NULL,
  `contact_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `next_date` date NOT NULL,
  `last_paid_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `currency` CHAR(3),
  `net_amount` decimal(16,8) NOT NULL,
  `recurring_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remind_days_before` smallint(5) unsigned NOT NULL DEFAULT \'0\',
  `add_transaction_automatically` tinyint(1) NOT NULL DEFAULT \'0\',
  `is_active` tinyint(1) NOT NULL DEFAULT \'1\',
  `is_paid` tinyint(1) NOT NULL DEFAULT \'0\',
  `is_skipped` tinyint(1) NOT NULL DEFAULT \'0\',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');
            $message .= 'Bills Table Created!'.PHP_EOL;

            ORM::execute('CREATE TABLE `assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workspace_id` int(10) unsigned NOT NULL,
  `uuid` CHAR(36) NULL DEFAULT NULL,
  `asset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_purchased` date DEFAULT NULL,
  `supported_until` date DEFAULT NULL,
  `price` decimal(16,4) DEFAULT NULL,
  `depreciation` decimal(16,4) DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(10) unsigned DEFAULT NULL,
  `employee_id` int(10) unsigned DEFAULT NULL,
  `contact_id` int(10) unsigned DEFAULT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');


            ORM::execute('CREATE TABLE `asset_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workspace_id` int(10) unsigned NOT NULL,
  `uuid` CHAR(36) NULL DEFAULT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT \'0\',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT \'1\',
  `is_default` tinyint(1) NOT NULL DEFAULT \'0\',
  `sort_order` int(10) unsigned NOT NULL DEFAULT \'1\',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

            $message .= 'Assets Table Created!'.PHP_EOL;

        }




        update_option('saas_build',$saas_current_build);


        $message .= 'All tables were created...'.PHP_EOL;
        $message .= 'Build updated to: '.$saas_current_build.PHP_EOL;

        $message .= '---------------------------'.PHP_EOL;
        $message .= 'Redirecting, please wait...';


        HtmlCanvas::createTerminal($message,$script);

        break;







}