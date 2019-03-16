<?php
use Illuminate\Database\Eloquent\Model;
use Rakit\Validation\Validator;
class Workspace extends Model
{

    public static function createWorkspace($data)
    {


        $workspace_settings = require 'system/config/workspace.php';

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
                    'errors' => 'User already exist'
                ];
            }

            // Create workspace

            $activation_key = mt_rand(100000, 999999);
            $username = (string) \Ramsey\Uuid\Uuid::uuid4();
            $base_url = 'https://'.$username.'.cloudonex.com';

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

            $settings_data = Workspace::primaryData('settings',$data);

            foreach ($settings_data as $d)
            {
                $s = new Setting;
                $s->workspace_id = $workspace_id;
                $s->setting = $d['key'];
                $s->value = $d['value'];
                $s->save();
            }

            $sms_templates = Workspace::primaryData('sms_templates',$data);

            foreach ($sms_templates as $sms_template)
            {
                $tpl = new SMSTemplate;
                $tpl->workspace_id = $workspace_id;
                $tpl->tpl = $sms_template['name'];
                $tpl->sms = $sms_template['template'];
                $tpl->save();
            }

            $categories = Workspace::primaryData('categories',$data);

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

            $email_templates = Workspace::primaryData('email_templates',$data);

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

            $permissions = Workspace::primaryData('permissions',$data);

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

            $gateways = Workspace::primaryData('payment_gateways',$data);

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

            $methods = Workspace::primaryData('payment_methods',$data);

            foreach ($methods as $method)
            {
                $payment_method = new PaymentMethod;
                $payment_method->workspace_id = $workspace_id;
                $payment_method->name = $method['name'];
                $payment_method->sorder = $method['sort_order'];
                $payment_method->save();
            }

            $crons = Workspace::primaryData('cron_data',$data);

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

    public static function primaryData($type,$data)
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
                        'value' => 'default'
                    ],
                    [
                        'key' => 'currency_code',
                        'value' => '$'
                    ],
                    [
                        'key' => 'language',
                        'value' => 'en'
                    ],
                    [
                        'key' => 'show-logo',
                        'value' => '1'
                    ],
                    [
                        'key' => 'nstyle',
                        'value' => 'light_blue'
                    ],
                    [
                        'key' => 'dec_point',
                        'value' => '.'
                    ],
                    [
                        'key' => 'thousands_sep',
                        'value' => ','
                    ],
                    [
                        'key' => 'timezone',
                        'value' => 'America/New_York'
                    ],
                    [
                        'key' => 'country',
                        'value' => 'United States'
                    ],
                    [
                        'key' => 'country_code',
                        'value' => 'US'
                    ],
                    [
                        'key' => 'df',
                        'value' => 'Y-m-d'
                    ],
                    [
                        'key' => 'caddress',
                        'value' => 'CloudOnex <br>1101 Marina Villae Parkway, Suite 201<br>Alameda, California 94501<br>United State'
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
                        'value' => '350000'
                    ],
                    [
                        'key' => 'sysEmail',
                        'value' => 'demo@example.com'
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
                        'value' => '0'
                    ],
                    [
                        'key' => 'pdf_font',
                        'value' => 'dejavusanscondensed'
                    ],
                    [
                        'key' => 'accounting',
                        'value' => '1'
                    ],
                    [
                        'key' => 'invoicing',
                        'value' => '1'
                    ],
                    [
                        'key' => 'quotes',
                        'value' => '1'
                    ],
                    [
                        'key' => 'client_dashboard',
                        'value' => '1'
                    ],
                    [
                        'key' => 'contact_set_view_mode',
                        'value' => 'search'
                    ],
                    [
                        'key' => 'invoice_terms',
                        'value' => ''
                    ],
                    [
                        'key' => 'console_notify_invoice_created',
                        'value' => '0'
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
                        'value' => 'USD'
                    ],
                    [
                        'key' => 'currency_decimal_digits',
                        'value' => 'true'
                    ],
                    [
                        'key' => 'currency_symbol_position',
                        'value' => 'p'
                    ],
                    [
                        'key' => 'thousand_separator_placement',
                        'value' => '3'
                    ],
                    [
                        'key' => 'dashboard',
                        'value' => 'canvas'
                    ],
                    [
                        'key' => 'header_scripts',
                        'value' => ''
                    ],
                    [
                        'key' => 'footer_scripts',
                        'value' => ''
                    ],
                    [
                        'key' => 'ib_key',
                        'value' => 'vLBLfhA6DNi1R2MFHO8IvFWr4Cn9665eHUF+L/sqAKM='
                    ],
                    [
                        'key' => 'ib_s',
                        'value' => 'PNhjeZ0sOFF3JNfzT2mLxvNNKPeh6ltqpE+G5LVSDSvgp/z79Sco7W4tJEoXYIl8'
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
                        'value' => 'en'
                    ],
                    [
                        'key' => 'contentAnimation',
                        'value' => 'animated fadeIn'
                    ],
                    [
                        'key' => 'calendar',
                        'value' => '1'
                    ],
                    [
                        'key' => 'leads',
                        'value' => '1'
                    ],
                    [
                        'key' => 'tasks',
                        'value' => '1'
                    ],
                    [
                        'key' => 'orders',
                        'value' => '1'
                    ],
                    [
                        'key' => 'show_quantity_as',
                        'value' => ''
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
                        'value' => '1'
                    ],
                    [
                        'key' => 'add_fund_minimum_deposit',
                        'value' => '100'
                    ],
                    [
                        'key' => 'add_fund_maximum_deposit',
                        'value' => '2500'
                    ],
                    [
                        'key' => 'add_fund_maximum_balance',
                        'value' => '25000'
                    ],
                    [
                        'key' => 'add_fund_require_active_order',
                        'value' => '0'
                    ],
                    [
                        'key' => 'industry',
                        'value' => 'default'
                    ],
                    [
                        'key' => 'sales_target',
                        'value' => '10000'
                    ],
                    [
                        'key' => 'inventory',
                        'value' => '1'
                    ],
                    [
                        'key' => 'secondary_currency',
                        'value' => ''
                    ],
                    [
                        'key' => 'customer_custom_username',
                        'value' => '1'
                    ],
                    [
                        'key' => 'documents',
                        'value' => '1'
                    ],
                    [
                        'key' => 'projects',
                        'value' => '0'
                    ],
                    [
                        'key' => 'purchase',
                        'value' => '1'
                    ],
                    [
                        'key' => 'suppliers',
                        'value' => '1'
                    ],
                    [
                        'key' => 'support',
                        'value' => '1'
                    ],
                    [
                        'key' => 'hrm',
                        'value' => '0'
                    ],
                    [
                        'key' => 'companies',
                        'value' => '1'
                    ],
                    [
                        'key' => 'plugins',
                        'value' => '1'
                    ],
                    [
                        'key' => 'country_flag_code',
                        'value' => 'us'
                    ],
                    [
                        'key' => 'graph_primary_color',
                        'value' => '00a2e5'
                    ],
                    [
                        'key' => 'graph_secondary_color',
                        'value' => 'eb3c00'
                    ],
                    [
                        'key' => 'expense_type_1',
                        'value' => 'Personal'
                    ],
                    [
                        'key' => 'expense_type_2',
                        'value' => 'Business'
                    ],
                    [
                        'key' => 'edition',
                        'value' => 'default'
                    ],
                    [
                        'key' => 'assets',
                        'value' => '1'
                    ],
                    [
                        'key' => 'kb',
                        'value' => '1'
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
                        'value' => 'logo_2105025689.png'
                    ],
                    [
                        'key' => 'logo_inverse',
                        'value' => 'logo_inverse_7627893866.png'
                    ],
                    [
                        'key' => 'add_fund_client',
                        'value' => '0'
                    ],
                    [
                        'key' => 'order_method',
                        'value' => 'create_invoice_later'
                    ],
                    [
                        'key' => 'purchase_code',
                        'value' => ''
                    ],
                    [
                        'key' => 'invoice_receipt_number',
                        'value' => '0'
                    ],
                    [
                        'key' => 'allow_customer_registration',
                        'value' => '1'
                    ],
                    [
                        'key' => 'fax_field',
                        'value' => '0'
                    ],
                    [
                        'key' => 'show_business_number',
                        'value' => '1'
                    ],
                    [
                        'key' => 'label_business_number',
                        'value' => 'Business Number'
                    ],
                    [
                        'key' => 'sms',
                        'value' => '1'
                    ],
                    [
                        'key' => 'sms_request_method',
                        'value' => 'POST'
                    ],
                    [
                        'key' => 'sms_auth_header',
                        'value' => ''
                    ],
                    [
                        'key' => 'sms_req_url',
                        'value' => ''
                    ],
                    [
                        'key' => 'sms_notify_admin_new_deposit',
                        'value' => '0'
                    ],
                    [
                        'key' => 'sms_notify_customer_signed_up',
                        'value' => '0'
                    ],
                    [
                        'key' => 'sms_notify_customer_invoice_created',
                        'value' => '0'
                    ],
                    [
                        'key' => 'sms_notify_customer_invoice_paid',
                        'value' => '0'
                    ],
                    [
                        'key' => 'sms_notify_customer_payment_received',
                        'value' => '0'
                    ],
                    [
                        'key' => 'sms_api_handler',
                        'value' => 'Nexmo'
                    ],
                    [
                        'key' => 'sms_auth_username',
                        'value' => ''
                    ],
                    [
                        'key' => 'sms_auth_password',
                        'value' => ''
                    ],
                    [
                        'key' => 'sms_sender_name',
                        'value' => 'CLX'
                    ],
                    [
                        'key' => 'sms_http_params',
                        'value' => ''
                    ],
                    [
                        'key' => 'purchase_invoice_payment_status',
                        'value' => '0'
                    ],
                    [
                        'key' => 'quote_confirmation_email',
                        'value' => '1'
                    ],
                    [
                        'key' => 'client_drive',
                        'value' => '1'
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
                        'value' => '1'
                    ],
                    [
                        'key' => 'show_country_flag',
                        'value' => '0'
                    ],
                    [
                        'key' => 'drive',
                        'value' => '0'
                    ],
                    [
                        'key' => 'tax_system',
                        'value' => 'default'
                    ],
                    [
                        'key' => 'pos',
                        'value' => '1'
                    ],
                    [
                        'key' => 'password_manager',
                        'value' => 'default'
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

            case 'sms_templates':

                return [

                    [
                        'name' => 'Invoice Created',
                        'template' => 'Your Invoice- {{invoice_id}} is created. To view your invoice- {{invoice_url}}'
                    ],
                    [
                        'name' => 'Invoice Payment Reminder',
                        'template' => 'We have not received payment for invoice {{invoice_id}}, dated {{invoice_date}}. To view your invoice- {{invoice_url}}'
                    ],
                    [
                        'name' => 'Invoice Overdue Notice',
                        'template' => 'Your Invoice- {{invoice_id}} is now overdue. To view your invoice- {{invoice_url}}'
                    ],
                    [
                        'name' => 'Invoice Payment Confirmation',
                        'template' => 'We have received your Payment for Invoice ID- {{invoice_id}}'
                    ],
                    [
                        'name' => 'Invoice Refund Confirmation',
                        'template' => 'Your Payment for {{invoice_id}} has been refunded.'
                    ],
                    [
                        'name' => 'Quote Created',
                        'template' => 'A Quote has been created- {{quote_id}}. You can view this Quote- {{quote_url}}'
                    ],
                    [
                        'name' => 'Quote Accepted',
                        'template' => 'Thanks for Accepting Quote - {{quote_id}}. You can view this Quote- {{quote_url}}'
                    ],
                    [
                        'name' => 'Quote Cancelled',
                        'template' => 'Quote has been cancelled - {{quote_id}}. You can view this Quote- {{quote_url}}'
                    ],
                    [
                        'name' => 'Quote Accepted: Admin Notification',
                        'template' => 'Quote - {{quote_id}} has been accepted. You can view this Quote- {{quote_url}}'
                    ],
                    [
                        'name' => 'Quote Cancelled: Admin Notification',
                        'template' => 'Quote - {{quote_id}} has been Cancelled. You can view this Quote- {{quote_url}}'
                    ]
                ];

                break;

            case 'categories':

                return [

                    [
                        'name' => 'Advertising',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Bank and Credit Card Interest',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Car and Truck',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Commissions and Fees',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Contract Labor',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Contributions',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Cost of Goods Sold',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Credit Card Interest',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Depreciation',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Dividend Payments',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Employee Benefit Programs',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Entertainment',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Gift',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Insurance',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Legal, Accountant &amp; Other Professional Services',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Meals',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Mortgage Interest',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Non-Deductible Expense',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Other Business Property Leasing',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Owner Draws',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Payroll Taxes',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Phone',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Postage',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Rent',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Repairs &amp; Maintenance',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Supplies',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Taxes and Licenses',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Transfer Funds',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Travel',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Utilities',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Vehicle, Machinery &amp; Equipment Rental or Leasing',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Wages',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Regular Income',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Owner Contribution',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Interest Income',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Expense Refund',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Other Income',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Salary',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Equities',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Rent &amp; Royalties',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Home equity',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Part Time Work',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Account Transfer',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Health Care',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Loans',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Selling Software',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Software Customization',
                        'type' => 'Income'
                    ],
                    [
                        'name' => 'Salary',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Paypal',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Office Equipment',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Staff Entertaining',
                        'type' => 'Expense'
                    ],
                    [
                        'name' => 'Uncategorized',
                        'type' => 'Income'
                    ],

                ];

                break;

            case 'email_templates':

                return [

                    [
                        'name' => 'Invoice:Invoice Created',
                        'subject' => '{{business_name}} Invoice',
                        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This email serves as your official invoice from <strong>{{business_name}}. </strong>	</div><div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
                    ],
                    [
                        'name' => 'Admin:Password Change Request',
                        'subject' => '{{business_name}} password change request',
                        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Hi {{name}},</div>	<div style="padding:5px">		This is to confirm that we have received a Forgot Password request for your Account Username - {{username}} <br>From the IP Address - {{ip_address}}	</div>	<div style="padding:5px">		Click this linke to reset your password- <br><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{password_reset_link}}">{{password_reset_link}}</a>	</div><div style="padding:5px">Please note: until your password has been changed, your current password will remain valid. The Forgot Password Link will be available for a limited time only.</div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
                    ],
                    [
                        'name' => 'Admin:New Password',
                        'subject' => '{{business_name}} New Password for Admin',
                        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3">

<div style="padding:5px;font-size:11pt;font-weight:bold">
   Hello {{name}}
</div>


	<div style="padding:5px">
		Here is your new password for <strong>{{business_name}}. </strong>
	</div>

	
<div style="padding:10px 5px">
    Log in URL: <a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{login_url}}">{{login_url}}</a><br>Username: {{username}}<br>Password: {{password}}</div>

<div style="padding:5px">For security reason, Please change your password after login. </div>

<div style="padding:0px 5px">
	<div>Best Regards,<br>{{business_name}} Team</div>

</div>

</div>'
                    ],
                    [
                        'name' => 'Invoice:Invoice Payment Reminder',
                        'subject' => '{{business_name}} Invoice Payment Reminder',
                        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is a billing reminder that your invoice no. {{invoice_id}} which was generated on {{invoice_date}} is due on {{invoice_due_date}}. 	</div><div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
                    ],
                    [
                        'name' => 'Invoice:Invoice Overdue Notice',
                        'subject' => '{{business_name}} Invoice Overdue Notice',
                        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is the notice that your invoice no. {{invoice_id}} which was generated on {{invoice_date}} is now overdue.	</div>	<div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
                    ],
                    [
                        'name' => 'Invoice:Invoice Payment Confirmation',
                        'subject' => '{{business_name}} Invoice Payment Confirmation',
                        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3">

<div style="padding:5px;font-size:11pt;font-weight:bold">
   Greetings,
</div>



	<div style="padding:5px">
		This is a payment receipt for Invoice {{invoice_id}} sent on {{invoice_date}}.
	</div>


	<div style="padding:5px">
		Login to your client Portal to view this invoice.
	</div>


<div style="padding:10px 5px">
    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div>


<div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div>


<div style="padding:0px 5px">
	<div>Best Regards,<br>{{business_name}} Team</div>


</div>


</div>'
                    ],
                    [
                        'name' => 'Invoice:Invoice Refund Confirmation',
                        'subject' => '{{business_name}} Invoice Refund Confirmation',
                        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is confirmation that a refund has been processed for Invoice {{invoice_id}} sent on {{invoice_date}}.	</div><div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
                    ],
                    [
                        'name' => 'Quote:Quote Created',
                        'subject' => '{{quote_subject}}',
                        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		Dear {{contact_name}},&nbsp;<br> Here is the quote you requested for.  The quote is valid until {{valid_until}}.	</div><div style="padding:10px 5px">    Quote Unique URL: <a href="{{quote_url}}" target="_blank">{{quote_url}}</a><br></div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
                    ],
                    [
                        'name' => 'Client:Client Signup Email',
                        'subject' => 'Your {{business_name}} Login Info',
                        'message' => '<p>Dear {{client_name}},</p>
<p>Welcome to {{business_name}}.</p>
<p>You can track your billing, profile, transactions from this portal.</p>
<p>Your login information is as follows:</p>
<p>---------------------------------------------------------------------------------------</p>
<p>Login URL: {{client_login_url}} <br />Email Address: {{client_email}}<br /> Password: Your chosen password.</p>
<p>----------------------------------------------------------------------------------------</p>
<p>We very much appreciate you for choosing us.</p>
<p>{{business_name}} Team</p>'
                    ],
                    [
                        'name' => 'Tickets:Client Ticket Created',
                        'subject' => '{{subject}}',
                        'message' => '<p>{{client_name}},</p>
<p>Thank you for contacting our support team. A support ticket has now been opened for your request. You will be notified when a response is made by email. Your ticket ID is {{ticket_id}} and a copy of your original message is included below.</p>
<p>
Subject: {ticket_subject}
<br /> Message: <br />
{{message}}
<br /> Priority: {{ticket_priority}}
<br /> Status: {{ticket_status}}
</p>
<p>You can view the ticket at any time at {{ticket_link}}</p>
'
                    ],
                    [
                        'name' => 'Tickets:Admin Ticket Created',
                        'subject' => '{{subject}}',
                        'message' => '<p>{{admin_view_link}}</p> {{message}}'
                    ],
                    [
                        'name' => 'Tickets:Client Response',
                        'subject' => '{{subject}}',
                        'message' => '<p>{{ticket_message}}</p>
<p>----------------------------------------------<br /> Ticket ID: #{{ticket_id}}<br /> Subject: {{ticket_subject}}<br /> Status: {{ticket_status}}<br /> Ticket URL: {{ticket_link}}<br /> ----------------------------------------------</p>'
                    ],
                    [
                        'name' => 'Tickets:Admin Response',
                        'subject' => '{{subject}}',
                        'message' => '<p>{{ticket_message}}</p>
<p>----------------------------------------------<br /> Ticket ID: #{{ticket_id}}<br /> Subject: {{ticket_subject}}<br /> Status: {{ticket_status}}<br /> Ticket URL: {{ticket_link}}<br /> ----------------------------------------------</p>'
                    ],
                    [
                        'name' => 'Purchase Invoice:Invoice Created',
                        'subject' => '{{business_name}} Invoice',
                        'message' => '<div style="line-height: 1.6; color: #222; text-align: left; width: 550px; font-size: 10pt; margin: 0px 10px; font-family: verdana,\'droid sans\',\'lucida sans\',sans-serif; padding: 14px; border: 3px solid #d8d8d8; border-top: 3px solid #007bc3;">
<div style="padding: 5px; font-size: 11pt; font-weight: bold;">Greetings,</div>
<div style="padding: 5px;">This email serves as your official invoice from <strong>{{business_name}}. </strong></div>
<div style="padding: 10px 5px;">Invoice URL: {{invoice_url}}<br />Invoice ID: {{invoice_id}}<br />Invoice Amount: {{invoice_amount}}</div>
<div style="padding: 5px;"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span></div>
<div style="padding: 0px 5px;">
<div>Best Regards,<br />{{business_name}} Team</div>
</div>
</div>'
                    ],
                    [
                        'name' => 'Quote:Quote Cancelled',
                        'subject' => '{{business_name}} Quote',
                        'message' => '<div style="line-height: 1.6; color: #222; text-align: left; width: 550px; font-size: 10pt; margin: 0px 10px; font-family: verdana,sans-serif; padding: 14px; border: 3px solid #d8d8d8; border-top: 3px solid #007bc3;">
<div style="padding: 5px; font-size: 11pt; font-weight: bold;">Greetings,</div>
<div style="padding: 5px;">Dear {{contact_name}},&nbsp;<br />We are sorry to see you go. If you chnage your mind, you can Accept it again from following url. The quote is valid until {{valid_until}}.</div>
<div style="padding: 10px 5px;">Quote Unique URL: <a href="http://stackb.dev/{{quote_url}}" target="_blank" rel="noopener noreferrer">{{quote_url}}</a></div>
<div style="padding: 5px;"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span></div>
<div style="padding: 0px 5px;">
<div>Best Regards,<br />{{business_name}} Team</div>
</div>
</div>'
                    ],
                    [
                        'name' => 'Quote:Quote Accepted',
                        'subject' => '{{business_name}} Quote',
                        'message' => '<div style="line-height: 1.6; color: #222; text-align: left; width: 550px; font-size: 10pt; margin: 0px 10px; font-family: verdana,sans-serif; padding: 14px; border: 3px solid #d8d8d8; border-top: 3px solid #007bc3;">
<div style="padding: 5px; font-size: 11pt; font-weight: bold;">Greetings,</div>
<div style="padding: 5px;">Dear {{contact_name}},&nbsp;<br />Thank you for accepting the Quote.</div>
<div style="padding: 10px 5px;">Quote: <a href="{{quote_url}}" target="_blank" rel="noopener noreferrer">{{quote_url}}</a></div>
<div style="padding: 5px;"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span></div>
<div style="padding: 0px 5px;">
<div>Best Regards,<br />{{business_name}} Team</div>
</div>
</div>'
                    ],

                ];
                
                break;

            case 'permissions':

                return [

                    [
                        'name' => 'Customers',
                        'shortname' => 'customers'
                    ],
                    [
                        'name' => 'Companies',
                        'shortname' => 'companies'
                    ],
                    [
                        'name' => 'Transactions',
                        'shortname' => 'transactions'
                    ],
                    [
                        'name' => 'Sales',
                        'shortname' => 'sales'
                    ],
                    [
                        'name' => 'Bank & Cash',
                        'shortname' => 'bank_n_cash'
                    ],
                    [
                        'name' => 'Products & Services',
                        'shortname' => 'products_n_services'
                    ],
                    [
                        'name' => 'Reports',
                        'shortname' => 'reports'
                    ],
                    [
                        'name' => 'Utilities',
                        'shortname' => 'utilities'
                    ],
                    [
                        'name' => 'Appearance',
                        'shortname' => 'appearance'
                    ],
                    [
                        'name' => 'Plugins',
                        'shortname' => 'plugins'
                    ],
                    [
                        'name' => 'Calendar',
                        'shortname' => 'calendar'
                    ],
                    [
                        'name' => 'Leads',
                        'shortname' => 'leads'
                    ],
                    [
                        'name' => 'Tasks',
                        'shortname' => 'tasks'
                    ],
                    [
                        'name' => 'Contracts',
                        'shortname' => 'contracts'
                    ],
                    [
                        'name' => 'Orders',
                        'shortname' => 'orders'
                    ],
                    [
                        'name' => 'Settings',
                        'shortname' => 'settings'
                    ],
                    [
                        'name' => 'Documents',
                        'shortname' => 'documents'
                    ],
                    [
                        'name' => 'Purchase',
                        'shortname' => 'purchase'
                    ],
                    [
                        'name' => 'Suppliers',
                        'shortname' => 'suppliers'
                    ],
                    [
                        'name' => 'SMS',
                        'shortname' => 'sms'
                    ],
                    [
                        'name' => 'Support',
                        'shortname' => 'support'
                    ],
                    [
                        'name' => 'Knowledgebase',
                        'shortname' => 'kb'
                    ],
                    [
                        'name' => 'Password Manager',
                        'shortname' => 'password_manager'
                    ],
                    [
                        'name' => 'HRM',
                        'shortname' => 'hr'
                    ],

                ];

                break;

            case 'payment_gateways':

                return [

                    [
                        'name' => 'Paypal',
                        'processor' => 'paypal',
                        'settings' => 'Paypal Email',
                        'value' => 'demo@example.com',
                        'ins' => 'Invoices',
                        'c1' => 'USD',
                        'c2' => '1',
                        'c3' => '',
                        'c4' => '',
                        'c5' => ''
                    ],
                    [
                        'name' => 'Stripe',
                        'processor' => 'stripe',
                        'settings' => 'API Key',
                        'value' => '',
                        'ins' => '',
                        'c1' => '',
                        'c2' => '',
                        'c3' => '',
                        'c4' => '',
                        'c5' => ''
                    ],
                    [
                        'name' => 'Bank / Cash',
                        'processor' => 'manualpayment',
                        'settings' => 'Instructions',
                        'value' => 'Make a Payment to Our Bank Account <br>Bank Name: City Bank <br>Account Name: Sadia Sharmin <br>Account Number: 1505XXXXXXXX <br>',
                        'ins' => '',
                        'c1' => '',
                        'c2' => '',
                        'c3' => '',
                        'c4' => '',
                        'c5' => ''
                    ],
                    [
                        'name' => 'Authorize.net',
                        'processor' => 'authorize_net',
                        'settings' => 'API_LOGIN_ID',
                        'value' => 'Insert API Login ID here',
                        'ins' => '',
                        'c1' => 'Insert Transaction Key Here',
                        'c2' => '',
                        'c3' => '',
                        'c4' => '',
                        'c5' => ''
                    ],
                    [
                        'name' => 'Braintree',
                        'processor' => 'braintree',
                        'settings' => 'Merchant ID',
                        'value' => 'your merchant id',
                        'ins' => '',
                        'c1' => 'your public key',
                        'c2' => 'your private key',
                        'c3' => 'bank account',
                        'c4' => 'sandbox',
                        'c5' => ''
                    ],

                ];

                break;

            case 'payment_methods':

                return [

                    [
                        'name' => 'Cash',
                        'sort_order' => '1'
                    ],
                    [
                        'name' => 'Check',
                        'sort_order' => '4'
                    ],
                    [
                        'name' => 'Credit Card',
                        'sort_order' => '5'
                    ],
                    [
                        'name' => 'Debit',
                        'sort_order' => '6'
                    ],
                    [
                        'name' => 'Electronic Transfer',
                        'sort_order' => '7'
                    ],
                    [
                        'name' => 'Paypal',
                        'sort_order' => '2'
                    ],
                    [
                        'name' => 'ATM Withdrawals',
                        'sort_order' => '3'
                    ]
                ];

                break;

            case 'cron_data':

                return [
                    [
                        'name' => 'accounting_snapshot',
                        'value' => 'Active'
                    ],
                    [
                        'name' => 'recurring_invoice',
                        'value' => 'Active'
                    ],
                    [
                        'name' => 'notify',
                        'value' => 'Active'
                    ],
                    [
                        'name' => 'notifyemail',
                        'value' => 'demo@example.com'
                    ]
                ];

                break;




        }
    }

}