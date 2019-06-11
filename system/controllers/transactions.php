<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_title', $_L['Transactions'] . '- ' . $config['CompanyName']);
$ui->assign('_st', $_L['Transactions']);
$ui->assign('_application_menu', 'transactions');
$ui->assign('content_inner', inner_contents($config['c_cache']));
$action = $routes['1'];
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);
$ui->assign('user', $user);
$mdate = date('Y-m-d');

// js var

$ui->assign('jsvar', '
_L[\'Working\'] = \'' . $_L['Working'] . '\';
_L[\'Submit\'] = \'' . $_L['Submit'] . '\';
 ');
Event::trigger('transactions');

//

switch ($action) {
    case 'deposit':
        Event::trigger('transactions/deposit/');
        $d = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id)->find_many();

        // $p = ORM::for_table('sys_payers')->find_many();

        $p = ORM::for_table('crm_accounts')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('p', $p);
        $ui->assign('d', $d);
        $cats = ORM::for_table('sys_cats')->where('workspace_id',$workspace_id)->where('type', 'Income')->order_by_asc('sorder')->find_many();
        $ui->assign('cats', $cats);
        $pms = ORM::for_table('sys_pmethods')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('mdate', $mdate);
        $tags = Tags::get_all('Income');
        $ui->assign('tags', $tags);
        $ui->assign('xheader', Asset::css(array(
            'dropzone/dropzone',
            'modal',
            's2/css/select2.min',
            'dp/dist/datepicker.min'
        )));
        $ui->assign('xfooter', Asset::js(array(
            'modal',
            'dropzone/dropzone',
            's2/js/select2.min',
            's2/js/i18n/' . lan() ,
            'dp/dist/datepicker.min',
            'dp/i18n/' . $config['language'],
            'numeric',
        )));
        $x = ORM::for_table('sys_transactions')->where('type', 'Income')->where('workspace_id',$workspace_id);

        if (!has_access($user->roleid, 'transactions', 'all_data')) {
            $x->where('aid', $user->id);
        }

        $x->order_by_desc('id')->limit(20);
        $tr = $x->find_array();
        $currency_rate = 1;


        $ui->assign('tr', $tr);
        view('transactions_deposit', ['currencies' => Currency::all() , 'currency_rate' => $currency_rate]);
        break;

    case 'deposit-post':

        $msg = '';

        Event::trigger('transactions/deposit-post/');
        $account = _post('account');
        $date = _post('date');
        $amount = _post('amount');
        /* @since v2. added support for ',' as decimal separator */
        $amount = Finance::amount_fix($amount);

       // dd($amount);
        $payerid = _post('payer');


        $ref = _post('ref');

        if($ref != ''){
            $r_check = Transaction::where('type','Income')->where('workspace_id',$workspace_id)->where('ref',$ref)->where('date',$date)->first();

            if($r_check){

                $msg.= $_L['Ref'].' '.$_L['already exist'] . '<br />';

            }

        }






        $pmethod = _post('pmethod');
        $cat = _post('cats');

        $category = TransactionCategory::where('type', 'Income')->where('workspace_id',$workspace_id)->where('name', $cat)->first();
        if ($category) {
            $current_total_amount = $category->total_amount;
            $category->total_amount = $current_total_amount + $amount;
            $category->save();
            $cat_id = $category->id;
        }
        else{
            $cat_id = 0;
        }


        $tags = $_POST['tags'];
        /* @since Build 4560. added support file attachments */
        $attachments = _post('attachments');
        if ($payerid == '') {
            $payerid = '0';
        }

        $description = _post('description');

        if ($description == '') {
            $msg.= $_L['description_error'] . '<br />';
        }

        if (Validator::Length($account, 100, 1) == false) {
            $msg.= $_L['Choose an Account'] . ' ' . '<br />';
        }

        if (is_numeric($amount) == false) {
            $msg.= $_L['amount_error'] . '<br />';
        }

        if ($msg == '') {
            Tags::save($tags, 'Income');

            // find the current balance for this account

            $a = ORM::for_table('sys_accounts')->where('account', $account)->find_one();
            $account_id = $a->id;
            $cbal = $a['balance'];
            $nbal = $cbal + $amount;
            $a->balance = $nbal;
            $a->save();

            // update the account balance table

            $home_currency = Currency::where('iso_code', $config['home_currency'])->where('workspace_id',$workspace_id)->first();
            $account_balance = Balance::where('account_id', $account_id)->where('workspace_id',$workspace_id)->where('currency_id', $home_currency->id)->first();
            if ($account_balance) {
                $cbal = $account_balance->balance;
                $account_balance->balance = $cbal + $amount;
                $account_balance->workspace_id = $workspace_id;
                $account_balance->save();
            }
            else {

                // create record

                $account_balance = new Balance;
                $account_balance->account_id = $account_id;
                $account_balance->workspace_id = $workspace_id;
                $account_balance->currency_id = $home_currency->id;
                $account_balance->balance = $amount;
                $account_balance->save();
            }

            $d = ORM::for_table('sys_transactions')->create();

            $uuid = Str::uuid();

            $d->workspace_id = $workspace_id;
            $d->uuid = $uuid;
            $d->account = $account;
            $d->type = 'Income';
            $d->payerid = $payerid;
            $d->tags = Arr::arr_to_str($tags);
            $d->amount = $amount;
            $d->category = $cat;
            $d->cat_id = $cat_id;
            $d->method = $pmethod;
            $d->ref = $ref;
            $d->description = $description;

            // Build 4560

            $d->attachments = $attachments;
            $d->date = $date;
            $d->dr = '0.00';
            $d->cr = $amount;
            $d->bal = $nbal;

            // others

            $d->payer = '';
            $d->payee = '';
            $d->payeeid = '0';
            $d->status = 'Cleared';
            $d->tax = '0.00';
            $d->iid = 0;
            $d->aid = $user->id;

            $d->vid = _raid(8);

            $d->updated_at = date('Y-m-d H:i:s');

            //

            $d->save();
            $tid = $d->id();
            _log('New Deposit: ' . $description . ' [TrID: ' . $tid . ' | Amount: ' . $amount . ']', 'Admin', $user->id);
            _msglog('s', $_L['Transaction Added Successfully']);

            // find the category and adjust balance


            echo $uuid;
        }
        else {
            responseWithError($msg);
        }

        break;

    case 'expense':
        Event::trigger('transactions/expense/');
        $currencies = Currency::all();
        $ui->assign('currencies', $currencies);
        $d = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id)->find_many();
        $p = ORM::for_table('crm_accounts')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('p', $p);
        $ui->assign('d', $d);
        $tags = Tags::get_all('Expense');
        $ui->assign('tags', $tags);
        $cats = ORM::for_table('sys_cats')->where('type', 'Expense')->where('workspace_id',$workspace_id)->order_by_asc('sorder')->find_many();
        $ui->assign('cats', $cats);
        $pms = ORM::for_table('sys_pmethods')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('mdate', $mdate);
        $ui->assign('xheader', Asset::css(array(
            'dropzone/dropzone',
            'modal',
            's2/css/select2.min',
            'dp/dist/datepicker.min'
        )));
        $ui->assign('xfooter', Asset::js(array(
            'modal',
            'dropzone/dropzone',
            's2/js/select2.min',
            's2/js/i18n/' . lan() ,
            'dp/dist/datepicker.min',
            'dp/i18n/' . $config['language'],
            'numeric',
        )));
        $x = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where('type', 'Expense');
        if (!has_access($user->roleid, 'transactions', 'all_data')) {
            $x->where('aid', $user->id);
        }

        $x->order_by_desc('id')->limit(20);
        $tr = $x->find_array();
        $ui->assign('tr', $tr);

        //

        $currency_rate = 1;


        view('transactions_expense', [
            'currency_rate' => $currency_rate,
            'expense_types' => ExpenseType::orderBy('sorder')->get()
        ]);


        break;

    case 'expense-post':

        $msg = '';

        Event::trigger('transactions/expense-post/');
        $account = _post('account');
        $date = _post('date');
        $amount = _post('amount');
        $amount = Finance::amount_fix($amount);
        $payee = _post('payee');

        $ref = _post('ref');

        if($ref != ''){
            $r_check = Transaction::where('type','Expense')->where('workspace_id',$workspace_id)->where('ref',$ref)->where('date',$date)->first();

            if($r_check){

                $msg.= $_L['Ref'].' '.$_L['already exist'] . '<br />';

            }

        }
        $pmethod = _post('pmethod');

        // New



        $sub_type = _post('sub_type');
        $cat = _post('cats');
        $tags = $_POST['tags'];
        $attachments = _post('attachments');
        if (!is_numeric($payee)) {
            $payee = '0';
        }


        $category = TransactionCategory::where('type', 'Expense')->where('workspace_id',$workspace_id)->where('name', $cat)->first();
        if ($category) {
            $current_total_amount = $category->total_amount;
            $category->total_amount = $current_total_amount + $amount;
            $category->save();
            $cat_id = $category->id;
        }

        else{

            $cat_id = 0;

        }


        $description = _post('description');

        if ($description == '') {
            $msg.= $_L['description_error'] . '<br />';
        }

        if (Validator::Length($account, 100, 1) == false) {
            $msg.= $_L['Choose an Account'] . ' ' . '<br />';
        }

        if (is_numeric($amount) == false) {
            $msg.= $_L['amount_error'] . '<br />';
        }

        if ($msg == '') {
            Tags::save($tags, 'Expense');

            // find the current balance for this account

            $a = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id)->where('account', $account)->find_one();
            $account_id = $a->id;
            $cbal = $a['balance'];
            $nbal = $cbal - $amount;
            $a->balance = $nbal;
            $a->save();

            // update the account balance table

            $home_currency = Currency::where('iso_code', $config['home_currency'])->where('workspace_id',$workspace_id)->first();
            $account_balance = Balance::where('account_id', $account_id)->where('currency_id', $home_currency->id)->where('workspace_id',$workspace_id)->first();
            if ($account_balance) {
                $cbal = $account_balance->balance;
                $account_balance->balance = $cbal - $amount;
                $account_balance->save();
            }
            else {

                // create record

                $account_balance = new Balance;
                $account_balance->workspace_id = $workspace_id;
                $account_balance->account_id = $account_id;
                $account_balance->currency_id = $home_currency->id;
                $account_balance->balance = 0 - $amount;
                $account_balance->save();
            }

            $uuid = Str::uuid();
            $d = ORM::for_table('sys_transactions')->create();
            $d->workspace_id = $workspace_id;
            $d->uuid = $uuid;
            $d->account = $account;
            $d->type = 'Expense';
            $d->payeeid = $payee;
            $d->tags = Arr::arr_to_str($tags);
            $d->amount = $amount;
            $d->category = $cat;
            $d->cat_id = $cat_id;
            $d->method = $pmethod;
            $d->ref = $ref;
            $d->description = $description;

            // Build 4560

            $d->attachments = $attachments;
            $d->date = $date;
            $d->dr = $amount;
            $d->cr = '0.00';
            $d->bal = $nbal;

            // others

            $d->payer = '';
            $d->payee = '';
            $d->payerid = '0';
            $d->status = 'Cleared';
            $d->tax = '0.00';
            $d->iid = 0;

            // new

            $d->sub_type = $sub_type;
            $d->aid = $user->id;

            $d->vid = _raid(8);

            $d->updated_at = date('Y-m-d H:i:s');
            $d->save();
            $tid = $d->id();
            _log('New Expense: ' . $description . ' [TrID: ' . $tid . ' | Amount: ' . $amount . ']', 'Admin', $user->id);
            _msglog('s', $_L['Transaction Added Successfully']);


            echo $uuid;
        }
        else {
            responseWithError($msg);
        }

        break;

    case 'transfer':
        Event::trigger('transactions/transfer/');
        $d = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('p', $d);
        $ui->assign('d', $d);
        $pms = ORM::for_table('sys_pmethods')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('mdate', $mdate);
        $tags = Tags::get_all('Transfer');
        $ui->assign('tags', $tags);
        $ui->assign('xheader', Asset::css(array(
            's2/css/select2.min',
            'dp/dist/datepicker.min'
        )));
        $ui->assign('xfooter', Asset::js(array(
            's2/js/select2.min',
            's2/js/i18n/' . lan() ,
            'dp/dist/datepicker.min',
            'dp/i18n/' . $config['language'],
            'numeric'
        )));
        $ui->assign('xjq', '

 $(\'.amount\').autoNumeric(\'init\', {

    aSign: \'' . $config['currency_code'] . ' \',
    dGroup: ' . $config['thousand_separator_placement'] . ',
    aPad: ' . $config['currency_decimal_digits'] . ',
    pSign: \'' . $config['currency_symbol_position'] . '\',
    aDec: \'' . $config['dec_point'] . '\',
    aSep: \'' . $config['thousands_sep'] . '\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });

 ');
        $x = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where('type', 'Transfer');
        if (!has_access($user->roleid, 'transactions', 'all_data')) {
            $x->where('aid', $user->id);
        }

        $x->order_by_desc('id')->limit(20);
        $tr = $x->find_array();
        $ui->assign('tr', $tr);


        $currency_rate = 1;

        view('transfer',[
            'currencies' => Currency::all(),
            'currency_rate' => $currency_rate
        ]);


        break;

    case 'transfer-post':
        Event::trigger('transactions/transfer-post/');
        $faccount = _post('faccount');
        $taccount = _post('taccount');
        $date = _post('date');
        $amount = _post('amount');
        $amount = Finance::amount_fix($amount);
        $pmethod = _post('pmethod');
        $ref = _post('ref');
        $description = _post('description');
        $msg = '';
        if (Validator::Length($faccount, 100, 2) == false) {
            $msg.= $_L['Choose an Account'] . ' ' . '<br />';
        }

        if (Validator::Length($taccount, 100, 2) == false) {
            $msg.= $_L['Choose the Traget Account'] . ' ' . '<br />';
        }

        if ($description == '') {
            $msg.= $_L['description_error'] . '<br />';
        }

        if (is_numeric($amount) == false) {
            $msg.= $_L['amount_error'] . '<br />';
        }

        // check if from account & target account is same

        if ($faccount == $taccount) {
            $msg.= $_L['same_account_error'] . '<br />';
        }

        $tags = $_POST['tags'];
        Tags::save($tags, 'Transfer');

        if($config['edition'] == 'iqm'){
            $c1_amount = Finance::amount_fix(_post('c1_amount'));
            $c2_amount = Finance::amount_fix(_post('c2_amount'));
        }

        if ($msg == '') {
            $home_currency = Currency::where('iso_code', $config['home_currency'])->where('workspace_id',$workspace_id)->first();
            $a = ORM::for_table('sys_accounts')->where('account', $faccount)->where('workspace_id',$workspace_id)->find_one();
            $from_account_id = $a->id;
            $cbal = $a['balance'];
            $nbal = $cbal - $amount;
            $a->balance = $nbal;
            $a->save();

            // update the account balance table

            $account_balance = Balance::where('account_id', $from_account_id)->where('workspace_id',$workspace_id)->where('currency_id', $home_currency->id)->first();
            if ($account_balance) {
                $cbal = $account_balance->balance;
                $account_balance->balance = $cbal - $amount;
                $account_balance->save();
            }
            else {
                $account_balance = new Balance;
                $account_balance->workspace_id = $workspace_id;
                $account_balance->account_id = $from_account_id;
                $account_balance->currency_id = $home_currency->id;
                $account_balance->balance = 0 - $amount;
                $account_balance->save();
            }

            $a = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id)->where('account', $taccount)->find_one();
            $to_account_id = $a->id;
            $cbal = $a['balance'];
            $tnbal = $cbal + $amount;
            $a->balance = $tnbal;
            $a->save();

            $account_balance = Balance::where('account_id', $to_account_id)->where('workspace_id',$workspace_id)->where('currency_id', $home_currency->id)->first();
            if ($account_balance) {
                $cbal = $account_balance->balance;
                $account_balance->balance = $cbal + $amount;
                $account_balance->save();
            }
            else {

                // create record

                $account_balance = new Balance;
                $account_balance->workspace_id = $workspace_id;
                $account_balance->account_id = $to_account_id;
                $account_balance->currency_id = $home_currency->id;
                $account_balance->balance = $amount;
                $account_balance->save();
            }

            // update the account balance table



            $d = ORM::for_table('sys_transactions')->create();
            $d->workspace_id = $workspace_id;
            $d->uuid = Str::uuid();
            $d->account = $faccount;
            $d->type = 'Transfer';
            $d->amount = $amount;
            $d->method = $pmethod;
            $d->ref = $ref;
            $d->tags = Arr::arr_to_str($tags);
            $d->description = $description;
            $d->date = $date;
            $d->dr = $amount;
            $d->cr = '0.00';
            $d->bal = $nbal;

            // others

            $d->payer = '';
            $d->payee = '';
            $d->payerid = '0';
            $d->payeeid = '0';
            $d->category = '';
            $d->status = 'Cleared';
            $d->tax = '0.00';
            $d->iid = 0;
            $d->aid = $user->id;

            $d->vid = _raid(8);

            $d->updated_at = date('Y-m-d H:i:s');

            //

            $d->save();

            // transaction for target account

            $d = ORM::for_table('sys_transactions')->create();
            $d->account = $taccount;
            $d->workspace_id = $workspace_id;
            $d->uuid = Str::uuid();
            $d->type = 'Transfer';
            $d->amount = $amount;
            $d->method = $pmethod;
            $d->ref = $ref;
            $d->tags = Arr::arr_to_str($tags);
            $d->description = $description;
            $d->date = $date;
            $d->dr = '0.00';
            $d->cr = $amount;
            $d->bal = $tnbal;

            // others

            $d->payer = '';
            $d->payee = '';
            $d->payerid = '0';
            $d->payeeid = '0';
            $d->category = '';
            $d->status = 'Cleared';
            $d->tax = '0.00';
            $d->iid = 0;
            $d->aid = 0;

            $d->vid = _raid(8);


            $d->updated_at = date('Y-m-d H:i:s');

            //

            $d->save();
            _msglog('s', $_L['Transaction Added Successfully']);
            echo '1';
        }
        else {
            responseWithError($msg);
        }

        break;

    case 'list':

        Event::trigger('transactions/list/');
        $cid = route(2);
        if ($cid == '' || $cid == '0') {
            $ui->assign('p_cid', '');
        }
        else {
            $ui->assign('p_cid', $cid);
        }

        $tr_type = route(3);
        if ($tr_type == 'income') {
            $tr_type = 'Income';
        }
        elseif ($tr_type == 'expense') {
            $tr_type = 'Expense';
        }
        else {
            $tr_type = '';
        }

        $parent_menu = route(4);
        if ($parent_menu == 'reports') {
            $ui->assign('_application_menu', 'reports');
        }

        $account = route(3);
        if ($account == '' || $account == '0') {
            $ui->assign('p_account', '');
        }
        else {
            $ui->assign('p_account', $account);
        }

        $c = ORM::for_table('crm_accounts')->where('workspace_id',$workspace_id)->select('id')->select('account')->select('company')->select('email')->order_by_desc('id')->find_many();
        $ui->assign('c', $c);
        $a = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id)->find_array();
        $ui->assign('a', $a);
        $ui->assign('xheader', Asset::css(array(
            's2/css/select2.min',
            'dt/dt',
            'daterangepicker/daterangepicker'
        )));
        $ui->assign('xfooter', Asset::js(array(
            's2/js/select2.min',
            's2/js/i18n/' . lan() ,
            'dt/dt',
            'daterangepicker/daterangepicker'
        )));

        view('transactions_list', [
            'tr_type' => $tr_type,
            'expense_types' => ExpenseType::orderBy('sorder')->where('workspace_id',$workspace_id)->get()
        ]);

        break;

    case 'a':
        Event::trigger('transactions/a/');
        $d = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id)->find_many();

        // $p = ORM::for_table('sys_payers')->find_many();

        $p = ORM::for_table('crm_accounts')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('p', $p);
        $ui->assign('d', $d);
        $cats = ORM::for_table('sys_cats')->where('workspace_id',$workspace_id)->where('type', 'Income')->order_by_asc('sorder')->find_many();
        $ui->assign('cats', $cats);
        $pms = ORM::for_table('sys_pmethods')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('xheader', Asset::css(array(
            's2/css/select2.min',
            'dp/dist/datepicker.min',
            'dt/media/css/jquery.dataTables.min',
            'modal',
            'css/dta'
        )));
        $ui->assign('xfooter', Asset::js(array(
            's2/js/select2.min',
            's2/js/i18n/' . lan() ,
            'dp/dist/datepicker.min',
            'dp/i18n/' . $config['language'],
            'numeric',
            'modal',
            'dt/media/js/jquery.dataTables.min',
            'js/dta',
            'js/tra'
        )));
        $ui->assign('xjq', '


 ');
        view('tra');
        break;


    case 'list-income':
        Event::trigger('transactions/list-income/');
        $ui->assign('_application_menu', 'reports');
        $paginator = Paginator::bootstrap('sys_transactions', 'type', 'Income');
        $d = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where('type', 'Income')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d', $d);
        $ui->assign('xfooter', Asset::js(array(
            'numeric'
        )));
        $ui->assign('xjq', '

         $(\'.amount\').autoNumeric(\'init\', {

    aSign: \'' . $config['currency_code'] . ' \',
    dGroup: ' . $config['thousand_separator_placement'] . ',
    aPad: ' . $config['currency_decimal_digits'] . ',
    pSign: \'' . $config['currency_symbol_position'] . '\',
    aDec: \'' . $config['dec_point'] . '\',
    aSep: \'' . $config['thousands_sep'] . '\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });

        ');
        $ui->assign('paginator', $paginator);
        view('transactions');
        break;

    case 'list-expense':
        Event::trigger('transactions/list-expense/');
        $ui->assign('_application_menu', 'reports');
        $paginator = Paginator::bootstrap('sys_transactions', 'type', 'Expense');
        $d = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where('type', 'Expense')->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('date')->find_many();
        $ui->assign('d', $d);
        $ui->assign('xjq', '

         $(\'.amount\').autoNumeric(\'init\', {

    aSign: \'' . $config['currency_code'] . ' \',
    dGroup: ' . $config['thousand_separator_placement'] . ',
    aPad: ' . $config['currency_decimal_digits'] . ',
    pSign: \'' . $config['currency_symbol_position'] . '\',
    aDec: \'' . $config['dec_point'] . '\',
    aSep: \'' . $config['thousands_sep'] . '\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });

        ');
        $ui->assign('paginator', $paginator);
        view('transactions');
        break;

    case 'manage':
        Event::trigger('transactions/manage/');
        $id = $routes['2'];
      //  $t = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->find_one($id);
        $t = Transaction::where('workspace_id',$workspace_id)->where('uuid',$id)->first();
        if ($t) {
            $p = ORM::for_table('crm_accounts')->where('workspace_id',$workspace_id)->find_many();
            $ui->assign('p', $p);
            $ui->assign('t', $t);
            $d = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id)->find_many();
            $ui->assign('d', $d);
            $icat = '1';
            if (($t['type']) == 'Income') {
                $cats = ORM::for_table('sys_cats')->where('workspace_id',$workspace_id)->where('type', 'Income')->find_many();
                $tags = Tags::get_all('Income');
            }
            elseif (($t['type']) == 'Expense') {
                $cats = ORM::for_table('sys_cats')->where('workspace_id',$workspace_id)->where('type', 'Expense')->find_many();
                $tags = Tags::get_all('Expense');
            }
            else {
                $cats = '0';
                $icat = '0';
                $tags = Tags::get_all('Transfer');
            }

            $ui->assign('tags', $tags);
            $dtags = explode(',', $t['tags']);
            $ui->assign('dtags', $dtags);
            $ui->assign('icat', $icat);
            $ui->assign('cats', $cats);
            $pms = ORM::for_table('sys_pmethods')->where('workspace_id',$workspace_id)->find_many();
            $ui->assign('pms', $pms);
            $ui->assign('mdate', $mdate);
            $ui->assign('xheader', Asset::css(array(
                's2/css/select2.min',
                'dp/dist/datepicker.min'
            )));
            $ui->assign('xfooter', Asset::js(array(
                's2/js/select2.min',
                's2/js/i18n/' . lan() ,
                'dp/dist/datepicker.min',
                'dp/i18n/' . $config['language'],
                'numeric',
            )));
            view('transactions_manage');
        }
        else {
            r2(U . 'transactions/list', 'e', $_L['Transaction_Not_Found']);
        }

        break;

    case 'edit-post':
        Event::trigger('transactions/edit-post/');
        $id = _post('id');
        $d = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->find_one($id);
        if ($d) {
            $cat = _post('cats');
            $pmethod = _post('pmethod');
            $ref = _post('ref');
            $date = _post('date');
            $payer = _post('payer');
            $payee = _post('payee');
            $description = _post('description');
            $msg = '';
            if ($description == '') {
                $msg.= $_L['description_error'] . '<br />';
            }

            if (!is_numeric($payer)) {
                $payer = '0';
            }

            if (!is_numeric($payee)) {
                $payee = '0';
            }

            $tags = $_POST['tags'];
            if ($msg == '') {

                // find the current balance for this account

                Tags::save($tags, $d['type']);
                $d->category = $cat;
                $d->payerid = $payer;
                $d->payeeid = $payee;
                $d->method = $pmethod;
                $d->ref = $ref;
                $d->tags = Arr::arr_to_str($tags);
                $d->description = $description;
                $d->date = $date;
                $d->save();
                _msglog('s', $_L['edit_successful']);
                echo $d->id();
            }
            else {
                echo $msg;
            }
        }
        else {
            echo 'Transaction Not Found';
        }

        break;

    case 'delete-post':
        Event::trigger('transactions/delete-post/');
        if (!has_access($user->roleid, 'transactions', 'delete')) {
            permissionDenied();
        }

        $id = _post('id');
        if (Transaction::remove($id)) {

            Transaction::rebuildCatData();

            Item::rebuildSalesData();

            r2(U . 'transactions/list', 's', $_L['transaction_delete_successful']);
        }
        else {
            r2(U . 'transactions/list', 'e', $_L['an_error_occured']);
        }

        break;

    case 'post':
        break;

    case 's':
        Event::trigger('transactions/s/');
        $d = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id)->find_many();

        // $p = ORM::for_table('sys_payers')->find_many();

        $c = ORM::for_table('crm_accounts')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('c', $c);
        $ui->assign('d', $d);
        $cats = ORM::for_table('sys_cats')->where('workspace_id',$workspace_id)->where('type', 'Income')->order_by_asc('sorder')->find_many();
        $ui->assign('cats', $cats);
        $pms = ORM::for_table('sys_pmethods')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('pms', $pms);
        $mdate = date('Y-m-d');
        $fdate = date('Y-m-d', strtotime('today - 30 days'));
        $ui->assign('fdate', $fdate);
        $ui->assign('tdate', $mdate);
        $ui->assign('xheader', Asset::css(array(
            's2/css/select2.min',
            'dp/dist/datepicker.min',
            'modal'
        )));
        $ui->assign('xfooter', Asset::js(array(
            's2/js/select2.min',
            's2/js/i18n/' . lan() ,
            'dp/dist/datepicker.min',
            'dp/i18n/' . $config['language'],
            'numeric',
            'modal',
            'js/tra'
        )));
        view('trs');
        break;

    case 'export_csv':
        Event::trigger('transactions/export_csv/');
        $fileName = 'transactions_' . time() . '.csv';
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-Description: File Transfer');
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename={$fileName
}

");
        header("Expires: 0");
        header("Pragma: public");
        $fh = @fopen('php://output', 'w');
        $headerDisplayed = false;

// $results = ORM::for_table('crm_Accounts')->find_array();

        $results = db_find_array('sys_transactions');

        foreach($results as $data) {

            // Add a header row if it hasn't been added yet

            if (!$headerDisplayed) {

                // Use the keys from $data as the titles

                fputcsv($fh, array_keys($data));
                $headerDisplayed = true;
            }

            // Put the data into the stream

            fputcsv($fh, $data);
        }

// Close the file

        fclose($fh);
        break;

    case 'handle_attachment':
        $uploader = new Uploader();
        $uploader->setDir('storage/transactions/');
        $uploader->sameName(false);
        $uploader->setExtensions(array(
            'jpg',
            'jpeg',
            'png',
            'gif',
            'pdf'
        )); //allowed extensions list//
        if ($uploader->uploadFile('file')) { //txtFile is the filebrowse element name //
            $uploaded = $uploader->getUploadName(); //get uploaded file name, renames on upload//
            $file = $uploaded;
            $msg = 'Uploaded Successfully';
            $success = 'Yes';
        }
        else { //upload failed
            $file = '';
            $msg = $uploader->getMessage();
            $success = 'No';
        }

        $a = array(
            'success' => $success,
            'msg' => $msg,
            'file' => $file
        );
        header('Content-Type: application/json');
        echo json_encode($a);
        break;

    case 'tr_list':

        //  sleep(5);

        $columns = array();
        $columns[] = 'id';
        $columns[] = 'date';
        $columns[] = 'account';
        $columns[] = 'type';
        $columns[] = 'amount';
        $columns[] = 'description';
        $columns[] = 'dr';
        $columns[] = 'cr';
        $columns[] = 'bal';
        $columns[] = 'manage';
        $order_by = $_POST['order'];
        $o_c_id = $order_by[0]['column'];
        $o_type = $order_by[0]['dir'];
        $a_order_by = $columns[$o_c_id];
        $d = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id);
        $d->select('id');
        $d->select('account');
        $d->select('type');
        $d->select('date');
        $d->select('amount');
        $d->select('description');
        $d->select('dr');
        $d->select('cr');
        $d->select('bal');
        $tr_type = _post('tr_type');
        if ($tr_type != '') {
            $d->where('type', $tr_type);
        }

        $account = _post('account');
        if ($account != '') {
            $d->where('account', $account);
        }

        $cid = _post('cid');
        if ($cid != '') {
            $d->where_any_is(array(
                array(
                    'payerid' => $cid
                ) ,
                array(
                    'payeeid' => $cid
                )
            ));
        }

        // 11/04/2016 - 12/03/2016

        $reportrange = _post('reportrange');
        if ($reportrange != '') {
            $reportrange = explode('-', $reportrange);
            $from_date = trim($reportrange[0]);
            $to_date = trim($reportrange[1]);
            $d->where_gte('date', $from_date);
            $d->where_lte('date', $to_date);
        }

        if (!has_access($user->roleid, 'transactions', 'all_data')) {
            $d->where('aid', $user->id);
        }

        $x = $d->find_array();
        $iTotalRecords = $d->count();

        //        $ret = array();
        //
        //       $i = 0;
        //
        //        foreach ($d as $ds){
        //
        //            $ret[$i]['account'] = $ds['account'];
        //            $ret[$i]['type'] = $ds['type'];
        //            $ret[$i]['date'] = $ds['date'];
        //            $ret[$i]['amount'] = $ds['amount'];
        //            $ret[$i]['description'] = $ds['description'];
        //            $ret[$i]['dr'] = $ds['dr'];
        //            $ret[$i]['cr'] = $ds['cr'];
        //            $ret[$i]['bal'] = $ds['bal'];
        //            $ret[$i]['id'] = $ds['id'];
        //
        //            $i++;
        //
        //        }
        //
        //        $data = array();
        //        $data['data'] = $ret;

        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);
        $records = array();
        $records["data"] = array();
        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;
        if ($o_type == 'desc') {
            $d->order_by_desc($a_order_by);
        }
        else {
            $d->order_by_asc($a_order_by);
        }

        $d->limit($end);
        $d->offset($iDisplayStart);
        $x = $d->find_array();
        $i = $iDisplayStart;
        foreach($x as $xs) {
            $records["data"][] = array(
                '<a href="' . U . 'transactions/manage/' . $xs['uuid'] . '">' . $xs['date'] . '</a>',
                htmlentities($xs['account']),
                htmlentities($xs['type']),
                '<a href="' . U . 'transactions/manage/' . $xs['uuid'] . '">' . htmlentities($xs['description']) . '</a>',
                $xs['amount'],
                $xs['dr'],
                $xs['cr'],
                $xs['bal'],
                '<a href="' . U . 'transactions/manage/' . $xs['uuid'] . '" class="btn btn-primary btn-xs"><i class="fa fa-file-text-o"></i></a>',
            );
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;
        api_response($records);

        break;

    case 'exchange':
        $d = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id)->find_many();
        $p = ORM::for_table('crm_accounts')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('p', $p);
        $ui->assign('d', $d);
        $pms = ORM::for_table('sys_pmethods')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('pms', $pms);
        $ui->assign('mdate', $mdate);
        $ui->assign('xheader', Asset::css(array(
            'dropzone/dropzone',
            'modal',
            's2/css/select2.min',
            'dp/dist/datepicker.min'
        )));
        $ui->assign('xfooter', Asset::js(array(
            'modal',
            'dropzone/dropzone',
            's2/js/select2.min',
            's2/js/i18n/' . lan() ,
            'dp/dist/datepicker.min',
            'dp/i18n/' . $config['language'],
            'numeric'
        )));
        $ui->assign('xjq', '
 $(\'.amount\').autoNumeric(\'init\', {

    aSign: \'' . $config['currency_code'] . ' \',
    dGroup: ' . $config['thousand_separator_placement'] . ',
    aPad: ' . $config['currency_decimal_digits'] . ',
    pSign: \'' . $config['currency_symbol_position'] . '\',
    aDec: \'' . $config['dec_point'] . '\',
    aSep: \'' . $config['thousands_sep'] . '\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });

 ');

        // find all currency

        $currencies = ORM::for_table('sys_currencies')->where('workspace_id',$workspace_id)->find_array();
        $ui->assign('currencies', $currencies);

        $c1_currency = false;
        $c2_currency = false;

        view('transactions_exchange',[
            'c1_currency' => $c1_currency,
            'c2_currency' => $c2_currency
        ]);


        break;

    case 'exchange-post':








        break;

    case 'get_balance':

        $account_id = route(2);

        //  echo $account_id;

        $balances = Balance::where('account_id',$account_id)->where('workspace_id',$workspace_id)->get();

        $txt = '';
        if($balances){
            $txt .= 'Current Balance: <br>';
            $occur = false;
            foreach ($balances as $balance){
                $occur = true;
                $currency_id = $balance->currency_id;
                $currency = Currency::where('workspace_id',$workspace_id)->find($currency_id);
                $bal = $balance->balance;

                $txt .= $currency->iso_code.': '.$bal.' <br>';
            }
        }

        if($occur){
            echo $txt;
        }
        else{
            echo 'This account does not have any balance';
        }

        break;

    case 'print':



        view('transactions_print');



        break;


    case 'receipt':

        $transaction_id = route(2);

        $transaction = Transaction::where('workspace_id',$workspace_id)->find($transaction_id);

        view('transactions_receipt');

        break;

    case 'bills':

        $days_before = date('Y-m-d', strtotime('-30 days'));
        $days_after = date('Y-m-d', strtotime('+30 days'));

        $today = date('Y-m-d');

        $bills_upcoming = Bill::whereBetween('next_date', [$today, $days_after])
            ->orderBy('next_date','asc')
            ->get();

        $bills_past_due = Bill::whereBetween('next_date', [$today, $days_before])
            ->orderBy('next_date','asc')
            ->where('is_paid',0)
            ->get();


        view('transactions_bills',[
            'bills_upcoming' => $bills_upcoming,
            'bills_past_due' => $bills_past_due
        ]);


        break;


    case 'bills-all':

        $bills = Bill::where('workspace_id',$workspace_id)
            ->orderBy('next_date','desc')
            ->get();

        view('transactions_bills_all',[
            'bills' => $bills
        ]);

        break;


    case 'bill':

        $bill = false;

        $id = route(2);

        if($id != '')
        {
            $bill = Bill::where('workspace_id',$workspace_id)
                ->where('uuid',$id)
                ->first();
        }

        $categories = TransactionCategory::where('workspace_id',$workspace_id)
            ->where('type','Expense')
            ->orderBy('sorder','asc')
            ->get();

        $contacts = Contact::getAllContacts();

        $accounts = Account::getAllAccounts();

        $currencies = Currency::where('workspace_id',$workspace_id)->get();
        $currencies_all = Currency::getAllCurrencies();

        view('transactions_bill',[
            'categories' => $categories,
            'contacts' => $contacts,
            'accounts' => $accounts,
            'currencies' => $currencies,
            'currencies_all' => $currencies_all,
            'bill' => $bill
        ]);

        break;


    case 'bill-save':

        // Validate Data
        $validator = new Validator;
        $data = $request->all();

        $validation = $validator->validate($data, [
            'title' => 'required',
            'next_date' => 'required|date',
            'amount' => 'required',
            'currency' => 'required',
            'recurring_type' => 'required'
        ]);


        if ($validation->fails()) {
            $message = '';
            foreach ($validation->errors()->all() as $key => $value)
            {
                $message .= $value.' <br> ';
            }
            echo $message;
            exit;
        } else {
            // Data validated, Go ahead

            $currency_iso_code = _post('currency');

            $amount = _post('amount');

            $amount = createFromCurrency($amount,$currency_iso_code);

            $bill_id = _post('bill_id');

            $bill = false;

            if($bill_id != '')
            {
                $bill = Bill::where('workspace_id',$workspace_id)
                    ->where('uuid',$bill_id)
                    ->first();
            }

            if(!$bill)
            {
                $bill = new Bill;
                $bill->workspace_id = $workspace_id;
                $bill->uuid = Str::uuid();
            }

            $bill->title = $data['title'];

            $bill->currency = $data['currency'];

            if(isset($data['from_account_id']) && $data['from_account_id'] != '')
            {
                $bill->from_account_id = $data['from_account_id'];
            }

            if(isset($data['contact_id']) && $data['contact_id'] != '')
            {
                $bill->contact_id = $data['contact_id'];
            }

            if(isset($data['category_id']) && $data['category_id'] != '')
            {
                $bill->category_id = $data['category_id'];
            }

            if(isset($data['start_date']) && $data['start_date'] != '')
            {
                $bill->start_date = $data['start_date'];
            }

            if(isset($data['end_date']) && $data['end_date'] != '')
            {
                $bill->end_date = $data['end_date'];
            }

            $bill->next_date = $data['next_date'];

            $bill->net_amount = $amount;

            $bill->recurring_type = $data['recurring_type'];

            if(isset($data['website']) && $data['website'] != '')
            {
                $bill->website = $data['website'];
            }

            $bill->save();

            echo $bill->id;

        }


        break;

    case 'delete-bill':

        $id = route(2);

        $bill = Bill::where('workspace_id',$workspace_id)
            ->where('uuid',$id)
            ->first();

        if($bill)
        {
            $bill->delete();
        }

        r2(U.'transactions/bills','s',$_L['delete_successful']);

        break;


    case 'bill-mark-as-paid':

        $id = route(2);

        $bill = Bill::where('workspace_id',$workspace_id)
            ->where('uuid',$id)
            ->first();

        if($bill)
        {
            $bill->is_paid = 1;
            $bill->save();
        }

        r2(U.'transactions/bills','s',$_L['Data Updated']);

        break;

    default:
        echo 'action not defined';
}