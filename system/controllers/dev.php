<?php
@ini_set('memory_limit', '512M');
@ini_set('max_execution_time', 0);
@set_time_limit(0);


/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

is_dev();

$user = User::_info();

if($user->id != 1)
{
    exit('Only Super Admin can access this page.');
}
$ui->assign('user', $user);


$ui->assign('_application_menu', 'dev');
$action = route(1,'view');







  use Stichoza\GoogleTranslate\TranslateClient;

 // use Twilio\Rest\Client;



switch ($action){

    case 'gen':

        $data = PaymentMethod::where('workspace_id',1)->get();

        foreach ($data as $d)
        {
            echo '[
\'name\' => \''.$d->name.'\',
\'sort_order\' => \''.$d->sorder.'\'
],
';
        }

        exit;

        break;

    case 'info':

        phpinfo();


        break;


    case 'ps_status':

        $t = new Schema('sys_purchase_invoice_status');
        $t->add('name','varchar');
        $t->add('sorder','integer',11,1);

        $t->save();





        break;


    case 'test1':

        $t = new Schema('crm_accounts');
        $t->add_column();
        $t->add('drive','varchar',50);
        $x = $t->save();

        if($x === true){

            echo 'done';
        }
        else{
            echo $x;
        }


        break;


    case 'test2':


        if(db_table_exist('crm_accounts')){
            echo 'exist';
        }


        break;


    case 'test3':

        $max = collect([['foo' => 10], ['foo' => 20]])->max('foo');

        echo $max;

        break;


    case 'u':

        addPermission('Documents','documents');
        addPermission('HRM','hrm');
        addPermission('Drive','drive');
        addPermission('SMS','sms');
        addPermission('Support','support');
        addPermission('Knowledgebase','knowledgebase');
        addPermission('Suppliers','suppliers');
        addPermission('Purchase','purchase');
//        addPermission('','');

        break;


    case 't':

        $l = 'e74738ed99fc6dc5444e73c5eb1cb677';
        $l = strtoupper($l);
        $l = implode('-', str_split($l, 4));

        echo $l;


        break;

    case 'view':



        view('dev',[

        ]);

        break;



    case 'c':


        // load language file

        $lan = 'ro';

        $_L = null;

        require 'system/i18n/'.$lan.'.php';

        foreach ($_L as $k => $v){
            echo $v.'
';
        }





        break;

    case 'l':

        $s = md5('http://46.101.144.49/celcomtrack2018'.'?ng=');

        echo $s;


        break;

    case 'translate':

        clxPerformLongProcess();



        $lan = 'zh';

        $_L = null;

        $_L = [

            'New Contact Added' => 'New Contact Added',
            'Contact Deleted Successfully' => 'Contact Deleted Successfully',
            'Invoice Deleted Successfully' => 'Invoice Deleted Successfully',
            'Tag Deleted Successfully' => 'Tag Deleted Successfully',
            'TAX Deleted Successfully' => 'TAX Deleted Successfully',
            'Login Successful' => 'Login Successful',
            'Invalid Username or Password' => 'Invalid Username or Password',
            'Failed Login' => 'Failed Login',
            'Check your email to reset Password' => 'Check your email to reset Password',
            'User Not Found' => 'User Not Found',
            'Invalid Password Reset Key' => 'Invalid Password Reset Key',
            'Activity' => 'Activity',
            'Summary' => 'Summary',
            'Custom Contact Fields' => 'Custom Contact Fields',
            'Account Title' => 'Account Title',
            'Initial Balance' => 'Initial Balance',
            'Financial Balances' => 'Financial Balances',
            'More' => 'More',
            'Contact Notes' => 'Contact Notes',
            'Save' => 'Save',
            'Create Recurring Invoice' => 'Create Recurring Invoice',
            'Create New Invoice' => 'Create New Invoice',
            'Customer' => 'Customer',
            'Select Contact' => 'Select Contact',
            'Or Add New Customer' => 'Or Add New Customer',
            'Invoice Prefix' => 'Invoice Prefix',
            'Repeat Every' => 'Repeat Every',
            'Week' => 'Week',
            'Weeks_2' => '2 Weeks',
            'Month' => 'Month',
            'Months_2' => '2 Months',
            'Months_3' => '3 Months',
            'Months_6' => '6 Months',
            'Year' => 'Year',
            'Years_2' => '2 Years',
            'Years_3' => '3 Years',
            'Invoice Date' => 'Invoice Date',
            'Payment Terms' => 'Payment Terms',
            'Due On Receipt' => 'Due On Receipt',
            'days_3' => '+3 days',
            'days_5' => '+5 days',
            'days_7' => '+7 days',
            'days_10' => '+10 days',
            'days_15' => '+15 days',
            'days_30' => '+30 days',
            'days_45' => '+45 days',
            'days_60' => '+60 days',
            'Sales TAX' => 'Sales TAX',
            'None' => 'None',
            'Discount' => 'Discount',
            'Set Discount' => 'Set Discount',
            'Item Code' => 'Item Code',
            'Item Name' => 'Item Name',
            'Qty' => 'Qty',
            'Price' => 'Price',
            'Add blank Line' => 'Add blank Line',
            'Add Product OR Service' => 'Add Product OR Service',
            'Invoice Terms' => 'Invoice Terms',
            'Save Invoice' => 'Save Invoice',
            'Sub Total' => 'Sub Total',
            'TAX' => 'TAX',
            'TOTAL' => 'TOTAL',
            'Due Date' => 'Due Date',
            'List Products' => 'List Products',
            'List Services' => 'List Services',
            'Sales Price' => 'Sales Price',
            'Item Number' => 'Item Number',
            'Add TAX' => 'Add TAX',
            'Rate' => 'Rate',
            'Back To The List' => 'Back To The List',
            'Add Activity' => 'Add Activity',
            'Post' => 'Post',
            'Account Name' => 'Account Name',
            'Subject' => 'Subject',
            'Send' => 'Send',
            'Onetime' => 'Onetime',
            'Unpaid' => 'Unpaid',
            'Paid' => 'Paid',
            'Cancelled' => 'Cancelled',
            'Manage Recurring Invoices' => 'Manage Recurring Invoices',
            'Add Invoice' => 'Add Invoice',
            'Upload Picture' => 'Upload Picture',
            'Use Gravatar' => 'Use Gravatar',
            'No Image' => 'No Image',
            'Picture' => 'Picture',
            'Facebook Profile' => 'Facebook Profile',
            'Google Plus Profile' => 'Google Plus Profile',
            'Linkedin Profile' => 'Linkedin Profile',
            'Accounting Summary' => 'Accounting Summary',
            'Add Custom Field' => 'Add Custom Field',
            'Field Name' => 'Field Name',
            'Field Type' => 'Field Type',
            'Text Box' => 'Text Box',
            'Drop Down' => 'Drop Down',
            'Text Area' => 'Text Area',
            'Optional Description help' => 'Optional Description, will be shown as help block',
            'Regular Expression Validation' => 'Regular Expression Validation String',
            'Comma Separated List' => 'Comma Separated  List for Dropdowns Only',
            'Show in View Invoice' => 'Show in View Invoice?',
            'Yes' => 'Yes',
            'No' => 'No',
            'Validation' => 'Validation',
            'Select Options' => 'Select Options',
            'Edit Custom Field' => 'Edit Custom Field',
            'Application Name' => 'Application Name/ Company Name',
            'This Name will be' => 'This Name will be shown on the Title, Copyright etc.',
            'Theme' => 'Theme',
            'Style' => 'Style',
            'Pay To Address' => 'Pay To Address',
            'You can use html tag' => 'You can use html tag',
            'Invoice Starting' => 'Invoice Starting',
            'Enter to set the next invoice' => 'Enter to set the next invoice number, must be greater than Current auto increment value',
            'Keep Blank for' => 'Keep Blank for no change',
            'This will replace existing logo' => 'This will replace existing logo. You may also change logo by replacing file',
            'User Interface' => 'User Interface',
            'Enable Page Loading Animation' => 'Enable Page Loading Animation?',
            'Enable RTL' => 'Enable RTL?',
            'Logo' => 'Logo',
            'Automation' => 'Automation',
            'Security Token' => 'Security Token',
            'Re Generate Key' => 'Re Generate Key',
            'to_enable_automation' => 'To enable the automation features to run, make sure you set up a cron job to run once per day. (e.g. 9AM).',
            'Create the following Cron Job using GET' => 'Create the following Cron Job using GET:',
            'Or' => 'Or',
            'Create the following Cron Job using PHP' => 'Create the following Cron Job using PHP:',
            'Create the following Cron Job using WGET' => 'Create the following Cron Job using WGET:',
            'Generate Daily Accounting Snapshot' => 'Generate Daily Accounting Snapshot',
            'Generate Recurring Invoices' => 'Generate Recurring Invoices',
            'Enable Email Notifications' => 'Enable Email Notifications',
            'Save Changes' => 'Save Changes',
            'Edit Categories' => 'Edit Categories',
            'Deleting Categories will' => 'Deleting Categories will rename all transactions under this category to Uncategorized',
            'Current Password' => 'Current Password',
            'New Password' => 'New Password',
            'Confirm New Password' => 'Confirm New Password',
            'INVOICE' => 'INVOICE',
            'Total Amount' => 'Total Amount',
            'Invoiced To' => 'Invoiced To',
            'Item' => 'Item',
            'Quantity' => 'Quantity',
            'Related Transactions' => 'Related Transactions',
            'Download PDF' => 'Download PDF',
            'Printable Version' => 'Printable Version',
            'Amount Due' => 'Amount Due',
            'Pay Now' => 'Pay Now',
            'Add Deposit' => 'Add Deposit',
            'Choose an' => 'Choose an',
            'Advanced' => 'Advanced',
            'Choose Contact' => 'Choose Contact',
            'Select Payment Method' => 'Select Payment Method',
            'ref_example' => 'e.g. Transaction ID, Check No.',
            'Recent Deposits' => 'Recent Deposits',
            'Custom Fields' => 'Custom Fields',
            'Custom Fields Not Available' => 'Custom Fields Not Available',
            'Total Database Size' => 'Total Database Size',
            'Download Database Backup' => 'Download Database Backup',
            'Table Name' => 'Table Name',
            'Rows' => 'Rows',
            'Size' => 'Size',
            'Edit TAX' => 'Edit TAX',
            'Active' => 'Active',
            'Inactive' => 'Inactive',
            'Send Email Using' => 'Send Email Using',
            'PHP mail Function' => 'PHP mail() Function',
            'SMTP' => 'SMTP',
            'System Email' => 'System Email',
            'All Outgoing Email Will' => 'All Outgoing Email Will be sent from This Email Address.',
            'SMTP Host' => 'SMTP Host',
            'SMTP Username' => 'SMTP Username',
            'SMTP Password' => 'SMTP Password',
            'SMTP Port' => 'SMTP Port',
            'SMTP Secure' => 'SMTP Secure',
            'TLS' => 'TLS',
            'SSL' => 'SSL',
            'Add Expense' => 'Add Expense',
            'Choose an Account' => 'Choose an Account',
            'Recent Expense' => 'Recent Expense',
            'Manage Categories' => 'Manage Categories',
            'drag_n_drop_help' => 'Drag & drop the Items below for Repositioning. Click to Edit.',
            'Reset Password' => 'Reset Password',
            'Back To Login' => 'Back To Login',
            'Email Address' => 'Email Address',
            'Related Emails' => 'Related Emails',
            'Invoice' => 'Invoice',
            'Send Email' => 'Send Email',
            'Invoice Created' => 'Invoice Created',
            'Invoice Payment Reminder' => 'Invoice Payment Reminder',
            'Invoice Overdue Notice' => 'Invoice Overdue Notice',
            'Invoice Payment Confirmation' => 'Invoice Payment Confirmation',
            'Invoice Refund Confirmation' => 'Invoice Refund Confirmation',
            'Mark As' => 'Mark As',
            'Partially Paid' => 'Partially Paid',
            'Add Payment' => 'Add Payment',
            'Preview' => 'Preview',
            'PDF' => 'PDF',
            'View PDF' => 'View PDF',
            'Print' => 'Print',
            'Subtotal' => 'Subtotal',
            'Grand Total' => 'Grand Total',
            'Search by Name' => 'Search by Name',
            'Search' => 'Search',
            'Add New Contact' => 'Add New Contact',
            'Filter by Tags' => 'Filter by Tags',
            'n_a' => 'n/a',
            'Records' => 'Records',
            'List Invoices' => 'List Invoices',
            'Add Recurring Invoice' => 'Add Recurring Invoice',
            'Due' => 'Due',
            'Next Invoice' => 'Next Invoice',
            'Stop Recurring' => 'Stop Recurring',
            'Add Tax' => 'Add Tax',
            'Tax Rate' => 'Tax Rate',
            'Default Country' => 'Default Country',
            'Date Format' => 'Date Format',
            'Currency Format' => 'Currency Format',
            'Currency Code' => 'Currency Code',
            'Keep it blank if currency code' => 'Keep it blank if you do not want to show currency code',
            'Charset n Collation' => 'Charset & Collation',
            'Set Charset n Collation' => 'Set Charset & Collation For Database Tables',
            'Sign in' => 'Sign in',
            'Forgot password' => 'Forgot password ?',
            'Edit Transaction' => 'Edit Transaction',
            'Add User' => 'Add User',
            'Access Level' => 'Access Level',
            'Full Access' => 'Full Access',
            'Loading Users' => 'Loading Users',
            'Add Payee' => 'Add Payee',
            'Manage Payees' => 'Manage Payees',
            'Edit Payee' => 'Edit Payee',
            'Edit Payer' => 'Edit Payer',
            'Add Payer' => 'Add Payer',
            'Manage Payers' => 'Manage Payers',
            'Reorder Payment Gateways' => 'Reorder Payment Gateways Position',
            'Gateway Name' => 'Gateway Name',
            'Setting Name' => 'Setting Name',
            'Value' => 'Value',
            'Reorder' => 'Reorder',
            'Positions' => 'Positions',
            'Settings Name' => 'Settings Name',
            'Custom Param 1' => 'Custom Param 1',
            'Conversion Rate' => 'Conversion Rate',
            'Custom Param 2' => 'Custom Param 2',
            'Custom Param 3' => 'Custom Param 3',
            'Custom Param 4' => 'Custom Param 4',
            'Custom Param 5' => 'Custom Param 5',
            'Add Payment Methods' => 'Add Payment Methods',
            'Manage Payment Methods' => 'Manage Payment Methods',
            'Edit Payment Methods' => 'Edit Payment Methods',
            'Click Here to Print' => 'Click Here to Print',
            'Add Product' => 'Add Product',
            'Add Service' => 'Add Service',
            'List' => 'List',
            'Expense Summary' => 'Expense Summary',
            'Total Expense This Month' => 'Total Expense This Month',
            'Total Expense This Week' => 'Total Expense This Week',
            'Total Expense Last 30 days' => 'Total Expense Last 30 days',
            'Last 20 deposit Expense' => 'Last 20 deposit/ Expense',
            'Dr.' => 'Dr.',
            'Monthly Expense Graph' => 'Monthly Expense Graph',
            'Income Summary' => 'Income Summary',
            'Total Income This Month' => 'Total Income This Month',
            'Total Income This Week' => 'Total Income This Week',
            'Total Income Last 30 days' => 'Total Income Last 30 days',
            'Last 20 deposit Income' => 'Last 20 deposit/ Income',
            'Monthly Income Graph' => 'Monthly Income Graph',
            'Reports Income Vs Expense' => 'Reports- Income Vs Expense',
            'Income minus Expense' => 'Income - Expense',
            'Income Vs Expense This Year' => 'Income Vs Expense This Year',
            'View Statement' => 'View Statement',
            'From Date' => 'From Date',
            'To Date' => 'To Date',
            'Export for Print' => 'Export for Print',
            'Export to PDF' => 'Export to PDF',
            'Tag' => 'Tag',
            'New Transfer' => 'New Transfer',
            'Recent Transfers' => 'Recent Transfers',
            'Add New User' => 'Add New User',
            'User' => 'User',
            'Full Administrator' => 'Full Administrator',
            'Choose User Type' => 'Choose User Type Employee to disable Settings access',
            'Confirm Password' => 'Confirm Password',
            'Edit User' => 'Edit User',
            'Clear Old Data' => 'Clear Old Data',
            'UID' => 'UID',
            'IP' => 'IP',
            'ID' => 'ID',
            'Total Email Sent' => 'Total Email Sent',
            'Sent To' => 'Sent To',
            'Back To Emails' => 'Back To Emails',
            'Settings Saved Successfully' => 'Settings Saved Successfully',
            'New Goal has been set' => 'New Goal has been set',
            'Choose the Traget Account' => 'Please choose the Traget Account',
            'See All Activity' => 'See All Activity',
            'Item Added Successfully' => 'Item Added Successfully',
            'Password changed successfully' => 'Password changed successfully, Please login again',
            'Data Updated' => 'Data Updated!',
            'Transaction Added Successfully' => 'Transaction Added Successfully',
            'Invalid Number' => 'Invalid Number',
            'Logs has been deleted' => 'Logs older than 30 days has been deleted',
            'Password Reset Key Expired' => 'Password Reset Key Expired',
            'Payment Cancelled' => 'Payment Cancelled',
            'Custom Field Deleted Successfully' => 'Custom Field Deleted Successfully',
            'Plugin Not Found' => 'Plugin Not Found',
            'You do not have permission' => 'You do not have permission to access this page',
            'disabled_in_demo' => 'This Option is disabled in the Demo Mode',
            'All Fields are Required' => 'All Fields are Required',
            'Invalid System Email' => 'Invalid System Email',
            'smtp_fields_error' => 'SMTP Username, Password and Port is required',
            'Charset Saved Successfully' => 'Charset Saved Successfully',
            'password_length_error' => 'New Password must be 6 to 14 character',
            'Both Password should be same' => 'Both Password should be same',
            'Incorrect Current Password' => 'Incorrect Current Password',
            'Invalid Logo File' => 'Invalid Logo File',
            'Invalid TAX Rate' => 'Invalid TAX Rate',
            'New TAX Added' => 'New TAX Added',
            'TAX Not Found' => 'TAX Not Found',
            'cron_new_key' => 'New Key Generated. Please Make Sure to Update The CRON Jobs.',
            'cron_notification' => 'Please Use a valid Email Address to enable Notification',
            'Select' => 'Select',
            'Close' => 'Close',
            'Update' => 'Update',
            'OK' => 'OK',
            'Terms' => 'Terms',
            'PDF Font' => 'PDF Font',
            'pdf_font_help_default' => 'Default [Faster PDF Creation with Less Memory]',
            'pdf_font_help_helvetica' => 'Helvetica',
            'pdf_font_help_dejavusanscondensed' => 'dejavusanscondensed [Embed fonts with supports UTF8]',
            'Invoice Total' => 'Invoice Total',
            'Total Paid' => 'Total Paid',
            'Unique Invoice URL' => 'Unique Invoice URL',
            'Company Name' => 'Company Name',
            'ATTN' => 'ATTN',
            'Payment Successful' => 'Payment Successful',
            'Plugins' => 'Plugins',
            'Installing Plugin' => 'Installing Plugin',
            'Uninstalling Plugin' => 'Uninstalling Plugin',
            'Activating Plugin' => 'Activating Plugin',
            'Deactivating Plugin' => 'Deactivating Plugin',
            'Deleting Plugin' => 'Deleting Plugin',
            'Upload Plugin' => 'Upload Plugin',
            'Unzipping' => 'Unzipping',
            'Plugin Added' => 'Plugin Added',
            'No Plugins Available' => 'No Plugins Available',
            'Quotes' => 'Quotes',
            'Quote' => 'Quote',
            'Choose Features' => 'Choose Features',
            'Accounting' => 'Accounting',
            'Invoicing' => 'Invoicing',
            'Enable Client Dashboard' => 'Enable Client Dashboard / Portal',
            'quote_alias' => 'Create New Quote / Proposal / Estimate',
            'Date Created' => 'Date Created',
            'Expiry Date' => 'Expiry Date',
            'Stage' => 'Stage',
            'Draft' => 'Draft',
            'Delivered' => 'Delivered',
            'Accepted' => 'Accepted',
            'On Hold' => 'On Hold',
            'Lost' => 'Lost',
            'Dead' => 'Dead',
            'Reports by Category' => 'Reports by Category',
            'January' => 'January',
            'February' => 'February',
            'March' => 'March',
            'April' => 'April',
            'May' => 'May',
            'June' => 'June',
            'July' => 'July',
            'August' => 'August',
            'September' => 'September',
            'October' => 'October',
            'November' => 'November',
            'December' => 'December',
            'Discount Type' => 'Discount Type',
            'Percentage' => 'Percentage',
            'Fixed Amount' => 'Fixed Amount',
            'Page' => 'Page',
            'of' => 'of',
            'Loading' => 'Loading',
            'Payment' => 'Payment',
            'Recipient' => 'Recipient',
            'Proposal Text' => 'Proposal Text',
            'quote_help_top' => 'Displayed at the Top of the Quote',
            'quote_help_footer' => 'Displayed as a Footer to the Quote',
            'Customer Notes' => 'Customer Notes',
            'Save n Close' => 'Save & Close',
            'Quote Created' => 'Quote Created',
            'Convert to Invoice' => 'Convert to Invoice',
            'Quote Prefix' => 'Quote Prefix',
            'quote_number_help' => 'Keep it Blank to Generate Quote Number Automatically',
            'invoice_number_help' => 'Keep it Blank to Generate Invoice Number Automatically',
            'Public Key' => 'Public Key',
            'Private Key' => 'Private Key',
            'Default Account' => 'Default Account',
            'live or sandbox' => 'live or sandbox',
            'plugin_drop_help' => 'Drop Plugin here or click to upload',
            'plugin_upload_help' => '(Upload Plugin zip file)',
            'Admin' => 'Admin',
            'Message Body' => 'Message Body',
            'Invoice:Invoice Created' => 'Invoice - Invoice Created',
            'Admin:Password Change Request' => 'Admin - Password Change Request',
            'Admin:New Password' => 'Admin - New Password',
            'Invoice:Invoice Payment Reminder' => 'Invoice - Invoice Payment Reminder',
            'Invoice:Invoice Overdue Notice' => 'Invoice - Invoice Overdue Notice',
            'Invoice:Invoice Payment Confirmation' => 'Invoice - Invoice Payment Confirmation',
            'Invoice:Invoice Refund Confirmation' => 'Invoice - Invoice Refund Confirmation',
            'Quote:Quote Created' => 'Quote - Quote Created',
            'Send Notifications To' => 'Send Notifications To',
            'No results found' => 'No results found',
            'Quote Deleted Successfully' => 'Quote Deleted Successfully',
            'Create New Quote' => 'Create New Quote',
            'notice_email_as_username' => 'Please use a valid Email address as Username',
            'API' => 'API',
            'API Access' => 'API Access',
            'Add API Access' => 'Add API Access',
            'Label' => 'Label',
            'API Key' => 'API Key',
            'Regenerate' => 'Regenerate',
            'Application URL' => 'Application URL',
            'API Access Added' => 'API Access Added',
            'select_a_contact' => 'Please select a Contact',
            'at_least_one_item_required' => 'At least one item is required',
            'Subject is Required' => 'Subject is Required',
            'Unique Quote URL' => 'Unique Quote URL',
            'Default Invoice Terms' => 'Default Invoice Terms',
            'Additional Settings' => 'Additional Settings',
            'cron_invoice_created' => 'Automatically email recurring invoices',
            'Invoice Creation Method' => 'Invoice Creation Method',
            'Default' => 'Default',
            'V2' => 'V2',
            'CRON Log' => 'CRON Log',
            'Message' => 'Message',
            'Recent Invoices' => 'Recent Invoices',
            'About' => 'About',
            'Or Install from URL' => 'Or Install from URL',
            'Fold Sidebar Default' => 'Fold Sidebar by Default ?',
            'Hide Footer Copyright' => 'Hide Footer Copyright ?',
            'Filter' => 'Filter',
            'Back' => 'Back',
            'Account Number' => 'Account Number',
            'Contact Person' => 'Contact Person',
            'Internet Banking URL' => 'Internet Banking URL',
            'Cc' => 'Cc',
            'Bcc' => 'Bcc',
            'Mode' => 'Mode',
            'Live' => 'Live',
            'Sandbox' => 'Sandbox',
            'Drop CSV File Here' => 'Drop CSV File Here',
            'Or Click to Upload' => 'Or Click to Upload',
            'Importing' => 'Importing',
            'Import Contacts' => 'Import Contacts',
            'Download Sample File' => 'Download Sample File',
            'Group' => 'Group',
            'Groups' => 'Groups',
            'Add New Group' => 'Add New Group',
            'Group Name' => 'Group Name',
            'Group Deleted Successfully' => 'Group Deleted Successfully',
            'Welcome Email' => 'Welcome Email',
            'Client:Client Signup Email' => 'Client Signup Email',
            'Send Client Signup Email' => 'Set Yes to send Client Signup Email.',
            'Profile' => 'Profile',
            'Download' => 'Download',
            'Legacy' => 'Legacy',
            'New' => 'New',
            'Default Landing Page' => 'Default Landing Page',
            'Admin Login' => 'Admin Login',
            'Client Login' => 'Client Login',
            'Recent Quotes' => 'Recent Quotes',
            'Recent Transactions' => 'Recent Transactions',
            'URL Rewrite' => 'URL Rewrite',
            'Currency Symbol' => 'Currency Symbol',
            'Home Currency' => 'Home Currency',
            'Currency Symbol Position' => 'Currency Symbol Position',
            'Left' => 'Left',
            'Right' => 'Right',
            'Currency Decimal Digits' => 'Currency Decimal Digits',
            'Thousand Separator Placement' => 'Thousand Separator Placement',
            'Or Cancel' => 'Or Cancel',
            'Send Bcc to Admin' => 'Send Bcc to Admin? Click Here.',
            'Attach PDF' => 'Attach PDF?',
            'Cash Flow' => 'Cash Flow',
            'Jan' => 'Jan',
            'Feb' => 'Feb',
            'Mar' => 'Mar',
            'Apr' => 'Apr',
            'Jun' => 'Jun',
            'Jul' => 'Jul',
            'Aug' => 'Aug',
            'Sep' => 'Sep',
            'Oct' => 'Oct',
            'Nov' => 'Nov',
            'Dec' => 'Dec',
            'Last 12 Months' => 'Last 12 Months',
            'Data View' => 'Data View',
            'Refresh' => 'Refresh',
            'Reset' => 'Reset',
            'Save as Image' => 'Save as Image',
            'Click to Save' => 'Click to Save',
            'Average' => 'Average',
            'Line' => 'Line',
            'Bar' => 'Bar',
            'Net Worth' => 'Net Worth',
            'Check for Update' => 'Check for Update',
            'Response' => 'Response',
            'Site Key' => 'Site Key',
            'Secret Key' => 'Secret Key',
            'Enable Recaptcha' => 'Enable reCAPTCHA',
            'Recaptcha' => 'reCAPTCHA',
            'Recaptcha Verification Failed' => 'Please verify that you are not a robot.',
            'Client Portal Custom Scripts' => 'Client Portal Custom Scripts',
            'Header Scripts' => 'Header Scripts',
            'Footer Scripts' => 'Footer Scripts',
            'Received' => 'Received',
            'System Status' => 'System Status',
            'Application Environment' => 'Application Environment',
            'Server Environment' => 'Server Environment',
            'Integration Code' => 'Integration Code',
            'Client Registration' => 'Client Registration',
            'Register' => 'Register',
            'Notes' => 'Notes',
            'Quick Notes' => 'Quick Notes',
            'Whats on your mind' => 'What\'s on your mind?',
            'Team' => 'Team',
            'Last Activity' => 'Last Activity',
            'Content Animation' => 'Content Animation',
            'Appearance' => 'Appearance',
            'Customize' => 'Customize',
            'Editor' => 'Editor',
            'Language Editor' => 'Language Editor',
            'Themes' => 'Themes',
            'Select File to Edit' => 'Select File to Edit',
            'File' => 'File',
            'Language File' => 'Language File',
            'Invoice Layout Print' => 'Invoice Layout: Print',
            'Invoice Layout PDF' => 'Invoice Layout: PDF',
            'Please Choose a File' => 'Please Choose a File',
            'Profit' => 'Profit',
            'Loss' => 'Loss',
            'Revenue' => 'Revenue',
            'Outstanding' => 'Outstanding',
            'Payments' => 'Payments',
            'Transaction ID' => 'Transaction ID',
            'Customers' => 'Customers',
            'Companies' => 'Companies',
            'Currencies' => 'Currencies',
            'Permission' => 'Permission',
            'Staff' => 'Staff',
            'Roles' => 'Roles',
            'New Role' => 'New Role',
            'Role name is required' => 'Role name is required',
            'Tasks' => 'Tasks',
            'Calendar' => 'Calendar',
            'Leads' => 'Leads',
            'Orders' => 'Orders',
            'Currency' => 'Currency',
            'New Currency' => 'New Currency',
            'Base Conversion Rate' => 'Base Conversion Rate',
            'Currency Example' => 'Currency ISO Code, eg. USD, GBP, INR etc...',
            'Make Base Currency' => 'Make Base Currency',
            'Base Currency' => 'Base Currency',
            'New Company' => 'New Company',
            'URL' => 'URL',
            'Logo URL' => 'Logo URL',
            'Company Name is required' => 'Company Name is required.',
            'Event Name' => 'Event Name',
            'Priority' => 'Priority',
            'Owner' => 'Owner',
            'Start Date' => 'Start Date',
            'End Date' => 'End Date',
            'Start Time' => 'Start Time',
            'End Time' => 'End Time',
            'All day event' => 'All day event',
            'Related Contacts' => 'Related Contacts',
            'Add Event' => 'Add Event',
            'Color' => 'Color',
            'Image' => 'Image',
            'Create' => 'Create',
            'Avatar' => 'Avatar',
            'Attach File' => 'Attach File',
            'Drop File Here' => 'Drop File Here',
            'Click to Upload' => 'Or Click to Upload',
            'Import' => 'Import',
            'Export' => 'Export',
            'Phone number already exist' => 'Phone number already exist.',
            'Favicon' => 'Favicon',
            'Upload' => 'Upload',
            'Remember me' => 'Keep me signed in',
            'Accept' => 'Accept',
            'Decline' => 'Decline',
            'Terminal' => 'Terminal',
            'Customers View Mode' => 'Customers View Mode',
            'Table' => 'Table',
            'Card' => 'Card',
            'Your last login was' => 'Your last login was',
            'Documents' => 'Documents',
            'List All Orders' => 'List All Orders',
            'Add New Order' => 'Add New Order',
            'Order' => 'Order',
            'Product_Service' => 'Product/Service',
            'Billing Cycle' => 'Billing Cycle',
            'Free' => 'Free',
            'One Time' => 'One Time',
            'Semi-Annually' => 'Semi-Annually',
            'Annually' => 'Annually',
            'Biennially' => 'Biennially',
            'Triennially' => 'Triennially',
            'Pending' => 'Pending',
            'Generate Invoice' => 'Generate Invoice',
            'Item Not Found' => 'Item Not Found',
            'Available Module for this Order' => 'Available Module for this Order',
            'Order Number' => 'Order Number',
            'New Document' => 'New Document',
            'Title' => 'Title',
            'Server Config' => 'Server Config',
            'Upload Maximum Size' => 'Upload Maximum Size',
            'POST Maximum Size' => 'POST Maximum Size',
            'Uploaded Successfully' => 'Uploaded Successfully',
            'Secure Download Link' => 'Secure Download Link',
            'Files' => 'Files',
            'Assign File' => 'Assign File',
            'Activation Message' => 'Activation Message',
            'Email Sent' => 'Email Sent',
            'Downloads' => 'Downloads',
            'Create Auto Login URL' => 'Create Auto Login URL',
            'Created Successfully' => 'Created Successfully',
            'Auto Login URL' => 'Auto Login URL',
            'Login As Customer' => 'Login As Customer',
            'Revoke Auto Login' => 'Revoke Auto Login',
            'Re Generate URL' => 'Re Generate URL',
            'Contact' => 'Contact',
            'All' => 'All',
            'Date Range' => 'Date Range',
            'Available for all Customers' => 'Available for all Customers',
            'Proof Of Payment' => 'Proof Of Payment',
            'My Orders' => 'My Orders',
            'Place New Order' => 'Place New Order',
            'Cost Price' => 'Cost Price',
            'Inventory To Add Subtract' => 'Inventory To Add/Subtract',
            'Unit' => 'Unit',
            'Units' => 'Units',
            'Units of measurement' => 'Units of measurement',
            'Create New' => 'Create New',
            'Reference' => 'Reference',
            'Conversion Factor' => 'Conversion Factor',
            'SKU' => 'SKU',
            'Weight' => 'Weight',
            'Show quantity as' => 'Show quantity as',
            'New Lead' => 'New Lead',
            'Import Leads' => 'Import Leads',
            'Source' => 'Source',
            'Salutation' => 'Salutation',
            'First Name' => 'First Name',
            'Middle Name' => 'Middle Name',
            'Last Name' => 'Last Name',
            'Industry' => 'Industry',
            'No. of Employees' => 'No. of Employees',
            'Public' => 'Public',
            'Company' => 'Company',
            'Street' => 'Street',
            'Memo' => 'Memo',
            'Convert to Customer' => 'Convert to Customer',
            'Buy Now' => 'Buy Now',
            'Store' => 'Store',
            'Add to Cart' => 'Add to Cart',
            'Copy' => 'Copy',
            'Unknown' => 'Unknown',
            'Access Log' => 'Access Log',
            'Browser' => 'Browser',
            'Time' => 'Time',
            'Invoice Access Log' => 'Invoice Access Log',
            'Clone' => 'Clone',
            'Cloned successfully' => 'Cloned successfully',
            'Media' => 'Media',
            'Inventory' => 'Inventory',
            'Available' => 'Available',
            'Published' => 'Published',
            'No Data Available' => 'No Data Available',
            'Send SMS' => 'Send SMS',
            'Call' => 'Call',
            'Saved Successfully' => 'Saved Successfully',
            'System' => 'System',
            'Custom' => 'Custom',
            'Choose from Template' => 'Choose from Template',
            'Add New Template' => 'Add New Template',
            'Assign to Group' => 'Assign to Group',
            'Select Group' => 'Select Group',
            'Empty' => 'Empty',
            'Related To' => 'Related To',
            'Add New' => 'Add New',
            'Add Fund' => 'Add Fund',
            'Back to Client Area' => 'Back to Client Area',
            'Manual Credit' => 'Manual Credit',
            'Log' => 'Log',
            'Client' => 'Client',
            'All Data' => 'All Data',
            'Sales target' => 'Sales target',
            'Invoice issued' => 'Invoice issued',
            'Currency Exchange' => 'Currency Exchange',
            'Select Currency' => 'Select Currency',
            'POS' => 'POS',
            'Paying as' => 'Paying as',
            'Total Invoice Amount' => 'Total Invoice Amount',
            'Total Paid Amount' => 'Total Paid Amount',
            'Total Un Paid Amount' => 'Total Un Paid Amount',
            'Purchase' => 'Purchase',
            'Purchase Orders' => 'Purchase Orders',
            'Create Purchase Order' => 'Create Purchase Order',
            'Items' => 'Items',
            'Projects' => 'Projects',
            'Suppliers' => 'Suppliers',
            'Support' => 'Support',
            'HRM' => 'HRM',
            'Warehouse' => 'Warehouse',
            'Maximum' => 'Maximum',
            'Minimum' => 'Minimum',
            'Barcode' => 'Barcode',
            'Total Item' => 'Total Item',
            'Add Item' => 'Add Item',
            'Item Sold' => 'Item Sold',
            'Total Invoice' => 'Total Invoice',
            'Sales Count' => 'Sales Count',
            'Expense by Category' => 'Expense by Category',
            'Total Invoice Paid' => 'Total Invoice Paid',
            'View Reports' => 'View Reports',
            'Add Supplier' => 'Add Supplier',
            'List Suppliers' => 'List Suppliers',
            'Receipt' => 'Receipt',
            'Invoices Vs Expense' => 'Invoices Vs Expense',
            'Open New Ticket' => 'Open New Ticket',
            'Tickets' => 'Tickets',
            'Predefined Replies' => 'Predefined Replies',
            'Departments' => 'Departments',
            'Open Ticket' => 'Open Ticket',
            'Department' => 'Department',
            'Knowledgebase' => 'Knowledgebase',
            'New Article' => 'New Article',
            'All Articles' => 'All Articles',
            'New Purchase Order' => 'New Purchase Order',
            'Expense Types' => 'Expense Types',
            'Receipt Number' => 'Receipt Number',
            'Supplier' => 'Supplier',
            'Tools' => 'Tools',
            'Make Payment' => 'Make Payment',
            'Fax' => 'Fax',
            'Business Number' => 'Business Number',
            'Issued at' => 'Issued at',
            'Make Default' => 'Default',
            'SMS' => 'SMS',
            'Send Single SMS' => 'Send Single SMS',
            'Send Bulk SMS' => 'Send Bulk SMS',
            'Inbox' => 'Inbox',
            'Sent' => 'Sent',
            'SMS Templates' => 'SMS Templates',
            'Notifications' => 'Notifications',
            'SMS Drivers' => 'SMS Drivers',
            'Quote Accepted' => 'Quote Accepted',
            'Quote Cancelled' => 'Quote Cancelled',
            'Profile Picture' => 'Profile Picture',
            'Show Watermark' => 'Show Watermark',
            'already exist' => 'already exist',
            'Show Country Flag' => 'Show Country Flag ?',
            'Password Manager' => 'Password Manager',
            'New Entry' => 'New Entry',
            'Tax' => 'Tax',
            'Credit Card Information' => 'Credit Card Information',

            'Daily' => 'Daily',
            'Weeks_3' => '3 Weeks',
            'Weeks_4' => '4 Weeks',

            'optional' => 'optional',

            'Dont have an account' => 'Don\'t have an account?',
            'Already registered' => 'Already Registered?',

        ];

       // require 'system/i18n/en.php';

        $tr = new TranslateClient('en', $lan);

        foreach ($_L as $k => $v){


            $r = $tr->translate($v);

            echo '\''.$k.'\''.' => '.'\''.$r.'\''.',
';
        }


        break;


    case 'test33':

        $message = '';

        $categories = TransactionCategory::where('type','Income')->get();

        foreach ($categories as $category){

            $total = categoryCalculateTotalByName($category->name,'Income');
            $category->total_amount = $total;
            $category->save();

            $message .= 'Category Balance Updated: '.$category->name.' -'.$total.PHP_EOL;

        }


        $categories = TransactionCategory::where('type','Expense')->get();

        foreach ($categories as $category){

            $total = categoryCalculateTotalByName($category->name,'Expense');
            $category->total_amount = $total;
            $category->save();

            $message .= 'Category Balance Updated: '.$category->name.' -'.$total.PHP_EOL;

        }

        echo $message;



        break;


    case 'test4':

        foreach ($config as $k=>$v){
            echo "'$k'".' '.'=> '."'$v'".','.PHP_EOL;
        }


        break;


    case 'tr2':

        $xs = require 'system/i18n/cs.php';

        echo '<?php
        
$_L = [
';
        foreach ($_L as $k=>$v){
            echo '\''.$k.'\' => \''.$v.'\','.PHP_EOL;
        }

        echo '
        ];';

        break;


    case 'test5':

        $_L = null;

        require 'system/i18n/en.php';
        $x = $_L;
        require 'system/i18n/th.php';

        $_L =  $_L + $x ;


        var_dump($_L);


        break;

    case 'convert_ibc':

unset($_L);

$_L['Login'] = 'Login';
$_L['Edit'] = 'Bearbeiten';


foreach ($_L as $key => $value)
{
    echo "'$key' => '$value',
";
}

        break;


case 'test6':

  //  slackPost($config,'test');

    break;



}