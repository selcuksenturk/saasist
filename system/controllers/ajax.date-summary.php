<?php

/*
|--------------------------------------------------------------------------
| Controller
|--------------------------------------------------------------------------
|
*/

_auth();
$mdate = $routes['1'];
$mdate = $mdate/1000;
$mdate = date('Y-m-d',$mdate);
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);


if(has_access($user->roleid,'transactions','all_data')){

    $all_data = true;

}
else{
    $all_data = false;
}


$d = ORM::for_table('sys_transactions')->where('workspace_id',$user->workspace_id)->where('date',$mdate)->order_by_desc('id');

if(!$all_data)
{
    $d->where('aid',$user->id);
}

$d = $d->find_many();

$dr = ORM::for_table('sys_transactions')->where('workspace_id',$user->workspace_id)->where('date',$mdate);

if(!$all_data)
{
    $dr->where('aid',$user->id);
}

$dr = $dr->sum('dr');

if($dr == ''){
    $dr = '0.00';
}

$cr = ORM::for_table('sys_transactions')->where('workspace_id',$user->workspace_id)->where('date',$mdate);

if(!$all_data)
{
    $cr->where('aid',$user->id);
}

$cr = $cr->sum('cr');



if($cr == ''){
    $cr = '0.00';
}
?>
<div class="panel-body" style="background: #ffffff; margin-top: 10px;">
<h4><?php echo $_L['Total Income']; ?>: <?php echo $config['currency_code'] .' '. number_format($cr,2,$config['dec_point'],$config['thousands_sep']); ?></h4>
<h4><?php echo $_L['Total Expense']; ?>:  <?php echo $config['currency_code'] .' '. number_format($dr,2,$config['dec_point'],$config['thousands_sep']); ?></h4>

<hr>
<h4><?php echo $_L['All Transactions at Date']; ?>:  <?php echo date( $config['df'], strtotime($mdate)); ?></h4>
<hr>
<table class="table table-striped table-bordered table-responsive">

    <th><?php echo $_L['Account']; ?></th>
    <th><?php echo $_L['Type']; ?></th>
    <th><?php echo $_L['Category']; ?></th>
    <th class="text-right"><?php echo $_L['Amount']; ?></th>
    <th class="hidden-xs hidden-sm hidden-md"><?php echo $_L['Payer']; ?></th>
    <th class="hidden-xs hidden-sm hidden-md"><?php echo $_L['Payee']; ?></th>
    <th class="hidden-xs hidden-sm hidden-md"><?php echo $_L['Method']; ?></th>
    <th class="hidden-xs hidden-sm hidden-md"><?php echo $_L['Ref']; ?></th>
    <th><?php echo $_L['Description']; ?></th>
    <th class="text-right"><?php echo $_L['Dr']; ?></th>
    <th class="text-right"><?php echo $_L['Cr']; ?></th>
    <th class="text-right"><?php echo $_L['Balance']; ?></th>
<?php

   foreach($d as $ds){
       $cls = '';
       if(($ds['bal']) < 0){
           $cls = 'class="text-red"';
       }

       if($ds['category'] == 'Uncategorized'){
           $cat = $_L['Uncategorized'];
       }
       else{
           $cat = $ds['category'];
       }

       echo ' <tr>

        <td>'.$ds['account'].'</td>
        <td>'.ib_lan_get_line($ds['type']).'</td>
        <td>'.$cat.'</td>
        <td class="text-right">'.$config['currency_code'].' '.number_format($ds['amount'],2,$config['dec_point'],$config['thousands_sep']).'</td>
        <td class="hidden-xs hidden-sm hidden-md">'.$ds['payer'].'</td>
        <td class="hidden-xs hidden-sm hidden-md">'.$ds['payee'].'</td>
        <td class="hidden-xs hidden-sm hidden-md">'.$ds['method'].'</td>
        <td class="hidden-xs hidden-sm hidden-md">'.$ds['ref'].'</td>
        <td>'.$ds['description'].'</td>
        <td class="text-right">'.$config['currency_code'].' '.number_format($ds['dr'],2,$config['dec_point'],$config['thousands_sep']).'</td>
        <td class="text-right">'.$config['currency_code'].' '.number_format($ds['cr'],2,$config['dec_point'],$config['thousands_sep']).'</td>
        <td class="text-right"><span '.$cls.'>'.$config['currency_code'].' '.number_format($ds['bal'],2,$config['dec_point'],$config['thousands_sep']).'</span></td>

    </tr>';
   }



?>
</table>
    </div>