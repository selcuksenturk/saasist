<?php

_auth();

$ui->assign('_application_menu', 'sms');
$ui->assign('_title', 'SMS'.' - '. $config['CompanyName']);
$ui->assign('_st', 'SMS');
$action = $routes['2'];
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);
$ui->assign('user', $user);

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

        if(!isset($enabled_modules['sms']))
        {
            permissionDenied();
        }

    }

}

$ui->assign('all_modules', $all_modules);
$ui->assign('enabled_modules', $enabled_modules);

// SMS Driver

use Twilio\Rest\Client;

class RouteSmsSender
{
    var $host;
    var $port;
    /*
    * Username that is to be used for submission
    */
    var $strUserName;
    /*
    * password that is to be used along with username
    */
    var $strPassword;
    /*
    * Sender Id to be used for submitting the message
    */
    var $strSender;
    /*
    * Message content that is to be transmitted
    */
    var $strMessage;
    /*
    * Mobile No is to be transmitted.
    */
    var $strMobile;

    /*
* What type of the message that is to be sent
* <ul>
* <li>0:means plain text</li>
* <li>1:means flash</li>
* <li>2:means Unicode (Message content should be in Hex)</li>
* <li>6:means Unicode Flash (Message content should be in Hex)</li>
* </ul>
*/
    var $strMessageType;
    /*
    * Require DLR or not *
    <ul>
    * <li>0:means DLR is not Required</li>
    * <li>1:means DLR is Required</li>
    * </ul>
    */
    var $strDlr;
    private function sms__unicode($message){
        $hex1='';
        if (function_exists('iconv')) {
            $latin = @iconv('UTF-8', 'ISO-8859-1', $message);
            if (strcmp($latin, $message)) {
                $arr = unpack('H*hex', @iconv('UTF-8', 'UCS-2BE',
                    $message));
                $hex1 = strtoupper($arr['hex']);
            }
            if($hex1 ==''){
                $hex2='';
                $hex='';
                for ($i=0; $i < strlen($message); $i++)
                {
                    $hex = dechex(ord($message[$i]));
                    $len =strlen($hex);
                    $add = 4 - $len;
                    if($len < 4)
                    {
                        for($j=0;$j<$add;$j++)
                        { $hex="0".$hex;
                        }
                    }
                    $hex2.=$hex;
                }
                return $hex2;
            }
            else{
                return $hex1;

            }
        }
        else{
            print 'iconv Function Not Exists !';
        }
    } //Constructor..
    public function __construct($host,$port,$username,$password,$sender,
                            $message,$mobile, $msgtype,$dlr){
        $this->host=$host;
        $this->port=$port;
        $this->strUserName = $username;
        $this->strPassword = $password;
        $this->strSender= $sender;
        $this->strMessage=$message; //URL Encode The Message..
        $this->strMobile=$mobile;
        $this->strMessageType=$msgtype;
        $this->strDlr=$dlr;
    }
    public function Submit(){
        if($this->strMessageType=="2" || $this->strMessageType=="6") {
//Call The Function Of String To HEX.
            $this->strMessage = $this->sms__unicode($this->strMessage);
            try{
//Smpp http Url to send sms.
              //  $live_url="http://".$this->host.":".$this->port."/bulksms/bulksms?username=".
                $live_url=$this->host."/bulksms/bulksms?username=".
                    $this->strUserName."&password=".
                    $this->strPassword."&type=".
                    $this->strMessageType.
                    "&dlr=".
                    $this->strDlr.
                    "&destination=".
                    $this->strMobile.
                    "&source=".
                    $this->strSender.
                    "&message=".
                    $this->strMessage. "";

               // $parse_url=file($live_url);


                $parse_url= ib_http_request($live_url);

                return $parse_url;

            }catch(Exception $e){
                return 'Message:' .$e->getMessage();
            }
        } else
            $this->strMessage=urlencode($this->strMessage);

        try{
// http Url to send sms.
            $live_url=$this->host.":".
                $this->port."/bulksms/bulksms?username=".
                $this->strUserName.
                "&password=".
                $this->strPassword.
                "&type=".
                $this->strMessageType.
                "&dlr=".
                $this->strDlr.
                "&destination=".
                $this->strMobile.
                "&source=".
                $this->strSender.
                "&message=".
                $this->strMessage."";

          //  $parse_url=file($live_url);

            $parse_url = ib_http_request($live_url);

            return $parse_url;

        }
        catch(Exception $e){
            return 'Message:' .$e->getMessage();
        }
    }
}

function spSendSMS($to,$message,$from='',$iid=0){

    global $config,$workspace_id;

    $resp = '';


    $to = str_replace(' ','',$to);
    $to = str_replace('-','',$to);

    $sms_api_handler = $config['sms_api_handler'];

    $sms = new SMS;
    $sms->workspace_id = $workspace_id;
    $sms->sms_from = $from;
    $sms->sms_to = $to;
    $sms->sms = $message;
    $sms->iid = $iid;
    $sms->driver = $sms_api_handler;

    $sms->save();


    if(APP_STAGE == 'Demo'){

        return 'This feature is disabled in the Demo mode.';

    }


    switch ($sms_api_handler){

        case 'Twilio':

         //   $message = urlencode($message);

            $sid = $config['sms_auth_username'];
            $token = $config['sms_auth_password'];

            $client = new Client($sid, $token);

            //Use the client to do fun stuff like send text messages!
            $client->messages->create(
                $to,
                array(
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => $from,
                    // the body of the text message you'd like to send
                    'body' => $message
                )
            );

            break;


        case 'Nexmo':

            //   $message = urlencode($message);



            $apiKey = $config['sms_auth_username'];
            $apiSecret = $config['sms_auth_password'];

            $client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic($apiKey, $apiSecret));



            //Use the client to do fun stuff like send text messages!
//            $client->messages->create(
//                $to,
//                array(
//                    // A Twilio phone number you purchased at twilio.com/console
//                    'from' => $from,
//                    // the body of the text message you'd like to send
//                    'body' => $message
//                )
//            );

        try{
            $nexmoSend = $client->message()->send([
                'to' => $to,
                'from' => $from,
                'text' => $message
            ]);
            $resp = "Sent message to " . $nexmoSend['to'] . ". Balance is now " . $nexmoSend['remaining-balance'];
        } catch (Exception $e){
            $resp = $e->getMessage();
        }

            break;

        case 'Routesms':

            $api_url = $config['sms_req_url'];
            $api_username = $config['sms_auth_username'];
            $api_password = $config['sms_auth_password'];

            $obj = new RouteSmsSender($api_url,"",$api_username,$api_password,$from,$message,$to,"2","1");

            $resp = $obj->Submit ();


            break;


        case 'Custom':


            $sms_request_method = $config['sms_request_method'];
            $sms_req_url = $config['sms_req_url'];

            $sms_http_params = $config['sms_http_params'];



            $tpl = new Template($sms_http_params);
            $tpl->set('to',$to);
            $tpl->set('from',$from);
            $tpl->set('message',$message);

            $parsed = $tpl->output();

            $params_r = explode(',',$parsed);



            $params = array();



            foreach ($params_r as  $v){

              //  $params[$k] = $v;

                $p_e = explode('==',$v);

                $params[$p_e[0]] = rawurldecode($p_e[1]);

            }






        try{
            $resp = ib_http_request($sms_req_url,$sms_request_method,$params);
        } catch (Exception $e){
               $resp = $e->getMessage();
        }








            $sms->resp = $resp;

            $sms->save();




            break;


    }




    return $resp;



}



switch ($action) {
    case 'send':


        if (isset($routes['3']) AND ($routes['3'] != '')) {
            $p_cid = $routes['3'];
            $p_d = ORM::for_table('crm_accounts')->find_one($p_cid);
            if ($p_d) {
                $ui->assign('p_cid', $p_cid);
            }
        } else {
            $ui->assign('p_cid', '');
        }

        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','modal')));
        $ui->assign('xfooter', Asset::js(array('s2/js/select2.min','s2/js/i18n/'.lan(),'modal','sms/sms_counter','sms/send')));

        $c = ORM::for_table('crm_accounts')
                ->where('workspace_id',$workspace_id)
                ->select('phone')
                ->where_not_equal('phone','')
                ->select('account')
                ->select('company')
                ->select('email')
                ->order_by_desc('id')
                ->find_many();
        $ui->assign('c', $c);



        view('sms_send');

        break;

    case 'send_post':

        $from = _post('from');
        $to = _post('sms_to');
        $message = $_POST['message'];


        $resp = '';

        $alert = '';

        if($to == ''){
            $alert .= 'Please choose Phone Number for receiver <br>';
        }

        if($from == ''){
            $alert .= 'Please choose Sender Number <br>';
        }

        if($message == ''){
            $alert .= 'Message is empty <br>';
        }

        if($alert == ''){


            //  require('apps/sms/sms_driver.php');



            $resp = spSendSMS($to,$message,$from);



//            if($config['sms_req_url'] != ''){
//
//                $from = urlencode($from);
//                $to = urlencode($to);
//                $message = urlencode($message);
//                $to = str_replace(' ','',$to);
//                $to = str_replace('+','',$to);
//                $to = str_replace('(','',$to);
//                $to = str_replace(')','',$to);
//
//                $req_url = $config['sms_req_url'];
//
//                $tpl = new Template($req_url);
//                $tpl->set('to', $to);
//                $tpl->set('from', $from);
//                $tpl->set('sms', $message);
//
//                $actual_req_url = $tpl->output();
//
//                // $actual_req_url = urlencode($actual_req_url);
//
//                // i_close($actual_req_url);
//
//              //  $resp = ib_http_request($actual_req_url,$config['sms_request_method']);
//            }





            echo '<div class="alert alert-success alert-dismissible" role="alert">
  
  <strong>Success!</strong> Message Sent. Message Server Response: '.$resp.'
</div>';
        }

        else{

            echo '<div class="alert alert-danger alert-dismissible" role="alert">
 
  <strong>Error: </strong> <br> '.$alert.'
</div>';

        }



        break;



    case 'bulk':

        $c = ORM::for_table('crm_accounts')->where('workspace_id',$workspace_id)->select('phone')->where_not_equal('phone','')->select('account')->select('company')->select('email')->order_by_desc('id')->find_many();
        $ui->assign('c', $c);

        $ui->assign('xheader', Asset::css(array('multi-select/multi-select')));
        $ui->assign('xfooter', Asset::js(array('multi-select/multi-select','quicksearch','sms/sms_counter')));

//        $ui->assign('_include','bulk');
//        $ui->display('wrapper.tpl');

        view('sms_bulk');



        break;


    case 'bulk_post':


        $alert = 'Your driver does not support bulk sms';


        echo '<div class="alert alert-danger alert-dismissible" role="alert">
 
  <strong>Error: </strong> <br> '.$alert.'
</div>';


        break;


    case 'inbox':

        $paginator = Paginator::bootstrap('app_sms');
        $d = ORM::for_table('app_sms')->where('workspace_id',$workspace_id)->offset($paginator['startpoint'])->limit($paginator['limit'])->order_by_desc('req_time')->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);

        view('sms_inbox');



        break;


    case 'sent':


        $paginator = Paginator::bootstrap('app_sms');
        $d = ORM::for_table('app_sms')
                ->where('workspace_id',$workspace_id)
                ->offset($paginator['startpoint'])
                ->limit($paginator['limit'])
                ->find_many();
        $ui->assign('d',$d);
        $ui->assign('paginator',$paginator);

//        $ui->assign('_include','sent');
//        $ui->display('wrapper.tpl');

        view('sms_sent');

        break;


    case 'templates':


        $templates = SMSTemplate::where('workspace_id',$workspace_id)->get();

        view('sms_templates',[
            'templates' => $templates
        ]);


        break;


    case 'drivers':

        $d = ORM::for_table('app_sms_drivers')->where('workspace_id',$workspace_id)->find_array();
        $ui->assign('d',$d);
//        $ui->assign('_include','drivers');
//        $ui->display('wrapper.tpl');

        view('sms_drivers');


        break;


    case 'notifications':


//        $ui->assign('_include','notifications');
//        $ui->display('wrapper.tpl');

        view('sms_notifications');


        break;

    case 'delete_driver':

        $id = route(3);

        $d = ORM::for_table('app_sms_drivers')->where('workspace_id',$workspace_id)->find_one($id);

        if($d){

            $d->delete();

        }

        r2(U.'sms/init/drivers/','s','Deleted Successfully');





        break;

    case 'new_sms_driver':

//        $ui->assign('_include','new_sms_driver');
//
//        $ui->display('wrapper.tpl');


        view('sms_new_sms_driver');


        break;

    case 'new_sms_driver_step_2':

        $handler = _post('handler');

        $ui->assign('handler',$handler);

        $h_name = ucwords($handler);

        $ui->assign('h_name',$h_name);

        $ui->assign('_st', 'Configure '.$h_name);

        $l = array();





        switch ($handler){

            case 'msg91':

                $l['api_key'] = 'Authentication key';





                break;

        }


        $ui->assign('l',$l);

        view('sms_new_sms_driver_step_2');



        break;

    case 'save_sms_driver':



        $dname = _post('dname');
        $handler = _post('handler');
        $weburl = _post('weburl');
        $description = _post('description');
        $url = _post('url');
        $incoming_url = _post('incoming_url');
        $method = _post('method');
        $username = _post('username');
        $password = _post('password');
        $api_key = _post('api_key');
        $api_secret = _post('api_secret');
        $route = _post('route');
        $sender_id = _post('sender_id');
        $placeholder = _post('placeholder');
        $status = _post('status');
        $is_active = _post('is_active');


        $d = ORM::for_table('app_sms_drivers')->create();

        $d->workspace_id = $workspace_id;

        $d->dname = $dname;

        $d->handler = $handler;
        $d->weburl = $weburl;
        $d->description = $description;
        $d->url = $url;
        $d->incoming_url = $incoming_url;
        $d->method = $method;
        $d->username = $username;
        $d->password = $password;
        $d->api_key = $api_key;
        $d->api_secret = $api_secret;
        $d->route = $route;
        $d->sender_id = $sender_id;
        $d->placeholder = $placeholder;
        $d->status = $status;
        $d->is_active = $is_active;

        $d->save();



        break;


    case 'edit':

        $id = route(3);

        $template = SMSTemplate::where('workspace_id',$workspace_id)->find($id);



        if($template){
            view('sms_template_edit',[
                'template' => $template
            ]);
        }



        break;


    case 'edit_post':

        $id = _post('template_id');
        $message = _post('message');

        $template = SMSTemplate::where('workspace_id',$workspace_id)->find($id);

        if($template){
            $template->sms = $message;
            $template->save();
            echo $_L['Data Updated'];
        }


        break;

    case 'send_invoice':




        $to = _post('to');
        $from = _post('from');
        $invoice_id = _post('invoice_id');
        $message = _post('message');

        spSendSMS($to,$message,$from,$invoice_id);

        echo '<div class="alert alert-success fade in">SMS Sent!</div>';





        break;


    case 'send_quote':




        $to = _post('to');
        $from = _post('from');
       // $invoice_id = _post('invoice_id');
        $message = _post('message');

        spSendSMS($to,$message,$from);

        echo '<div class="alert alert-success fade in">SMS Sent!</div>';





        break;


    case 'settings':


        view('sms_settings');


        break;

    case 'save-sms-credentials':


        $sms_api_handler = _post('sms_api_handler');

        update_option('sms_api_handler',$sms_api_handler);

        $sms_auth_username = _post('sms_auth_username');

        update_option('sms_auth_username',$sms_auth_username);

        $sms_auth_password = _post('sms_auth_password');

        update_option('sms_auth_password',$sms_auth_password);

        $sms_sender_name = _post('sms_sender_name');

        update_option('sms_sender_name',$sms_sender_name);

        update_option('sms_req_url',_post('sms_req_url'));
        update_option('sms_request_method',_post('sms_request_method'));
        update_option('sms_http_params',$_POST['sms_http_params']);

        echo $_L['Data Updated'];



        break;


    case 's':

        is_dev();

        $t = new Schema('app_sms');
        $t->add('req_time','datetime');
        $t->add('sent_time','datetime');
        $t->add('sms_from');
        $t->add('sms_to');
        $t->add('sms');
        $t->add('driver');
        $t->add('resp');
        $t->add('status','varchar',200);
        $t->add('stype','varchar',200,'Sent');
        $t->add('cid','int',11);
        $t->add('aid','int',11);
        $t->add('company_id','int',11);
        $t->add('iid','int',11);
        $t->add('trid','int',11);
        $t->add('lid','int',11);
        $t->add('oid','int',11);
        $t->save();


        $t = new Schema('app_sms_drivers');
        $t->add('dname','varchar',200);
        $t->add('handler','varchar',200);
        $t->add('weburl','varchar',200);
        $t->add('description');
        $t->add('url','varchar',200);
        $t->add('incoming_url','varchar',200);
        $t->add('method','varchar',50);
        $t->add('username','varchar',200);
        $t->add('password','varchar',200);
        $t->add('api_key','varchar',200);
        $t->add('api_secret','varchar',200);
        $t->add('route','varchar',200);
        $t->add('sender_id','varchar',100);
        $t->add('balance','decimal','14,2');
        $t->add('placeholder');
        $t->add('status','varchar',100);
        $t->add('is_active','int',1,'0');
        $t->add_primary_data('(`id`, `dname`, `handler`, `weburl`, `description`, `url`, `incoming_url`, `method`, `username`, `password`, `api_key`, `api_secret`, `route`, `sender_id`, `balance`, `placeholder`, `status`, `is_active`) VALUES (NULL, \'custom\', \'custom\', \'http://www.example.com\', \'Your Custom Gateway\', \'http://api.example.com\', \'http://www.example.com/incoming/\', \'GET\', \'your_username\', \'your_password\', \'your_api_key\', \'your_api_secret\', \'1\', \'CloudOnex\', \'1.00\', \'{{url}}/send.php?username={{username}}&password={{password}}&from={{from}}&to={{to}}&message={{message}}\', \'Sandbox\', \'0\'), (NULL, \'test\', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, \'0\')');
        $t->save();


        add_option('sms_request_method','GET');
        add_option('sms_auth_header','');
        add_option('sms_req_url','');

        add_option('sms_notify_admin_new_deposit','0');
        add_option('sms_notify_customer_signed_up','0');
        add_option('sms_notify_customer_invoice_created','0');
        add_option('sms_notify_customer_invoice_paid','0');
        add_option('sms_notify_customer_payment_received','0');



        $t = new Schema('app_sms_templates');
        $t->add('tpl','varchar','200');
        $t->add('sms');
        $t->add('status','varchar',200);
        $t->save();



        break;




    default:
        echo 'action not defined';
}