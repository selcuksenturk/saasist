<?php

if (defined('SAAS_HOMEPAGE')) {
    r2(SAAS_HOMEPAGE);
}

view('frontend/index',[
    '_active_menu' => 'Home',
    'page_title' => 'Business Software - Accounting, Inventory, Invoicing & CRM'
]);