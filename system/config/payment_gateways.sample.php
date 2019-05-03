<?php
/*
 * Available default payment gateways,
 * when user sign up, data will be pulled from here to add available payment gateways.
 * Do not put your api key, merchant info here. User will put own merchant info from the admin portal ( Settings > Payment Gatways )
 */
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
        'value' => 'Make a Payment to Our Bank Account <br>Bank Name: City Bank <br>Account Name: CloudOnex <br>Account Number: 1505XXXXXXXX <br>',
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