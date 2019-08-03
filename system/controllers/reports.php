<?php
/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$ui->assign('_title', $_L['Reports'].'- '. $config['CompanyName']);
$ui->assign('_st', $_L['Reports']);
$ui->assign('_application_menu', 'reports');
$action = $routes['1'];
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);
$ui->assign('user', $user);
$mdate = date('Y-m-d');
$tdate = date('Y-m-d', strtotime('today - 30 days'));

//first day of month
$first_day_month = date('Y-m-01');
//
$this_week_start = date('Y-m-d',strtotime( 'previous sunday'));
// 30 days before
$before_30_days = date('Y-m-d', strtotime('today - 30 days'));
//this month
$month_n = date('n');

// Check which modules are enabled in this workspace
$all_modules = true;
$enabled_modules = false;

if(isset($config['plan']))
{
    $workspace_plan = Plan::find($config['plan']);

    if($workspace_plan)
    {
        $all_modules = false;
        $enabled_modules = json_decode($workspace_plan->modules, true);


    }

}

$ui->assign('all_modules', $all_modules);
$ui->assign('enabled_modules', $enabled_modules);

switch ($action) {
    case 'statement':

        if(has_access($user->roleid,'bank_n_cash','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }

        $d = ORM::for_table('sys_accounts')->where('workspace_id',$workspace_id);

        if(!$all_data)
        {
            $d->where('owner_id',$user->id);
        }

        $d = $d->find_many();



        $ui->assign('d', $d);

        $ui->assign('mdate', $mdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dp/dist/datepicker.min')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'dp/dist/datepicker.min','dp/i18n/'.$config['language'])));
        $ui->assign('xjq', '
 $("#account").select2();
 $("#cats").select2();
  $("#pmethod").select2();
  $("#payer").select2();
$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        view('statement');


        break;


    case 'statement-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $account = _post('account');
        $stype = _post('stype');
        $d = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id);
        $d->where('account', $account);
        if($stype == 'credit'){
            $d->where('dr', '0.00');
        }
        elseif($stype == 'debit'){
            $d->where('cr', '0.00');
        }
        else{

        }
        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);
        $ui->assign('account',$account);
        $ui->assign('stype',$stype);

        view('statement-view');
        break;

    case 'by-date':

        if(has_access($user->roleid,'transactions','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }


        $d = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where('date',$mdate)->order_by_desc('id');

        if(!$all_data)
        {
            $d->where('aid',$user->id);
        }

        $d = $d->find_many();

        $dr = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where('date',$mdate);

        if(!$all_data)
        {
            $dr->where('aid',$user->id);
        }

        $dr = $dr->sum('dr');

        if($dr == ''){
            $dr = '0.00';
        }

        $cr = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where('date',$mdate);

        if(!$all_data)
        {
            $cr->where('aid',$user->id);
        }

        $cr = $cr->sum('cr');



        if($cr == ''){
            $cr = '0.00';
        }
        $ui->assign('d',$d);
        $ui->assign('dr',$dr);
        $ui->assign('cr',$cr);


        $ui->assign('mdate', $mdate);

        if(Ib_I18n::get_code($config['language']) != 'en'){
            $dp_lan = '<script type="text/javascript" src="' . $_theme . '/lib/datepaginator/locale/'.Ib_I18n::get_code($config['language']).'.js"></script>';
            // $x_lan = '$.fn.datepicker.defaults.language = \''.Ib_I18n::get_code($config['language']).'\';';
            $x_lan = '';
        }
        else{

            $dp_lan = '';
            $x_lan = '';
        }

        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . APP_URL . '/ui/lib/datepaginator/bootstrap-datepaginator.min.css"/>
<link rel="stylesheet" type="text/css" href="' . APP_URL . '/ui/lib/datepaginator/bootstrap-datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . APP_URL . '/ui/lib/datepaginator/bootstrap-datepicker.js"></script>
'.$dp_lan.'
<script type="text/javascript" src="' . APP_URL . '/ui/lib/datepaginator/bootstrap-datepaginator.min.js"></script>
');

        $mdf = Ib_Internal::get_moment_format($config['df']);
        $today = date('Y-m-d');

        $ui->assign('xjq', $x_lan. '

  $(\'#dpx\').datepaginator(
  {

    selectedDate: \''.$today.'\',
    selectedDateFormat:  \'YYYY-MM-DD\',
    textSelected:  "dddd<br/>'.$mdf.'"
}
  );
   $(\'#dpx\').on(\'selectedDateChanged\', function(event, date) {
  // Your logic goes here
 // alert(date);
 $( "#result" ).html( "<h3>'.$_L['Loading'].'.....</h3>" );
 // $(\'#tdate\').text(moment(date).format("dddd, '.$mdf.'"));
 $.get( "'.U.'ajax.date-summary/" + date, function( data ) {
     $( "#result" ).html( data );
     //alert(date);
     // console.log(date);
 });
});



 ');
        view('reports-by-date');


        break;

    case 'income':

        if(has_access($user->roleid,'transactions','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }

        $d = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where('type','Income')->limit(20)->order_by_desc('id');

        if(!$all_data)
        {
            $d->where('aid',$user->id);
        }

        $d = $d->find_many();

        $ui->assign('d',$d);

        $a = ORM::for_table('sys_transactions');

        if(!$all_data)
        {
            $a->where('aid',$user->id);
        }

        $a = $a->where('workspace_id',$workspace_id)->sum('cr');


        if($a == ''){
            $a = '0.00';
        }
        $ui->assign('a',$a);

        $m = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where('type','Income')->where_gte('date',$first_day_month)->where_lte('date',$mdate);

        if(!$all_data)
        {
            $m->where('aid',$user->id);
        }

        $m = $m->sum('cr');

        if($m == ''){
            $m = '0.00';
        }
        $ui->assign('m',$m);

        $w = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where_gte('date',$this_week_start)->where_lte('date',$mdate);

        if(!$all_data)
        {
            $w->where('aid',$user->id);
        }

        $w = $w->sum('cr');

        if($w == ''){
            $w = '0.00';
        }


        $ui->assign('w',$w);

        $m3 = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where_gte('date',$before_30_days)->where_lte('date',$mdate);

        if(!$all_data)
        {
            $m3->where('aid',$user->id);
        }

        $m3 = $m3->sum('cr');

        if($m3 == ''){
            $m3 = '0.00';
        }
        $ui->assign('m3',$m3);

        $ui->assign('mdate', $mdate);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';

        $m_data = array();

        $i = 0;

        for ($m=0; $m<=$till; $m++) {

            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")));

            if(!$all_data)
            {
                $cal->where('aid',$user->id);
            }

            $cal = $cal->sum('cr');
            $gstring .= '["'.ib_lan_get_line($mnth).'",'.$cal.'], ';

            $m_data[$i]['month'] = ib_lan_get_line($mnth);
            $m_data[$i]['value'] = $cal;

            $i++;

        }
        $gstring = rtrim($gstring,',');



        $currencies = Currency::where('workspace_id',$workspace_id)->get();

        $latest_income = Transaction::where('workspace_id',$workspace_id)->where('type','Income')->orderBy('date', 'desc')->take(20);

        if(!$all_data)
        {
            $latest_income->where('aid',$user->id);
        }

        $latest_income = $latest_income->get();



        $incomes = Transaction::where('workspace_id',$workspace_id)->where('type','Income');
        if(!$all_data)
        {
            $incomes->where('aid',$user->id);
        }
        $incomes = $incomes->get();

        $collection = collect($incomes);

        $cats = $collection->unique('category');

        $cat_data = array();

        $i =0;

        foreach ($cats as $cat){

            $cat_data[$i]['category'] = $cat->category;

            $val = Transaction::where('workspace_id',$workspace_id)->where('Type','Income')->where('category',$cat->category);
            if(!$all_data)
            {
                $val->where('aid',$user->id);
            }
            $val = $val->sum('amount');
            $cat_data[$i]['value'] = $val;

            $i++;
        }



        $total_income_all_time = Transaction::totalAmount('Income','','all',$all_data);

        view('reports_income',[
            'currencies' => $currencies,
            'd' => $latest_income,
            'm_data' => $m_data,
            'cat_data' => $cat_data,
            'total_income_all_time' => $total_income_all_time,
            'all_data' => $all_data
        ]);


        break;


    case 'expense':

        if(has_access($user->roleid,'transactions','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }


        $d = ORM::for_table('sys_transactions')->where('type','Expense')->limit(20)->order_by_desc('id')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('d',$d);
        $a = ORM::for_table('sys_transactions')->where('workspace_id',$workspace_id)->sum('dr');
        if($a == ''){
            $a = '0.00';
        }
        $ui->assign('a',$a);
        $m = ORM::for_table('sys_transactions')->where('type','Expense')->where_gte('date',$first_day_month)->where_lte('date',$mdate)->where('workspace_id',$workspace_id)->sum('dr');
        if($m == ''){
            $m = '0.00';
        }
        $ui->assign('m',$m);

        $w = ORM::for_table('sys_transactions')->where_gte('date',$this_week_start)->where_lte('date',$mdate)->where('workspace_id',$workspace_id)->sum('dr');
        if($w == ''){
            $w = '0.00';
        }
        $ui->assign('w',$w);

        $m3 = ORM::for_table('sys_transactions')->where_gte('date',$before_30_days)->where_lte('date',$mdate)->where('workspace_id',$workspace_id)->sum('dr');
        if($m3 == ''){
            $m3 = '0.00';
        }
        $ui->assign('m3',$m3);

        $ui->assign('mdate', $mdate);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';

        $m_data = array();

        $i = 0;

        for ($m=0; $m<=$till; $m++) {

            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")));

            if(!$all_data)
            {
                $cal->where('aid',$user->id);
            }

            $cal = $cal->where('workspace_id',$workspace_id)->sum('dr');

            $gstring .= '["'.ib_lan_get_line($mnth).'",'.$cal.'], ';

            $m_data[$i]['month'] = ib_lan_get_line($mnth);
            $m_data[$i]['value'] = $cal;

            $i++;

        }
        $gstring = rtrim($gstring,',');


        $currencies = Currency::where('workspace_id',$workspace_id)->get();

        $latest_expense = Transaction::where('workspace_id',$workspace_id)->where('type','Expense')->orderBy('date', 'desc')->take(20);

        if(!$all_data)
        {
            $latest_expense->where('aid',$user->id);
        }

        $latest_expense = $latest_expense->get();

        $incomes = Transaction::where('workspace_id',$workspace_id)->where('type','Expense');

        if(!$all_data)
        {
            $incomes->where('aid',$user->id);
        }

        $incomes = $incomes->get();

        $collection = collect($incomes);

        $cats = $collection->unique('category');

        $cat_data = array();

        $i =0;

        foreach ($cats as $cat){

            $cat_data[$i]['category'] = $cat->category;

            $val = Transaction::where('workspace_id',$workspace_id)->where('Type','Expense')->where('category',$cat->category);

            if(!$all_data)
            {
                $val->where('aid',$user->id);
            }

            $val = $val->sum('amount');

            $cat_data[$i]['value'] = $val;

            $i++;
        }



        $total_expense_all_time = Transaction::totalAmount('Expense','','all',$all_data);

        view('reports_expense',[
            'currencies' => $currencies,
            'd' => $latest_expense,
            'm_data' => $m_data,
            'cat_data' => $cat_data,
            'total_expense_all_time' => $total_expense_all_time,
            'all_data' => $all_data
        ]);


        break;


    case 'income-vs-expense':

        if(has_access($user->roleid,'transactions','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }

        $ai = ORM::for_table('sys_transactions')
                 ->where('workspace_id',$workspace_id);

        if(!$all_data)
        {
            $ai->where('aid',$user->id);
        }

        $ai = $ai->sum('cr');

        if($ai == ''){
            $ai = '0.00';
        }
        $ui->assign('ai',$ai);

        $mi = ORM::for_table('sys_transactions')
                 ->where('workspace_id',$workspace_id)
                 ->where_gte('date',$first_day_month)
                 ->where_lte('date',$mdate);

        if(!$all_data)
        {
            $mi->where('aid',$user->id);
        }

        $mi = $mi->sum('cr');

        if($mi == ''){
            $mi = '0.00';
        }
        $ui->assign('mi',$mi);

        $wi = ORM::for_table('sys_transactions')
                 ->where('workspace_id',$workspace_id)
                 ->where_gte('date',$this_week_start)
                 ->where_lte('date',$mdate);

        if(!$all_data)
        {
            $wi->where('aid',$user->id);
        }

        $wi = $wi->sum('cr');

        if($wi == ''){
            $wi = '0.00';
        }
        $ui->assign('wi',$wi);

        $m3i = ORM::for_table('sys_transactions')
                  ->where('workspace_id',$workspace_id)
                  ->where_gte('date',$before_30_days)
                  ->where_lte('date',$mdate);

        if(!$all_data)
        {
            $m3i->where('aid',$user->id);
        }

        $m3i = $m3i->sum('cr');

        if($m3i == ''){
            $m3i = '0.00';
        }


        $ui->assign('m3i',$m3i);

        $ae = ORM::for_table('sys_transactions');

        if(!$all_data)
        {
            $ae->where('aid',$user->id);
        }

        $ae = $ae->where('workspace_id',$workspace_id)->sum('dr');

        if($ae == ''){
            $ae = '0.00';
        }
        $ui->assign('ae',$ae);

        $me = ORM::for_table('sys_transactions')
                 ->where('workspace_id',$workspace_id)
                 ->where_gte('date',$first_day_month)
                 ->where_lte('date',$mdate);

        if(!$all_data)
        {
            $me->where('aid',$user->id);
        }

        $me = $me->sum('dr');

        if($me == ''){
            $me = '0.00';
        }
        $ui->assign('me',$me);


        $ui->assign('mdate', $mdate);
        $aime = $ai-$ae;
        $ui->assign('aime', $aime);
        $mime = $mi-$me;
        $ui->assign('mime', $mime);
//generate graph string
        $array = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $till = $month_n - 1;
        $gstring = '';
        $egstring = '';
        for ($m=0; $m<=$till; $m++) {
            $mnth = $array[$m];
            $cal = ORM::for_table('sys_transactions')
                      ->where('workspace_id',$workspace_id)
                      ->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))
                      ->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")));

            if(!$all_data)
            {
                $cal->where('aid',$user->id);
            }

            $cal = $cal->sum('dr');

            if($cal == ''){
                $cal = '0';
            }
            $egstring .= '["'.$m.'",'.$cal.'], ';
            $cal = ORM::for_table('sys_transactions')
                      ->where('workspace_id',$workspace_id)
                      ->where_gte('date',date('Y-m-d',strtotime("first day of $mnth")))
                      ->where_lte('date',date('Y-m-d',strtotime("last day of $mnth")));

            if(!$all_data)
            {
                $cal->where('aid',$user->id);
            }

            $cal = $cal->sum('cr');

            if($cal == ''){
                $cal = '0';
            }
            $gstring .= '["'.$m.'",'.$cal.'], ';

        }
        $gstring = rtrim($gstring,',');



        $ui->assign('xjq', '


$(\'.amount\').autoNumeric(\'init\', {

   
    dGroup: ' . $config['thousand_separator_placement'] . ',
    aPad: ' . $config['currency_decimal_digits'] . ',
    pSign: \'' . $config['currency_symbol_position'] . '\',
    aDec: \'' . $config['dec_point'] . '\',
    aSep: \'' . $config['thousands_sep'] . '\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });
		var d1 = [ '.$gstring.' ];
		var d2 = [ '.$egstring.' ];



		$.plot("#placeholder", [{
			data: d1,
			lines: { show: true, fill: true }
		},  {
			data: d2,
			lines: { show: true, fill: true }
		}]);

 ');
        view('reports-income-vs-expense');


        break;

    case 'categories':

        $d = ORM::for_table('sys_cats')->find_many();
        $ui->assign('d', $d);

        $ui->assign('mdate', $mdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepicker/css/datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepicker/js/bootstrap-datepicker.js"></script>
');
        $ui->assign('xjq', '

 $("#cat").select2();

$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        view('reports-categories');


        break;


    case 'category-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $cat = _post('cat');

        $d = ORM::for_table('sys_transactions');
        $d->where('workspace_id',$workspace_id)->where('category', $cat);

        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);


        view('report-common');
        break;

    case 'payees':

        $d = ORM::for_table('sys_payee')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('d', $d);

        $ui->assign('mdate', $mdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepicker/css/datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepicker/js/bootstrap-datepicker.js"></script>
');
        $ui->assign('xjq', '

 $("#payee").select2();

$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        view('reports-payees');


        break;


    case 'payees-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $payee = _post('payee');

        $d = ORM::for_table('sys_transactions');
        $d->where('workspace_id',$workspace_id)->where('payee', $payee);

        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);


        view('report-common');
        break;

    case 'payers':

        $d = ORM::for_table('sys_payers')->where('workspace_id',$workspace_id)->find_many();
        $ui->assign('d', $d);

        $ui->assign('mdate', $mdate);
        $ui->assign('tdate', $tdate);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="' . $_theme . '/lib/datepicker/css/datepicker.css"/>
');
        $ui->assign('xfooter', '
<script type="text/javascript" src="' . $_theme . '/lib/select2/select2.min.js"></script>
<script type="text/javascript" src="' . $_theme . '/lib/datepicker/js/bootstrap-datepicker.js"></script>
');
        $ui->assign('xjq', '

 $("#payer").select2();

$(\'#dp1\').datepicker({
				format: \'yyyy-mm-dd\'
			});
			$(\'#dp2\').datepicker({
				format: \'yyyy-mm-dd\'
			});

 ');
        view('reports-payers');


        break;


    case 'payer-view':

        $fdate = _post('fdate');
        $tdate = _post('tdate');
        $payer = _post('payer');

        $d = ORM::for_table('sys_transactions');
        $d->where('workspace_id',$workspace_id)->where('payer', $payer);

        $d->where_gte('date', $fdate);
        $d->where_lte('date', $tdate);
        $d->order_by_desc('id');
        $x =  $d->find_many();

        $ui->assign('d',$x);
        $ui->assign('fdate',$fdate);
        $ui->assign('tdate',$tdate);


        view('report-common');
        break;





    case 'cats':

        $ui->assign('xheader', '
<link href="'.APP_URL.'/ui/lib/c3/c3.min.css" rel="stylesheet" type="text/css">
');

        $ui->assign('xfooter', '
<script type="text/javascript" src="'.APP_URL.'/ui/lib/c3/d3.min.js"></script>
<script type="text/javascript" src="'.APP_URL.'/ui/lib/c3/c3.min.js"></script>

');

        $ui->assign('xjq', '

var chart = c3.generate({
    bindto: \'#chart\',
    data: {
	columns: [

		[\''.$_L['Income'].'\', \'0\','.$d1i.','.$d2i.', '.$d3i.', '.$d4i.', '.$d5i.', '.$d6i.', '.$d7i.', '.$d8i.', '.$d9i.', '.$d10i.', '.$d11i.', '.$d12i.', '.$d13i.', '.$d14i.', '.$d15i.', '.$d16i.', '.$d17i.', '.$d18i.', '.$d19i.', '.$d20i.', '.$d21i.', '.$d22i.', '.$d23i.', '.$d24i.', '.$d25i.', '.$d26i.', '.$d27i.', '.$d28i.', '.$d29i.', '.$d30i.', '.$d31i.'],
		[\''.$_L['Expense'].'\', \'0\','.$d1e.','.$d2e.', '.$d3e.', '.$d4e.', '.$d5e.', '.$d6e.', '.$d7e.', '.$d8e.', '.$d9e.', '.$d10e.', '.$d11e.', '.$d12e.', '.$d13e.', '.$d14e.', '.$d15e.', '.$d16e.', '.$d17e.', '.$d18e.', '.$d19e.', '.$d20e.', '.$d21e.', '.$d22e.', '.$d23e.', '.$d24e.', '.$d25e.', '.$d26e.', '.$d27e.', '.$d28e.', '.$d29e.', '.$d30e.', '.$d31e.']
	],
        type: \'area-spline\',
         colors: {
            '.$_L['Income'].': \'#23c6c8\',
            '.$_L['Expense'].': \'#ed5565\'
        }
    }

});

var dchart = c3.generate({
    bindto: \'#dchart\',
    data: {
        columns: [
            [\''.$_L['Income'].'\', '.$mi.'],
            [\''.$_L['Expense'].'\', '.$me.'],
        ],
        type : \'donut\',
        colors: {
            '.$_L['Income'].': \'#23c6c8\',
            '.$_L['Expense'].': \'#ed5565\'
        }
    },
    donut: {
        title: "'.$_L['Income_Vs_Expense'].'"
    }
});

    $("#set_goal").click(function (e) {
        e.preventDefault();

        bootbox.prompt({
            title: "'.$_L['Set New Goal for Net Worth'].'",
            value: "'.$goal.'",
            buttons: {
        \'cancel\': {
            label: \''.$_L['Cancel'].'\'
        },
        \'confirm\': {
            label: \''.$_L['OK'].'\'
        }
    },
            callback: function(result) {
                if (result === null) {

                } else {
                   // alert(result);
                     $.post( "'.U.'settings/networth_goal/", { goal: result })
        .done(function( data ) {
            location.reload();
        });
                }
            }
        });

    });

 ');


        break;



    case 'sales':


        if(has_access($user->roleid,'transactions','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }


        $ui->assign('xheader',Asset::css(array('dt/dt')).'<style>div.dataTables_wrapper div.dataTables_filter {
     text-align: left; 
}</style>');
        $ui->assign('xfooter',Asset::js(array('dt/dt','reports/sales')));

        if($all_data)
        {
            $invoice_items = ORM::for_table('sys_invoiceitems')->where('workspace_id',$workspace_id)->find_array();
        }
        else{
            $invoice_ids = Invoice::where('workspace_id',$workspace_id)->where('aid',$user->id)->select('id')->get()->pluck('id')->toArray();
            $invoice_items = InvoiceItem::where('workspace_id',$workspace_id)->whereIn('id',$invoice_ids)->get();
        }





        $ui->assign('invoice_items',$invoice_items);


        //


        $mdate = date('Y-m-d');
        $ui->assign('mdate', $mdate);

        $lang_code = Ib_I18n::get_code($config['language']);

        $ui->assign('jsvar', '
        _L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 var ib_lang = \''.$lang_code.'\';
var ib_rtl = false;
var ib_calendar_first_day = 0;
var ib_date_format_picker = \''.ib_js_date_format($config['df'],'picker').'\';
var ib_date_format_moment = \''.ib_js_date_format($config['df']).'\';
 ');


        $ui->assign('xheader',Asset::css(array('fc/fc','fc/fc_ibilling')));
        $ui->assign('xfooter',Asset::js(array('fc/fc','fc/lang/'.$lang_code)));


    //


        view('reports_sales');


        break;

    case 'sales_invoice_calendar':


        if(has_access($user->roleid,'transactions','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }

        header('Content-Type: application/json');



        $start = _get('start').' 00:00:00';
        $end = _get('end').' 23:59:00';



        $calendar_data = ORM::for_table('sys_invoices')->where('workspace_id',$workspace_id)->where_gte('duedate',$start)->where_lte('duedate',$end)
            ->select('id')
            ->select('account')
            ->select('duedate')
            ->select('invoicenum')
            ->select('cn')
            ->select('total')
            ->select('id','eventid')
            ->select('status');

        if(!$all_data)
        {
            $calendar_data->where('aid',$user->id);
        }

        $calendar_data = $calendar_data->find_array();

        $events = [];

        $i = 0;
        foreach ($calendar_data as $event)
        {
            if($event['cn'] == '')
            {
                $inv_n = $event['id'];
            }
            else{
                $inv_n = $event['cn'];
            }
            $events[$i]['eventid'] = $event['id'];
            $events[$i]['title'] = '#'.$event['invoicenum'].$inv_n.' [ Amount: '.$event['total'].' ]';
            $events[$i]['start'] = $event['duedate'];
           // $events[$i]['_tooltip'] = $event['account'];



            $i++;
        }


        echo json_encode($events);


        break;


    case 'invoices':

        if(has_access($user->roleid,'sales','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }

        $paginator = array();

        $mode_css = '';
        $mode_js = '';
        $view_type = 'default';







        $view_type = 'filter';

        $mode_css = Asset::css('footable/css/footable.core.min');

        $mode_js = Asset::js(array('numeric','footable/js/footable.all.min','contacts/mode_search'));


        $f = ORM::for_table('sys_invoices')->where('workspace_id',$workspace_id);

        if(route(3) != ''){

            $s_f = route(3);

            if($s_f == 'paid'){
                $f->where('status','Paid');
            }
            elseif ($s_f == 'unpaid'){
                $f->where('status','Unpaid');
            }
            elseif ($s_f == 'partially_paid'){
                $f->where('status','Partially Paid');
            }
            elseif ($s_f == 'cancelled'){
                $f->where('status','Cancelled');
            }
            else{

            }

        }

        if(!$all_data)
        {
            $f->where('aid',$user->id);
        }

        $d = $f->order_by_desc('id')->limit(50)->find_many();

        $paginator['contents'] = '';









        $ui->assign('_st', $_L['Invoices'].'<div class="btn-group pull-right" style="padding-right: 10px;">
  <a class="btn btn-success btn-xs" href="'.U.'invoices/add/'.'" style="box-shadow: none;"><i class="fa fa-plus"></i></a>
  <a class="btn btn-primary btn-xs" href="'.U.'invoices/add/'.'" style="box-shadow: none;"><i class="fa fa-repeat"></i></a>
  <a class="btn btn-success btn-xs" href="'.U.'invoices/export_csv/'.'" style="box-shadow: none;"><i class="fa fa-download"></i></a>
</div>');

        $ui->assign('xheader', $mode_css);
        $ui->assign('xfooter', $mode_js);
        $ui->assign('view_type', $view_type);

        $ui->assign('d', $d);
        $ui->assign('paginator', $paginator);
        $ui->assign('xjq', '
         $(\'.amount\').autoNumeric(\'init\', {

   
    dGroup: '.$config['thousand_separator_placement'].',
    aPad: '.$config['currency_decimal_digits'].',
    pSign: \''.$config['currency_symbol_position'].'\',
    aDec: \''.$config['dec_point'].'\',
    aSep: \''.$config['thousands_sep'].'\',
    vMax: \'9999999999999999.00\',
                vMin: \'-9999999999999999.00\'

    });
$(".cdelete").click(function (e) {
        e.preventDefault();
        var id = this.id;
        bootbox.confirm("'.$_L['are_you_sure'].'", function(result) {
           if(result){
               var _url = $("#_url").val();
               window.location.href = _url + "delete/invoice/" + id;
           }
        });
    });

$(\'[data-toggle="tooltip"]\').tooltip();

 ');


        $last_12_months = lastTwelveMonths();

        $m = array();

        foreach ($last_12_months as $month){
            //  echo date('Y-m-d', strtotime($month)).' ';

            $first_day = date('Y-m-d', strtotime($month));
            $last_day = date('Y-m-t', strtotime($month));

            $m['display'][] = $month;
            $t = Invoice::where('status','Paid')
                        ->where('workspace_id',$workspace_id)
                        ->whereBetween('datepaid',array($first_day,$last_day));

            if(!$all_data)
            {
                $t = $t->where('aid',$user->id);
            }

            $m['data'][] = $t->sum('total');

        }


        if($all_data)
        {
            $total_invoice = Invoice::where('workspace_id',$workspace_id)->count();
        }
        else{
            $total_invoice = Invoice::where('workspace_id',$workspace_id)->where('aid',$user->id)->count();
        }

        $total_invoice_items = InvoiceItem::where('workspace_id',$workspace_id)->sum('qty');



        if($all_data)
        {
            $total_invoice_amount = Invoice::where('workspace_id',$workspace_id)->sum('total');
        }
        else{
            $total_invoice_amount = Invoice::where('workspace_id',$workspace_id)->where('aid',$user->id)->sum('total');
        }

        $total_invoice_amount = ib_money_format($total_invoice_amount,$config);

        view('reports_invoices',[
            'm' => $m,
            'total_invoice_items' => $total_invoice_items,
            'total_invoice_amount' => $total_invoice_amount,
            'total_invoice' => $total_invoice,
            'all_data' => $all_data
        ]);


        break;



    case 'invoices_expense':

        if(has_access($user->roleid,'transactions','all_data')){

            $all_data = true;

        }
        else{
            $all_data = false;
        }

        $last_12_months = lastTwelveMonths();

        $m = array();

        foreach ($last_12_months as $month){


            $first_day = date('Y-m-d', strtotime($month));
            $last_day = date('Y-m-t', strtotime($month));

            $m['display'][] = $month;

            $invoice_total = Invoice::where('workspace_id',$workspace_id)->whereBetween('date',array($first_day,$last_day));

            if($all_data)
            {
                $invoice_total = $invoice_total->where('aid',$user->id);
            }

            $m['invoice_total'][] = $invoice_total->sum('total');

            $invoice_paid = Invoice::where('workspace_id',$workspace_id)->where('status','Paid')->whereBetween('datepaid',array($first_day,$last_day));

            if(!$all_data)
            {
                $invoice_paid->where('aid',$user->id);
            }

            $m['invoice_paid'][] = $invoice_paid->sum('total');

            $expense_total  = Transaction::where('workspace_id',$workspace_id)->where('type','Expense')->whereBetween('date',array($first_day,$last_day));

            if(!$all_data)
            {
                $expense_total->where('aid',$user->id);
            }

            $m['expense_total'][] = $expense_total->sum('amount');

            $expense_type_1 = Transaction::where('workspace_id',$workspace_id)->where('type','Expense')->where('sub_type',$config['expense_type_1'])->whereBetween('date',array($first_day,$last_day));

            if(!$all_data)
            {
                $expense_type_1 = $expense_type_1->where('aid',$user->id);
            }

            $m['expense_type_1'][] = $expense_type_1->sum('amount');

            $expense_type_2 = Transaction::where('workspace_id',$workspace_id)->where('type','Expense')->where('sub_type',$config['expense_type_2'])->whereBetween('date',array($first_day,$last_day));

            if(!$all_data)
            {
                $expense_type_2 = $expense_type_2->where('aid',$user->id);
            }

            $m['expense_type_2'][] = $expense_type_2->sum('amount');


        }

        view('reports_invoices_expense',[
            'm' => $m,
        ]);

        break;


//    case 'tax':
//
//        view('reports_tax',[
//            'm' => $m,
//        ]);
//
//
//        break;



    default:
        echo 'action not defined';
}
