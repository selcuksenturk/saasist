<?php
use Illuminate\Database\Eloquent\Model;
use Rakit\Validation\Validator;
class Workspace extends Model
{

    public static function createWorkspace($data)
    {

        global $app;
        $workspace_settings = require 'system/config/workspace_default_settings.php';

        $free_trial_days = $workspace_settings['free_trial_days'];

        $default_settings = [
            'language' => 'en'
        ];


        $validator = new Validator;

        $validation = $validator->validate($data, [
            'full_name' => 'required',
            'company_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);


        if ($validation->fails()) {

            return [
                'success' => false,
                'errors' => $validation->errors()->firstOfAll()
            ];

        } else {

            // Check user already exist

            $user_exist = User::where('email',$data['email'])->first();

            if($user_exist)
            {
                return [
                    'success' => false,
                    'errors' => 'User already exist!'
                ];
            }

            // Create workspace

            $activation_key = mt_rand(100000, 999999);
            $username = (string) \Ramsey\Uuid\Uuid::uuid4();
            $base_url = 'https://'.$username.'.app.saas.ist';

            $workspace = new Workspace;
            $workspace->username = $username;
            $workspace->name = $data['company_name'];
            $workspace->type = 'Business';
            $workspace->base_url = $base_url;
            $workspace->is_active = 1;
            $workspace->owner_id = 1;
            $workspace->parent_id = 0;
            $workspace->trial_ends_at = date('Y-m-d',strtotime("+$free_trial_days days"));
            $workspace->save();

            $workspace_id = $workspace->id;

            $str = Ib_Str::random_string(20).$workspace_id;

            $user = new User;
            $user->workspace_id = $workspace_id;
            $user->username = $data['email'];
            $user->fullname = $data['full_name'];
            $user->phonenumber = '';
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            $user->user_type = 'Admin';
            $user->status = 'Inactive';
            $user->email = $data['email'];
            $user->creationdate = date('Y-m-d H:i:s');
            $user->otp = 'No';
            $user->img = '';
            $user->pwresetkey = '';
            $user->keyexpire = '';
            $user->notes = '';

            $user->autologin = $str;

            $user->is_email_verified = 0;
            $user->is_phone_verified = 0;
            $user->activation_key = $activation_key;

            $user->language = $default_settings['language'];


            $user->save();

            // Login customer

            $_SESSION['uid'] = $user->id;
            $_SESSION['language'] = $default_settings['language'];
            $_SESSION['workspace_id'] = $workspace_id;

            setcookie('ib_at', $str, time() + (86400 * 180), "/");

            // Create Primary Data for this workspace

            $settings_data = Workspace::primaryData('settings',$data,$workspace_settings);

            foreach ($settings_data as $d)
            {
                $s = new Setting;
                $s->workspace_id = $workspace_id;
                $s->setting = $d['key'];
                $s->value = $d['value'];
                $s->save();
            }

            $sms_templates = require 'system/config/sms_templates.php';

            foreach ($sms_templates as $sms_template)
            {
                $tpl = new SMSTemplate;
                $tpl->workspace_id = $workspace_id;
                $tpl->tpl = $sms_template['name'];
                $tpl->sms = $sms_template['template'];
                $tpl->save();
            }

            $categories = require 'system/config/transaction_categories.php';

            foreach ($categories as $category)
            {
                $cat = new Category;
                $cat->workspace_id = $workspace_id;
                $cat->name = $category['name'];
                $cat->type = $category['type'];
                $cat->sorder = 1;
                $cat->save();
            }

            // Create home currency

            $currency = new Currency;
            $currency->workspace_id = $workspace_id;
            $currency->cname = 'USD';
            $currency->iso_code = 'USD';
            $currency->symbol = '$';
            $currency->save();

            $email_templates = require 'system/config/email_templates.php';

            foreach ($email_templates as $email_template)
            {
                $template = new EmailTemplate;
                $template->workspace_id = $workspace_id;
                $template->tplname = $email_template['name'];
                $template->language_id = 1;
                $template->subject = $email_template['subject'];
                $template->message = $email_template['message'];
                $template->save();
            }

            // Create default email config

            $email_config = new EmailConfig;
            $email_config->workspace_id = $workspace_id;
            $email_config->method = 'phpmail';
            $email_config->host = '';
            $email_config->username = '';
            $email_config->password = '';
            $email_config->apikey = '';
            $email_config->port = '';
            $email_config->secure = '';
            $email_config->save();

            $permissions = require 'system/config/permissions.php';

            foreach ($permissions as $permission)
            {
                $p = new Permission;
                $p->workspace_id = $workspace_id;
                $p->pname = $permission['name'];
                $p->shortname = $permission['shortname'];
                $p->available = 0;
                $p->core = 1;
                $p->save();
            }

            $gateways = require 'system/config/payment_gateways.php';

            $app->emit('workspace_creating_payment_gateways',[&$workspace_id]);


            foreach ($gateways as $gateway)
            {
                $payment_gateway = new PaymentGateway;
                $payment_gateway->workspace_id = $workspace_id;
                $payment_gateway->name = $gateway['name'];
                $payment_gateway->settings = $gateway['settings'];
                $payment_gateway->value = $gateway['value'];
                $payment_gateway->processor = $gateway['processor'];
                $payment_gateway->ins = $gateway['ins'];
                $payment_gateway->c1 = $gateway['c1'];
                $payment_gateway->c2 = $gateway['c2'];
                $payment_gateway->c3 = $gateway['c3'];
                $payment_gateway->c4 = $gateway['c4'];
                $payment_gateway->c5 = $gateway['c5'];
                $payment_gateway->status = 'Inactive';
                $payment_gateway->sorder = 1;
                $payment_gateway->save();

            }

            $methods = require 'system/config/transaction_payment_methods.php';

            foreach ($methods as $method)
            {
                $payment_method = new PaymentMethod;
                $payment_method->workspace_id = $workspace_id;
                $payment_method->name = $method['name'];
                $payment_method->sorder = $method['sort_order'];
                $payment_method->save();
            }

            $crons = require 'system/config/cron_data.php';

            foreach ($crons as $cron)
            {
                $schedule = new CronSchedule;
                $schedule->workspace_id = $workspace_id;
                $schedule->cname = $cron['name'];
                $schedule->val = $cron['value'];
                $schedule->save();

            }

            $types = ['Pending','Accepted','Declined'];

            foreach ($types as $name)
            {
                $status_type = new StatusType;
                $status_type->workspace_id = $workspace_id;
                $status_type->type = 'Purchase Invoice';
                $status_type->name = $name;
                $status_type->save();
            }

            // Create default tax

            $tax = new Tax;
            $tax->workspace_id = $workspace_id;
            $tax->name = 'None';
            $tax->state = '';
            $tax->country = '';
            $tax->rate = 0.00;
            $tax->is_default = 1;
            $tax->save();

            $ticket_departments = ['Support','Sales'];

            foreach ($ticket_departments as $ticket_department)
            {
                $department = new TicketDepartment;
                $department->workspace_id = $workspace_id;
                $department->dname = $ticket_department;
                $department->description = '';
                $department->email = '';
                $department->hidden = 0;
                $department->delete_after_import = 0;
                $department->host = '';
                $department->port = '';
                $department->encryption = 'no';
                $department->sorder = 1;
                $department->save();
            }

            return [
                'success' => true,
                'result' => [
                    'user' => $user,
                    'workspace' => $workspace
                ]
            ];


        }
    }

    public static function primaryData($type,$data,$workspace_settings)
    {
        switch ($type)
        {
            case 'settings':

                return [

                    [
                        'key' => 'CompanyName',
                        'value' => $data['company_name']
                    ],
                    [
                        'key' => 'theme',
                        'value' => $workspace_settings['theme']
                    ],
                    [
                        'key' => 'currency_code',
                        'value' => $workspace_settings['currency_code']
                    ],
                    [
                        'key' => 'language',
                        'value' => $workspace_settings['language']
                    ],
                    [
                        'key' => 'show-logo',
                        'value' => '1'
                    ],
                    [
                        'key' => 'nstyle',
                        'value' => $workspace_settings['theme_style']
                    ],
                    [
                        'key' => 'dec_point',
                        'value' => $workspace_settings['decimal_point']
                    ],
                    [
                        'key' => 'thousands_sep',
                        'value' => $workspace_settings['thousands_separator']
                    ],
                    [
                        'key' => 'timezone',
                        'value' => $workspace_settings['timezone']
                    ],
                    [
                        'key' => 'country',
                        'value' => $workspace_settings['country']
                    ],
                    [
                        'key' => 'country_code',
                        'value' => $workspace_settings['country_code']
                    ],
                    [
                        'key' => 'df',
                        'value' => $workspace_settings['date_format']
                    ],
                    [
                        'key' => 'caddress',
                        'value' => $workspace_settings['address']
                    ],
                    [
                        'key' => 'account_search',
                        'value' => '1'
                    ],
                    [
                        'key' => 'redirect_url',
                        'value' => 'dashboard'
                    ],
                    [
                        'key' => 'rtl',
                        'value' => '0'
                    ],
                    [
                        'key' => 'ckey',
                        'value' => '0982995697'
                    ],
                    [
                        'key' => 'networth_goal',
                        'value' => $workspace_settings['networth_goal']
                    ],
                    [
                        'key' => 'sysEmail',
                        'value' => $workspace_settings['system_email']
                    ],
                    [
                        'key' => 'url_rewrite',
                        'value' => '1'
                    ],
                    [
                        'key' => 'build',
                        'value' => '291'
                    ],
                    [
                        'key' => 'animate',
                        'value' => '1'
                    ],
                    [
                        'key' => 'pdf_font',
                        'value' => $workspace_settings['pdf_font']
                    ],
                    [
                        'key' => 'accounting',
                        'value' => $workspace_settings['accounting']
                    ],
                    [
                        'key' => 'invoicing',
                        'value' => $workspace_settings['invoicing']
                    ],
                    [
                        'key' => 'quotes',
                        'value' => $workspace_settings['quotes']
                    ],
                    [
                        'key' => 'client_dashboard',
                        'value' => $workspace_settings['client_dashboard']
                    ],
                    [
                        'key' => 'contact_set_view_mode',
                        'value' => 'search'
                    ],
                    [
                        'key' => 'invoice_terms',
                        'value' => $workspace_settings['invoice_terms']
                    ],
                    [
                        'key' => 'console_notify_invoice_created',
                        'value' => $workspace_settings['console_notify_invoice_created']
                    ],
                    [
                        'key' => 'i_driver',
                        'value' => 'v2'
                    ],
                    [
                        'key' => 'purchase_key',
                        'value' => ''
                    ],
                    [
                        'key' => 'c_cache',
                        'value' => ''
                    ],
                    [
                        'key' => 'mininav',
                        'value' => '0'
                    ],
                    [
                        'key' => 'hide_footer',
                        'value' => '1'
                    ],
                    [
                        'key' => 'design',
                        'value' => 'default'
                    ],
                    [
                        'key' => 'default_landing_page',
                        'value' => 'login'
                    ],
                    [
                        'key' => 'recaptcha',
                        'value' => '1'
                    ],
                    [
                        'key' => 'recaptcha_sitekey',
                        'value' => ''
                    ],
                    [
                        'key' => 'recaptcha_secretkey',
                        'value' => ''
                    ],
                    [
                        'key' => 'home_currency',
                        'value' => $workspace_settings['home_currency']
                    ],
                    [
                        'key' => 'currency_decimal_digits',
                        'value' => $workspace_settings['currency_decimal_digits']
                    ],
                    [
                        'key' => 'currency_symbol_position',
                        'value' => $workspace_settings['currency_symbol_position']
                    ],
                    [
                        'key' => 'thousand_separator_placement',
                        'value' => $workspace_settings['thousand_separator_placement']
                    ],
                    [
                        'key' => 'dashboard',
                        'value' => $workspace_settings['dashboard']
                    ],
                    [
                        'key' => 'header_scripts',
                        'value' => $workspace_settings['header_scripts']
                    ],
                    [
                        'key' => 'footer_scripts',
                        'value' => $workspace_settings['footer_scripts']
                    ],
                    [
                        'key' => 'ib_key',
                        'value' => ''
                    ],
                    [
                        'key' => 'ib_s',
                        'value' => ''
                    ],
                    [
                        'key' => 'ib_u_t',
                        'value' => '1512841700'
                    ],
                    [
                        'key' => 'ib_u_a',
                        'value' => '0'
                    ],
                    [
                        'key' => 'momentLocale',
                        'value' => getMomentLocale($workspace_settings['language'])
                    ],
                    [
                        'key' => 'contentAnimation',
                        'value' => 'animated fadeIn'
                    ],
                    [
                        'key' => 'calendar',
                        'value' => $workspace_settings['calendar']
                    ],
                    [
                        'key' => 'leads',
                        'value' => $workspace_settings['leads']
                    ],
                    [
                        'key' => 'tasks',
                        'value' => $workspace_settings['tasks']
                    ],
                    [
                        'key' => 'orders',
                        'value' => $workspace_settings['orders']
                    ],
                    [
                        'key' => 'show_quantity_as',
                        'value' => $workspace_settings['show_quantity_as']
                    ],
                    [
                        'key' => 'gmap_api_key',
                        'value' => ''
                    ],
                    [
                        'key' => 'license_key',
                        'value' => ''
                    ],
                    [
                        'key' => 'local_key',
                        'value' => ''
                    ],
                    [
                        'key' => 'ib_installed_at',
                        'value' => '1485170108'
                    ],
                    [
                        'key' => 'maxmind_installed',
                        'value' => '1'
                    ],
                    [
                        'key' => 'maxmind_db_version',
                        'value' => ''
                    ],
                    [
                        'key' => 'add_fund',
                        'value' => $workspace_settings['add_fund']
                    ],
                    [
                        'key' => 'add_fund_minimum_deposit',
                        'value' => $workspace_settings['add_fund_minimum_deposit']
                    ],
                    [
                        'key' => 'add_fund_maximum_deposit',
                        'value' => $workspace_settings['add_fund_maximum_deposit']
                    ],
                    [
                        'key' => 'add_fund_maximum_balance',
                        'value' => $workspace_settings['add_fund_maximum_balance']
                    ],
                    [
                        'key' => 'add_fund_require_active_order',
                        'value' => $workspace_settings['add_fund_require_active_order']
                    ],
                    [
                        'key' => 'industry',
                        'value' => 'default'
                    ],
                    [
                        'key' => 'sales_target',
                        'value' => '1000000'
                    ],
                    [
                        'key' => 'inventory',
                        'value' => $workspace_settings['inventory']
                    ],
                    [
                        'key' => 'secondary_currency',
                        'value' => ''
                    ],
                    [
                        'key' => 'customer_custom_username',
                        'value' => $workspace_settings['customer_custom_username']
                    ],
                    [
                        'key' => 'documents',
                        'value' => $workspace_settings['documents']
                    ],
                    [
                        'key' => 'projects',
                        'value' => $workspace_settings['projects']
                    ],
                    [
                        'key' => 'purchase',
                        'value' => $workspace_settings['purchase']
                    ],
                    [
                        'key' => 'suppliers',
                        'value' => $workspace_settings['suppliers']
                    ],
                    [
                        'key' => 'support',
                        'value' => $workspace_settings['support']
                    ],
                    [
                        'key' => 'hrm',
                        'value' => $workspace_settings['hrm']
                    ],
                    [
                        'key' => 'companies',
                        'value' => $workspace_settings['companies']
                    ],
                    [
                        'key' => 'plugins',
                        'value' => $workspace_settings['plugins']
                    ],
                    [
                        'key' => 'country_flag_code',
                        'value' => $workspace_settings['country_flag_code']
                    ],
                    [
                        'key' => 'graph_primary_color',
                        'value' => $workspace_settings['graph_primary_color']
                    ],
                    [
                        'key' => 'graph_secondary_color',
                        'value' => $workspace_settings['graph_secondary_color']
                    ],
                    [
                        'key' => 'expense_type_1',
                        'value' => $workspace_settings['expense_type_1']
                    ],
                    [
                        'key' => 'expense_type_2',
                        'value' => $workspace_settings['expense_type_2']
                    ],
                    [
                        'key' => 'edition',
                        'value' => 'default'
                    ],
                    [
                        'key' => 'assets',
                        'value' => $workspace_settings['assets']
                    ],
                    [
                        'key' => 'kb',
                        'value' => $workspace_settings['kb']
                    ],
                    [
                        'key' => 'business_id_1',
                        'value' => ''
                    ],
                    [
                        'key' => 'business_id_2',
                        'value' => ''
                    ],
                    [
                        'key' => 'logo_default',
                        'value' => $workspace_settings['logo_default']
                    ],
                    [
                        'key' => 'logo_inverse',
                        'value' => $workspace_settings['logo_inverse']
                    ],
                    [
                        'key' => 'add_fund_client',
                        'value' => $workspace_settings['add_fund_client']
                    ],
                    [
                        'key' => 'order_method',
                        'value' => $workspace_settings['order_method']
                    ],
                    [
                        'key' => 'purchase_code',
                        'value' => ''
                    ],
                    [
                        'key' => 'invoice_receipt_number',
                        'value' => $workspace_settings['invoice_receipt_number']
                    ],
                    [
                        'key' => 'allow_customer_registration',
                        'value' => $workspace_settings['allow_customer_registration']
                    ],
                    [
                        'key' => 'fax_field',
                        'value' => $workspace_settings['fax_field']
                    ],
                    [
                        'key' => 'show_business_number',
                        'value' => $workspace_settings['show_business_number']
                    ],
                    [
                        'key' => 'label_business_number',
                        'value' => $workspace_settings['label_business_number']
                    ],
                    [
                        'key' => 'sms',
                        'value' => $workspace_settings['sms']
                    ],
                    [
                        'key' => 'sms_request_method',
                        'value' => $workspace_settings['sms_request_method']
                    ],
                    [
                        'key' => 'sms_auth_header',
                        'value' => $workspace_settings['sms_auth_header']
                    ],
                    [
                        'key' => 'sms_req_url',
                        'value' => $workspace_settings['sms_req_url']
                    ],
                    [
                        'key' => 'sms_notify_admin_new_deposit',
                        'value' => $workspace_settings['sms_notify_admin_new_deposit']
                    ],
                    [
                        'key' => 'sms_notify_customer_signed_up',
                        'value' => $workspace_settings['sms_notify_customer_signed_up']
                    ],
                    [
                        'key' => 'sms_notify_customer_invoice_created',
                        'value' => $workspace_settings['sms_notify_customer_invoice_created']
                    ],
                    [
                        'key' => 'sms_notify_customer_invoice_paid',
                        'value' => $workspace_settings['sms_notify_customer_invoice_paid']
                    ],
                    [
                        'key' => 'sms_notify_customer_payment_received',
                        'value' => $workspace_settings['sms_notify_customer_payment_received']
                    ],
                    [
                        'key' => 'sms_api_handler',
                        'value' => $workspace_settings['sms_api_handler']
                    ],
                    [
                        'key' => 'sms_auth_username',
                        'value' => $workspace_settings['sms_auth_username']
                    ],
                    [
                        'key' => 'sms_auth_password',
                        'value' => $workspace_settings['sms_auth_password']
                    ],
                    [
                        'key' => 'sms_sender_name',
                        'value' => $workspace_settings['sms_sender_name']
                    ],
                    [
                        'key' => 'sms_http_params',
                        'value' => $workspace_settings['sms_http_params']
                    ],
                    [
                        'key' => 'purchase_invoice_payment_status',
                        'value' => $workspace_settings['purchase_invoice_payment_status']
                    ],
                    [
                        'key' => 'quote_confirmation_email',
                        'value' => $workspace_settings['quote_confirmation_email']
                    ],
                    [
                        'key' => 'client_drive',
                        'value' => $workspace_settings['client_drive']
                    ],
                    [
                        'key' => 's_version',
                        'value' => '7'
                    ],
                    [
                        'key' => 'latest_file',
                        'value' => ''
                    ],
                    [
                        'key' => 'invoice_show_watermark',
                        'value' => $workspace_settings['invoice_show_watermark']
                    ],
                    [
                        'key' => 'show_country_flag',
                        'value' => $workspace_settings['show_country_flag']
                    ],
                    [
                        'key' => 'drive',
                        'value' => $workspace_settings['drive']
                    ],
                    [
                        'key' => 'tax_system',
                        'value' => $workspace_settings['tax_system']
                    ],
                    [
                        'key' => 'pos',
                        'value' => $workspace_settings['pos']
                    ],
                    [
                        'key' => 'password_manager',
                        'value' => $workspace_settings['password_manager']
                    ],
                    [
                        'key' => 'update_manager',
                        'value' => '1'
                    ],
                    [
                        'key' => 'app_credentials',
                        'value' => '0'
                    ],
                    [
                        'key' => 'business_location',
                        'value' => ''
                    ],
                    [
                        'key' => 'hr',
                        'value' => '1'
                    ],
                    [
                        'key' => 'show_sidebar_header',
                        'value' => '1'
                    ],
                    [
                        'key' => 'top_bar_is_dark',
                        'value' => '1'
                    ],
                    [
                        'key' => 'slack_webhook_url',
                        'value' => '1'
                    ]
                ];

                break;




        }
    }

}