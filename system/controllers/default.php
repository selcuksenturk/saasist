<?php

// If you want to disable the homepage and want to redirect to another page-

// r2('https://www.YOUR-DOMAIN.tld');


view('frontend/index',[
    '_active_menu' => 'Home',
    'page_title' => 'Business Software - Accounting, Inventory, Invoicing & CRM'
]);