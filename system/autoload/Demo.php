<?php

use Faker\Factory;
use Faker\Provider\DateTime;

Class Demo {

    public static function reset(){

        return true;

    }


    private static function genPhone($country){

        $phone = '';

        $start = array('016','017','018','019');

        if($country == 'bd'){


            $phone = $start[array_rand($start)]._raid(8);

        }

        return $phone;

    }

    private static function genEmail($name){
        $email = '';

        $domain = array('gmail.com','yahoo.com','hotmail.com');

        $name = str_replace(' ','',$name);
        $name = str_replace('Mr','',$name);
        $name = str_replace('Mrs','',$name);
        $name = str_replace('.','',$name);

        $email = $name.'@'.$domain[array_rand($domain)];

        return $email;

    }

    public static function makeReady(){


        $demo_settings = require 'system/config/demo_settings.php';

        $default_country = $demo_settings['default_country'];



        $today = date('Y-m-d');

        $today_time = date('Y-m-d H:i:s');


        $admin_email = 'demo_'.time().'@example.com';

        $create = Workspace::createWorkspace([
            'company_name' => $demo_settings['countries'][$default_country]['company_name'],
            'full_name' => $demo_settings['countries'][$default_country]['admin_full_name'],
            'email' => $admin_email,
            'password' => '123456',
            'password_confirmation' => '123456'
        ]);


        if(isset($create['result']))
        {
            $user = $create['result']['user'];
            $workspace = $create['result']['workspace'];

            $workspace_id = $workspace->id;

            $faker = Faker\Factory::create('pl_PL');


            $gname = 'Default';

            $group = new ContactGroup;
            $group->gname = $gname;
            $group->workspace_id = $workspace_id;
            $group->save();

            $currencies_all = Currency::getAllCurrencies();

            $selected_currency = $currencies_all[$demo_settings['countries'][$default_country]['currency']];

            $currency = new Currency;
            $currency->cname = $demo_settings['countries'][$default_country]['currency'];
            $currency->iso_code = $demo_settings['countries'][$default_country]['currency'];
            $currency->symbol = $selected_currency['symbol'];
            $currency->workspace_id = $workspace_id;
            $currency->save();

            $currency_id = $currency->id;


            $c_emails_types = ['sales','info','admin','hello','media','support','billing'];

            for ($i=0; $i < 144; $i++){

                shuffle($c_emails_types);

                $company = new Company;

                $company_name = $faker->company;

                $company_domain = strtolower($company_name);
                $company_domain = str_replace(' ','',$company_domain);
                $company_domain = str_replace('.','',$company_domain);
                $company_domain = str_replace(',','',$company_domain);
                $company_domain = str_replace('-','',$company_domain);
                $company_domain = $company_domain.'.com';
                $company_email = $c_emails_types[0].'@'.$company_domain;

                $company->company_name = $faker->company;
                $company->email = $company_email;
                $company->phone = $faker->phoneNumber;

                $company->url = 'https://www.'.$company_domain;

                $company->workspace_id = $workspace_id;

                $company->uuid = Str::uuid();

                $company->save();

            }


            $companies = Company::all()->toArray();

            for ($i=0; $i < 293; $i++){

                shuffle($companies);

                $c = new Contact;

                $c->account = $faker->name;
                $c->uuid = Str::uuid();
                $c->email = $faker->email;
                $c->phone = $faker->phoneNumber;
                //  $c->company = $faker->company;
                $c->company = $companies[0]['company_name'];

                $c->cid = $companies[0]['id'];

                $c->gid = 1;

                $c->gname = $gname;

                $c->address = $faker->streetAddress;
                $c->city = $faker->city;
                $c->state = $faker->state;
                $c->zip = $faker->postcode;
                $c->country = $faker->country;
                $c->lat = $faker->latitude;
                $c->lon  = $faker->longitude;

                $c->workspace_id = $workspace_id;

                $c->save();

            }


            $banks = $demo_settings['countries'][$default_country]['banks'];



            foreach ($banks as $bank){

                $account = new Account;
                $account->account = $bank['name'];
                $account->bank_name = $bank['name'];
                $account->balance = _raid(5);
                $account->workspace_id = $workspace_id;
                $account->save();

                $balance = new Balance;

                $balance->account_id = $account->id;
                $balance->currency_id = $currency_id;
                $balance->balance = _raid(5);

                $balance->workspace_id = $workspace_id;

                $balance->save();

            }


            $tr_incomes = $demo_settings['countries'][$default_country]['incomes'];


            $transactionMethod = TransactionMethod::where('workspace_id',$workspace_id)->get()->toArray();

            $tr_cats = TransactionCategory::where('workspace_id',$workspace_id)->where('type','Income')->get()->toArray();


            for ($i=0; $i < 723; $i++){

                shuffle($banks);
                shuffle($tr_incomes);
                shuffle($transactionMethod);

                shuffle($tr_cats);

                $method = $transactionMethod[0]['name'];


                if($method == 'Cash'){
                    $ref = 'Office / Store Desk';
                }
                elseif ($method == 'Check'){
                    $ref = 'Check Number- '._raid(4).'-'._raid(8);
                }
                elseif ($method == 'Credit Card'){
                    $ref = $faker->creditCardType.' - '.'****'._raid(4);
                }
                else{
                    $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                }



                $transaction = new Transaction;
                $transaction->account = $banks[0]['name'];
                $transaction->uuid = Str::uuid();
                $transaction->description = $tr_incomes[0]['description'];
                $transaction->amount = $tr_incomes[0]['amount'];
                $transaction->cr = $tr_incomes[0]['amount'];
                $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                $transaction->type = 'Income';

                $transaction->vid = _raid(8);

                $transaction->ref = $ref;
                $transaction->method = $method;

                $transaction->cat_id = $tr_cats[0]['id'];
                $transaction->category = $tr_cats[0]['name'];

                $transaction->workspace_id = $workspace_id;

                $transaction->save();

            }


            $tr_cats = TransactionCategory::where('workspace_id',$workspace_id)->where('type','Expense')->get()->toArray();


            $tr_expenses = $demo_settings['countries'][$default_country]['expenses'];

            for ($i=0; $i < 425; $i++){

                shuffle($banks);
                shuffle($tr_expenses);
                shuffle($transactionMethod);

                shuffle($tr_cats);

                $method = $transactionMethod[0]['name'];


                if($method == 'Cash'){
                    $ref = 'Office / Store Desk';
                }
                elseif ($method == 'Check'){
                    $ref = 'Check Number- '._raid(4).'-'._raid(8);
                }
                elseif ($method == 'Credit Card'){
                    $ref = $faker->creditCardType.' - '.'****'._raid(4);
                }
                else{
                    $ref = 'Transaction ID- '.strtoupper(Ib_Str::random_string(17));
                }



                $transaction = new Transaction;
                $transaction->account = $banks[0]['name'];
                $transaction->uuid = Str::uuid();
                $transaction->description = $tr_expenses[0]['description'];
                $transaction->amount = $tr_expenses[0]['amount'];
                $transaction->dr = $tr_expenses[0]['amount'];
                $transaction->date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '+3 month');

                $transaction->type = 'Expense';

                $transaction->vid = _raid(8);

                $transaction->ref = $ref;
                $transaction->method = $method;

                $transaction->cat_id = $tr_cats[0]['id'];
                $transaction->category = $tr_cats[0]['name'];

                $transaction->workspace_id = $workspace_id;

                $transaction->save();

            }


           // Transaction::rebuildCatData();

            $categories = TransactionCategory::expense();

            $cat_amounts = [297523,12189,3290,54782,323459,19220,2145,723,182,4198,5289,39902,2678,229,820,2678,9379,14890,3802,18903,5782,45782,27834,9492,2784,28549,3882,38290,932,56,28820,38400,922,39273,7123,81267,47200,37892,1792,3971,37293,2748,27849];

            $i = 0;

            foreach ($categories as $category){

                $category->total_amount = $cat_amounts[$i];
                $category->save();
                $i++;

            }


            $leadStatus = LeadStatus::all()->toArray();

            $salutations = ['Mr.','Mrs.','Ms.'];


            for ($i=0; $i < 327; $i++){

                shuffle($leadStatus);

                shuffle($salutations);

                shuffle($companies);

                $lead = new Lead;

                $lead->status = $leadStatus[0]['sname'];
                $lead->uuid = Str::uuid();
                $lead->salutation = $salutations[0];
                $lead->first_name = $faker->firstName;
                $lead->last_name = $faker->lastName;
                $lead->company = $companies[0]['company_name'];
                $lead->company_id = $companies[0]['id'];

                $lead->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

                $lead->title = $faker->jobTitle;

                $lead->email = $faker->email;

                $lead->workspace_id = $workspace_id;

                $lead->save();


            }


            $customer = new Contact;

            $customer_name = $demo_settings['countries'][$default_country]['customer']['name'];

            $customer_email = 'customer@example.com';

            $customer->account = $customer_name;

            $customer->uuid = Str::uuid();

            $customer->img = 'storage/dev/user2.png';

            $customer->password = '$1$WN..nD2.$Vo9niDl/fUf0VhheEjmHe/';

            $customer->email = $customer_email;
            $customer->phone = '1-'._raid(3).'-'._raid(3).'-'._raid(4);

            $customer->company = 'CLX';

            $customer->balance = '0.00';

            $customer->cid = 1;

            $customer->gid = 1;

            $customer->gname = $gname;

            $customer->address = $demo_settings['countries'][$default_country]['customer']['address'];
            $customer->city = $demo_settings['countries'][$default_country]['customer']['city'];
            $customer->state = $demo_settings['countries'][$default_country]['customer']['state'];
            $customer->zip = $demo_settings['countries'][$default_country]['customer']['zip'];
            $customer->country = $demo_settings['countries'][$default_country]['customer']['country'];
            $customer->lat = $demo_settings['countries'][$default_country]['customer']['lat'];
            $customer->lon  = $demo_settings['countries'][$default_country]['customer']['lon'];

            $customer->workspace_id = $workspace_id;



            $customer->save();

            $customer_id = $customer->id;

            $card_ref = $faker->creditCardType.' - '.'****'._raid(4);



            DB::insert('INSERT INTO sys_invoices (workspace_id,uuid,userid, account, cn, invoicenum, date, duedate, datepaid, subtotal, discount_type, discount_value, discount, credit, taxname, tax, tax2, total, taxrate, taxrate2, status, paymentmethod, notes, vtoken, ptoken, r, nd, eid, ename, vid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, recurring, recurring_ends, last_recurring_date, source, sale_agent, last_overdue_reminder, allowed_payment_methods, billing_street, billing_city, billing_state, billing_zip, billing_country, shipping_street, shipping_city, shipping_state, shipping_zip, shipping_country, q_hide, show_quantity_as, pid, is_credit_invoice, aid, aname) VALUES ('.$workspace_id.',\''.Str::uuid().'\','.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 144.00, \'f\', 0.00, 0.00, 0.00, \'\', 0.00, 0.00, 144.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'0738541991\', \'7715021517\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 1, 0, null), ('.$workspace_id.',\''.Str::uuid().'\','.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 2000.00, \'f\', 200.00, 200.00, 0.00, \'Sales Tax\', 300.00, 0.00, 2100.00, 15.00, 0.00, \'Unpaid\', \'\', \'\', \'4491605289\', \'9317090421\', \'0\', \''.$today.'\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, \'\', 0, 0, 0, null), ('.$workspace_id.',\''.Str::uuid().'\','.$customer_id.', \''.$customer_name.'\', \'\', \'\', \''.$today.'\', \''.$today.'\', \''.$today_time.'\', 149.00, \'p\', 0.00, 0.00, 149.00, \'\', 0.00, 0.00, 149.00, 0.00, 0.00, \'Paid\', \'\', \'\', \'3559815740\', \'6479179633\', \'0\', \'2017-09-23\', 0, \'\', 0, 1, \'$\', null, null, 1.0000, 0, null, null, null, 0, null, null, null, null, null, null, null, null, null, null, null, null, 0, null, 0, 0, 0, null)');

            DB::insert('INSERT INTO sys_invoiceitems (workspace_id,invoiceid, userid, type, relid, itemcode, description, qty, amount, taxed, taxamount, total, duedate, paymentmethod, notes) 
VALUES ('.$workspace_id.',1, '.$customer_id.', \'\', 0, \'\', \'Credit\', \'1\', 144.00, 0, 0.00, 144.00, \''.$today.'\', \'\', \'\'),
  ('.$workspace_id.',2, '.$customer_id.', \'\', 0, \'\', \'API Integration\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
('.$workspace_id.',2, '.$customer_id.', \'\', 0, \'\', \'UI & UX Design\', \'1\', 400.00, 1, 0.00, 400.00, \''.$today.'\', \'\', \'\'),
('.$workspace_id.',2, '.$customer_id.', \'\', 0, \'\', \'Project Research & Familiarization\', \'1\', 700.00, 1, 0.00, 700.00, \''.$today.'\', \'\', \'\'),
('.$workspace_id.',2, '.$customer_id.', \'\', 0, \'\', \'Meeting, Preparation of Documents & Strategic Planning\', \'1\', 500.00, 1, 0.00, 500.00, \''.$today.'\', \'\', \'\'),
('.$workspace_id.',3, '.$customer_id.', \'\', 0, \'\', \'Web Hosting / Yearly\', \'1\', 149.00, 0, 0.00, 149.00, \''.$today.'\', \'\', \'\')');


            DB::insert('INSERT INTO sys_transactions (workspace_id,uuid,account, type, sub_type, category, amount, payer, payee, payerid, payeeid, method, ref, status, description, tags, tax, date, dr, cr, bal, iid, currency, currency_symbol, currency_prefix, currency_suffix, currency_rate, base_amount, company_id, vid, aid, created_at, updated_at, updated_by, attachments, source, rid, pid, archived, trash, flag, c1, c2, c3, c4, c5) VALUES ('.$workspace_id.',\''.Str::uuid().'\',\'Cash\', \'Income\', null, \'Uncategorized\', 144.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Credit Card\', \''.$card_ref.'\', \'Cleared\', \'Invoice 1 Payment\', \'\', 0.00, \'2017-09-23\', 0.00, 144.00, 0.00, 1, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2017-09-23 15:19:56\', \'2017-09-23 09:19:56\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null), ('.$workspace_id.',\''.Str::uuid().'\',\'JPMorgan Chase & Co.\', \'Income\', null, \'Uncategorized\', 149.00, \''.$customer_name.'\', \'\', '.$customer_id.', 0, \'Paypal\', \'Transaction ID- '.strtoupper(Ib_Str::random_string(17)).'\', \'Cleared\', \'Invoice 3 Payment\', \'\', 0.00, \'2017-09-23\', 0.00, 149.00, 0.00, 3, 1, \'USD\', null, null, 1.0000, 0.0000, 0, '._raid(8).', 0, \'2017-09-23 15:22:00\', \'2017-09-23 09:22:00\', 0, null, null, 0, 0, 0, 0, 0, null, null, null, null, null)');



            DB::insert('INSERT INTO sys_items (workspace_id,name, unit, sales_price, inventory, weight, width, length, height, sku, upc, ean, mpn, isbn, sid, supplier, bid, brand, sell_account, purchase_account, inventory_account, taxable, location, item_number, description, type, track_inventroy, negative_stock, available, status, added, last_sold, e, sorder, gid, category_id, supplier_id, gname, product_id, size, start_date, end_date, expire_date, expire_days, image, flag, is_service, commission_percent, commission_percent_type, commission_fixed, trash, payterm, cost_price, unit_price, promo_price, setup, onetime, monthly, monthlysetup, quarterly, quarterlysetup, halfyearly, halfyearlysetup, annually, annuallysetup, biennially, bienniallysetup, triennially, trienniallysetup, has_domain, free_domain, email_rel, tags, sold_count, total_amount, created_at, updated_at) VALUES (1,\'T-Shirt with AmarBiz Logo\', \'\', 150.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0001\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_c4b43ae0870238150617433711107582.png\', 0, 0, 0.00, null, 0.00, 0, null, 110.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 8.0000, 155.0000, null, \'2017-10-04 18:46:13\'),
('.$workspace_id.',\'Golf Hat\', \'\', 120.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0002\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7a0c1035255988150617492810876737.png\', 0, 0, 0.00, null, 0.00, 0, null, 70.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 9.0000, 108.0000, null, \'2017-10-04 18:46:13\'),
('.$workspace_id.',\'Gift Card 250\', \'\', 250.00, -2.0000, 0.0000, 0.0000, 0.0000, 0.0000, null, null, null, null, null, 0, null, 0, null, 0, 0, 0, 0, null, \'0003\', \'\', \'Product\', \'No\', \'No\', 0, \'Active\', null, null, \'\', 0, 0, 0, 0, null, null, null, null, null, null, 0, \'_7ae11af2868642150642538311023612.png\', 0, 0, 0.00, null, 0.00, 0, null, 250.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, null, null, 0, null, 6.0000, 1500.0000, null, \'2017-10-04 18:46:13\')');

            return [
                'workspace_id' => $workspace_id
            ];


        }
        else{
            dd($create);
        }



    }

}