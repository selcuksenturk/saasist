<?php

/*
|--------------------------------------------------------------------------
| Disable direct access
|--------------------------------------------------------------------------
|
*/

if(!defined('APP_RUN')) exit('No direct access allowed');


/*
|--------------------------------------------------------------------------
| SaaS apllication settings
|--------------------------------------------------------------------------
|
*/

$saas_brand_name = 'StackB';
$saas_landing_page = 'default';
$saas_trial_days = 30;
$saas_monthly_price = 19.00;
$saas_url_re_write = 0;



/*
|--------------------------------------------------------------------------
| Application Build Number to handle cache & updates || Do not edit below
|--------------------------------------------------------------------------
|
*/

$file_build = 293;

$spEntry = 'config';


define('APP_MODE','default');


/*
|--------------------------------------------------------------------------
| Load the config file to connect with database and handle url
|--------------------------------------------------------------------------
|
*/

if (file_exists('system/'.$spEntry.'.php')) {
    require('system/'.$spEntry.'.php');
}  else {

    header('location: install');

    exit;

}

/*
|--------------------------------------------------------------------------
| To load composer autoload
|--------------------------------------------------------------------------
|
*/

require 'vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Start the Application
|--------------------------------------------------------------------------
|
*/

require 'system/helpers/bootstrap.php';