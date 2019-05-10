<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

session_start();

$app_name = 'CloudOnex Business Suite SaaS';
$app_url = 'www.cloudonex.com';
$release_date = 'May 3, 2019';
$author_name = 'Razib M.';
$support_url = 'https://www.cloudonex.com';

$files_to_rename = [
    'cron_data.sample.php' => 'cron_data.php',
    'email_templates.sample.php' => 'email_templates.php',
    'payment_gateways.sample.php' => 'payment_gateways.php',
    'permissions.sample.php' => 'permissions.php',
    'sms_templates.sample.php' => 'sms_templates.php',
    'social_sign_in.sample.php' => 'social_sign_in.php',
    'transaction_categories.sample.php' => 'transaction_categories.php',
    'transaction_payment_methods.sample.php' => 'transaction_payment_methods.php',
    'workspace_default_settings.sample.php' => 'workspace_default_settings.php',
    'demo_settings.sample.php' => 'demo_settings.php',
];


function inSession($key,$def=''){
    if(isset($_SESSION[$key])){
        return $_SESSION[$key];
    }
    else{
        return $def;
    }
}
