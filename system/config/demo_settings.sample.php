<?php
// In Dev mode when creating demo, data will be pulled from this file.

return [
    'default_country' => 'us',
    'countries' => [

        // USA

        'us' => [
            'company_name' => 'The Acme Inc.',
            'admin_full_name' => 'Richard Williams',
            'faker_locale' => '',
            'currency' => 'USD',
            'customer' => [
                'name' => 'Maria Elizabeth',
                'address' => '28th Floor, 1325 6th Avenue',
                'city' => 'New York',
                'state' => 'NY',
                'zip' => '10019',
                'country' => 'United States',
                'lat' => '40.762901',
                'lon' => '-73.980733',
            ],
            'banks' => [
                [
                    'name' => 'JPMorgan Chase & Co.'
                ],
                [
                    'name' => 'HSBC'
                ],
                [
                    'name' => 'Standard Chartered'
                ]
                ,
                [
                    'name' => 'Cash'
                ]
                ,
                [
                    'name' => 'City Bank'
                ],
            ],
            'incomes' => [
                [

                    'description' => 'Sales',
                    'amount' => 5400

                ],
                [
                    'description' => 'Other Income',
                    'amount' => 1800
                ],
                [
                    'description' => 'Software Development',
                    'amount' => 2500
                ],
                [
                    'description' => 'Web Development',
                    'amount' => 1500
                ],
                [
                    'description' => 'Consultancy',
                    'amount' => 4000
                ],
                [
                    'description' => 'Interest',
                    'amount' => 700
                ]
            ],
        ],

        // Poland

        'pl' => [
            'company_name' => 'Acme S.A.',
            'admin_full_name' => 'Przemysław W',
            'faker_locale' => 'pl_PL',
            'currency' => 'PLN',
            'customer' => [
                'name' => 'Aleksandra Pukianiec',
                'address' => 'Przemyslowa',
                'city' => 'Krakow',
                'state' => 'Krakow',
                'zip' => '30-701',
                'country' => 'Poland',
                'lat' => '50.04691015',
                'lon' => '19.99706376',
            ],
            'banks' => [
                [
                    'name' => 'Bank Pekao'
                ],
                [
                    'name' => 'BZ WBK'
                ],
                [
                    'name' => 'mBank'
                ]
                ,
                [
                    'name' => 'Cash'
                ]
                ,
                [
                    'name' => 'BGZ BNP Paribas'
                ],
            ],

            'incomes' => [
                [

                    'description' => 'Sales',
                    'amount' => 5400

                ],
                [
                    'description' => 'Other Income',
                    'amount' => 1800
                ],
                [
                    'description' => 'Software Development',
                    'amount' => 2500
                ],
                [
                    'description' => 'Web Development',
                    'amount' => 1500
                ],
                [
                    'description' => 'Consultancy',
                    'amount' => 4000
                ],
                [
                    'description' => 'Interest',
                    'amount' => 700
                ]
            ],
        ],

    ]
];

