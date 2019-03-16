<?php

$ui->assign('_application_menu', 'support');
$ui->assign('_title', 'Tickets'.' - '. $config['CompanyName']);
$ui->assign('_st', $_L['Tickets']);
$user = User::_info();
$workspace_id = $user->workspace_id;
$workspace = Workspace::find($workspace_id);
$ui->assign('workspace', $workspace);

$ui->assign('user', $user);

$action = route(2);

switch ($action){


    case 'departments':

        $ui->assign('xheader', Asset::css(array('modal')));

        $ui->assign('xfooter',
            Asset::js(array('modal','tickets/departments'))
        );

        $ds = ORM::for_table('sys_ticketdepartments')
            ->where('workspace_id',$workspace_id)
            ->order_by_asc('sorder')
            ->find_array();

        $ui->assign('ds',$ds);

        view('tickets_departments');


        break;


    case 'departments_post':

        $msg = '';

        $dname = _post('department_name');
        $email = _post('email');
        //  $description = $_POST['description'];

        if($dname == ''){
            $msg .= 'Department Name is Required';
        }

        if($email != '' && Validator::Email($email) != true){

            $msg .= 'Invalid Email Address';

        }

        if($msg == ''){
            $d = ORM::for_table('sys_ticketdepartments')->create();
            $d->workspace_id = $workspace_id;
            $d->dname = $dname;
            $d->email = $email;
            $d->hidden = _post('hidden','0');
            $d->host = _post('host');
            $d->port = _post('port');
            $d->username = $email;
            $d->password = _post('password');
            $d->encryption = _post('encryption','no');
            $d->delete_after_import = _post('delete_after_import','0');
            $d->sorder = 1;
            $d->save();

            _msglog('s',$_L['Department added successfully']);

            echo $d->id();
        }
        else{
            echo $msg;
        }

        break;


    case 'delete_department':

        $id = route(3);

        $id = str_replace('d','',$id);

        $d = ORM::for_table('sys_ticketdepartments')->where('workspace_id',$workspace_id)->find_one($id);

        if($d){

            $d->delete();

            r2(U.'tickets/admin/departments/','s','Deleted Successfully');

        }


        break;

    case 'edit_department':

        $id = route(3);

        $id = str_replace('e','',$id);

        $d = ORM::for_table('sys_ticketdepartments')->where('workspace_id',$workspace_id)->find_one($id);

        if($d){

            echo '<form id="edit_form"><div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Edit Department</h4>
    </div>
    <div class="modal-body">
        <div class="row">



           <div class="form-group">
                            <label for="department_name">Department Name</label>
                            <input type="text" name="department_name" class="form-control" id="department_name" value="'.$d->dname.'">
                        </div>



                        <div class="form-group">
                            <label for="email">Default Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="'.$d->email.'">
                        </div>

                        <div class="form-group">
                            <label for="host">IMAP Host</label>
                            <input type="text" class="form-control" id="host" name="host" value="'.$d->host.'">
                        </div>

                        <div class="form-group">
                            <label for="port">IMAP Port</label>
                            <input type="text" class="form-control" id="port" name="port" value="'.$d->port.'">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="'.$d->password.'">
                        </div>

                        <div class="form-group">
                            <label for="encryption">Encryption</label>
                            <label class="radio-inline">
                                <input type="radio" name="encryption" value="tls" '.(($d->encryption == 'tls')?'checked':"").'> TLS
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="encryption" value="ssl" '.(($d->encryption == 'ssl')?'checked':"").'> SSL
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="encryption" value="no" '.(($d->encryption == '')?'checked':"").'> No Encryption
                            </label>
                        </div>

                        <hr>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"  name="hidden" id="hidden" value="1" '.(($d->hidden == '1')?'checked':"").'> Hide from client?
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="delete_after_import" id="delete_after_import" value="1" '.(($d->delete_after_import == '1')?'checked':"").'> Delete mail after import?
                                </label>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <button class="btn btn-primary test_imap">Test IMAP Connection</button>


        </div>
    </div>
    <div class="modal-footer">
    <input type="hidden" name="edit_dep" id="edit_dep" value="'.$d->id.'">
        <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
        <button type="button" id="btn_modal_edit_action" class="btn btn-primary edit_submit">Save</button>

    </div></form>';

        }


        break;

    case 'departments_edit':

        $msg = '';

        $edit_dep = _post('edit_dep');

        $d = ORM::for_table('sys_ticketdepartments')->where('workspace_id',$workspace_id)->find_one($edit_dep);

        if($d){
            $dname = _post('department_name');
            $email = _post('email');


            if($dname == ''){
                $msg .= 'Department Name is Required';
            }

            if($email != '' && Validator::Email($email) != true){

                $msg .= 'Invalid Email Address';

            }

            if($msg == ''){
                $d->dname = $dname;

                $d->email = $email;
                $d->hidden = _post('hidden','0');
                $d->host = _post('host');
                $d->port = _post('port');
                $d->username = $email;
                $d->password = _post('password');
                $d->encryption = _post('encryption','no');
                $d->delete_after_import = _post('delete_after_import','0');
                $d->save();

                _msglog('s',$_L['Data Updated']);

                echo $edit_dep;
            }
            else{
                echo $msg;
            }
        }
        else{
            echo $edit_dep.'dd';
        }



        break;

    case 'departments_reorder':

        $d = ORM::for_table('sys_ticketdepartments')->order_by_asc('sorder')->where('workspace_id',$workspace_id)->find_array();
        $ui->assign('ritem','Support Ticket Departments');
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('display_name','dname');
        $ui->assign('xjq', Reorder::js('sys_ticketdepartments'));
        $ui->display('reorder.tpl');



        break;

    case 'predefined_replies':

        $ui->assign('xheader', Asset::css(array('modal','redactor/redactor')));

        $ui->assign('xfooter',
            Asset::js(array('modal','redactor/redactor.min'))
        );

        $ui->assign('replies',db_find_array('sys_canned_responses',array('id','title'),'asc:sorder'));

        view('tickets_predefined_replies');




        break;

    case 'predefined_replies_post':


        $data = ib_get_posted_data();

        $ret = Tickets::addPredefinedReply($data);

        if($ret['success'] == 'Yes'){
            echo $ret['id'];
        }
        else{
            echo $ret['msg'];
        }





        break;


    case 'predefined_replies_reorder':

        $d = ORM::for_table('sys_canned_responses')->where('workspace_id',$workspace_id)->order_by_asc('sorder')->find_array();
        $ui->assign('ritem','Predefined Replies');
        $ui->assign('d',$d);
        $ui->assign('xheader', '
<link rel="stylesheet" type="text/css" href="' . $_theme . '/css/liststyle.css"/>
');
        $ui->assign('display_name','title');
        $ui->assign('xjq', Reorder::js('sys_canned_responses'));
        $ui->display('reorder.tpl');

        break;


    case 'predefined_replies_delete':

        $id = route(3);

        $id = str_replace('d','',$id);


        Tickets::deletePredefinedReply($id);

        r2(U.'tickets/admin/predefined_replies/','s','Deleted Successfully');



        break;

    case 'predefined_reply_edit':



        break;

    case 'create':

        if (isset($routes['3']) AND ($routes['3'] != '')) {
            $p_cid = $routes['3'];
            $p_d = ORM::for_table('crm_accounts')->where('workspace_id',$workspace_id)->find_one($p_cid);
            if ($p_d) {
                $ui->assign('p_cid', $p_cid);
            }
        } else {
            $ui->assign('p_cid', '');
        }

        $customers = ORM::for_table('crm_accounts')->select('id')->select('account')->select('company')->select('email')->order_by_desc('id')->where('workspace_id',$workspace_id)->find_array();
        $ui->assign('customers', $customers);

        $ui->assign('xheader', Asset::css(array('s2/css/select2.min','dropzone/dropzone','modal')));

        $ui->assign('xfooter',
            Asset::js(array('modal','dropzone/dropzone','s2/js/select2.min','s2/js/i18n/'.lan(),'tinymce/tinymce.min','js/editor','tickets/admin_open'))
        );

        $ui->assign('jsvar','var files = [];');

        $deps = ORM::for_table('sys_ticketdepartments')->order_by_asc('sorder')->where('workspace_id',$workspace_id)->find_array();

        $ui->assign('deps',$deps);

        view('tickets_admin_create');


        break;

    case 'upload_file':

        $uploader   =   new Uploader();
        $uploader->setDir('storage/tickets/');
        $uploader->sameName(false);
        $uploader->setExtensions(array('zip','jpg','jpeg','png','gif'));  //allowed extensions list//
        if($uploader->uploadFile('file')){   //txtFile is the filebrowse element name //
            $uploaded  =   $uploader->getUploadName(); //get uploaded file name, renames on upload//

            $file = $uploaded;
            $msg = 'Uploaded Successfully';
            $success = 'Yes';

        }else{//upload failed
            $file = '';
            $msg = $uploader->getMessage();
            $success = 'No';
        }

        $a = array(
            'success' => $success,
            'msg' =>$msg,
            'file' =>$file
        );

        header('Content-Type: application/json');

        echo json_encode($a);


        break;


    case 'add_post':



        header('Content-Type: application/json');
        $cid = _post('cid');

        if($cid == ''){
            echo json_encode(array(
                "success" => "No",
                "msg" => 'Please Select Customer'
            ));

            exit;
        }

        $tickets = new Tickets();

        $t = $tickets->create($workspace_id,$cid,$user->id);




        echo json_encode($t);



        break;


    case 'view':

        $id = route(3);

        $d = ORM::for_table('sys_tickets')->where('workspace_id',$workspace_id)->find_one($id);


        if($d){

            $ui->assign('_st', $_L['Tickets'].' #'.$d->tid);

            $ui->assign('d',$d);

            $c = ORM::for_table('crm_accounts')->where('workspace_id',$workspace_id)->find_one($d->userid);

            $ui->assign('c',$c);

            if($d->admin != '0'){
                $a = db_find_one('sys_users',$d->admin);
            }
            else{
                $a = false;
            }

            $ui->assign('a',$a);

            // find all replies for this ticket

            $replies = ORM::for_table('sys_ticketreplies')->where('tid',$d->id)->where('workspace_id',$workspace_id)->find_array();
            $ui->assign('replies',$replies);

            $ui->assign('xheader', Asset::css(array('redactor/redactor','dropzone/dropzone','modal')));

            $ui->assign('xfooter',
                Asset::js(array('redactor/redactor','modal','dropzone/dropzone','tinymce/tinymce.min','js/editor'))
            );

            $departments = ORM::for_table('sys_ticketdepartments')->select('id')->select('dname')->where('workspace_id',$workspace_id)->find_array();

            $ui->assign('departments',$departments);

            $deps = array();
            $d_x = 0;
            foreach ($departments as $dep){
                $deps[$d_x]['value'] = $dep['id'];
                $deps[$d_x]['text'] = $dep['dname'];
                $d_x++;
            }


            $jed = json_encode($deps);


            $ads = ORM::for_table('sys_users')->select('id')->select('fullname')->where('workspace_id',$workspace_id)->find_array();

            $ui->assign('ads',$ads);

            $aas = array();
            $a_x = 0;
            foreach ($ads as $ad){
                $aas[$a_x]['value'] = $ad['id'];
                $aas[$a_x]['text'] = $ad['fullname'];
                $a_x++;
            }


            $jaa = json_encode($aas);

            $dd = ORM::for_table('sys_ticketdepartments')->select('dname')->where('workspace_id',$workspace_id)->find_one($d->did);

            if($dd){
                $department = $dd->dname;
            }
            else{
                $department = '';
            }

            $ui->assign('department',$department);

            $ui->assign('xjq','
        
        $( ".mmnt" ).each(function() {
                    //   alert($( this ).html());
                    var ut = $( this ).html();
                    $( this ).html(moment.unix(ut).fromNow());
                });
        
        ');

            $ui->assign('jsvar','
            var tid = '.$d->id.';
            var departments = '.$jed.';
            var agents = '.$jaa.';
            var files = [];
            ');




            $o_tickets = ORM::for_table('sys_tickets')->where('email',$d->email)->select('status')->select('subject')->select('urgency')->select('created_at')->select('id')->where('workspace_id',$workspace_id)->find_array();
            $ui->assign('o_tickets',$o_tickets);


            // check invoice exist for this ticket

            $invoice = Invoice::where('ticket_id',$d->id)->where('workspace_id',$workspace_id)->first();

            view('tickets_admin_view',[
                'invoice' => $invoice
            ]);



        }
        else{

            echo 'Ticket not found';

        }


        break;


    case 'imap_test':


        $host = _post('host');
        $port = _post('port');
        $username = _post('email');
        $password = _post('password');
        $enc = _post('encryption');



        $imap = imap_open('{'.$host.':'.$port.'/imap/'.$enc.'}INBOX', $username, $password);

        if($imap){

            echo 1;

        }
        else{
            echo imap_last_error();
        }


        break;

    case 'list':



        $ui->assign('xheader',Asset::css(array('popover/popover','select/select.min','s2/css/select2.min','dt/dt')));


        $ui->assign('xfooter',Asset::js(array('popover/popover','js/redirect','select/select.min','s2/js/select2.min','s2/js/i18n/'.lan(),'dt/dt'))
        );

        $ui->assign('jsvar', '
_L[\'are_you_sure\'] = \''.$_L['are_you_sure'].'\';
 ');

        view('tickets_admin_list');



        break;


    case 'add_reply':


        $tickets = new Tickets();

       // $cid = _post('cid');

        $t = $tickets->add_reply($user->id);


        header('Content-Type: application/json');

        echo json_encode($t);


        break;


    case 'save_note':

        $tid = _post('tid');

        $notes = $_POST['notes'];

        $ticket = db_find_one('sys_tickets',$tid);

        if($ticket){
            $ticket->notes = $notes;
            $ticket->save();
        }


        break;

    case 'delete':


        $tid = route(3);
        $tid = str_replace('t','',$tid);

        $ticket = db_find_one('sys_tickets',$tid);

        if($ticket){

            $ticket->delete();


        }

        // delete all related reply

        $replies = ORM::for_table('sys_ticketreplies')->where('tid',$tid)->where('workspace_id',$workspace_id)->find_many();

        foreach ($replies as $reply){
            $reply->delete();
        }

        r2(U.'tickets/admin/list/','s',$_L['delete_successful']);

        break;


    case 'view_modal':


       view('tickets_admin_view_modal');



        break;

    case 'edit_modal':

        $tid = route(3);
        $tid = str_replace('et','',$tid);
        $tid = str_replace('er','',$tid);

        $type = route(4);

        if($type == 'reply'){

            $ui->assign('type','reply');

            $ticket = db_find_one('sys_ticketreplies',$tid);


        }
        else{

            $ui->assign('type','ticket');

            $ticket = db_find_one('sys_tickets',$tid);

        }


        if($ticket){

            $ui->assign('ticket',$ticket);

            view('tickets_admin_edit_modal');


        }


        break;

    case 'edit_modal_post':

        $tid = _post('tid');

        $type = _post('type');

        $message = $_POST['message'];

        if($type == 'reply'){
            $ticket = db_find_one('sys_ticketreplies',$tid);
        }
        else{
            $ticket = db_find_one('sys_tickets',$tid);

        }

        if($ticket){

            $ticket->message = $message;
            $ticket->save();

            echo '1';

        }
        else{
            echo 'Ticket Not Found';
        }


        break;

    case 'delete_reply':

        $tid = route(3);
        $tid = str_replace('dr','',$tid);

        $ticket = db_find_one('sys_ticketreplies',$tid);

        if($ticket){

            $t = $ticket->tid;

            $ticket->delete();
            r2(U.'tickets/admin/view/'.$t,'s',$_L['delete_successful']);

        }






        break;


    case 'json_list':


        $columns = array();

        $columns[] = 'id';
        $columns[] = 'img';
        $columns[] = 'subject';
        $columns[] = 'account';




        $order_by = $_POST['order'];



        $o_c_id = $order_by[0]['column'];
        $o_type = $order_by[0]['dir'];

        $a_order_by = $columns[$o_c_id];


        $d = ORM::for_table('sys_tickets');

        $d->select('id');
        $d->select('tid');
        $d->select('userid');
        $d->select('account');
        $d->select('subject');
        $d->select('status');




        $account = _post('account');

        if($account != ''){

            $d->where_like('account',"%$account%");

        }


        $email = _post('email');

        if($email != ''){

            $d->where_like('email',"%$email%");

        }


        $subject = _post('subject');

        if($subject != ''){

            $d->where_like('subject',"%$subject%");

        }


        $company = _post('company');

        if($company != ''){

            $d->where_like('company',"%$company%");

        }

        $status = _post('status');

        if($status != ''){

            $d->where_like('status',"%$status%");

        }







        $x = $d->where('workspace_id',$workspace_id)->find_array();



        $iTotalRecords =  $d->count();



        $iDisplayLength = intval($_REQUEST['length']);
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = intval($_REQUEST['start']);
        $sEcho = intval($_REQUEST['draw']);

        $records = array();
        $records["data"] = array();

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;


        if($o_type == 'desc'){
            $d->order_by_desc($a_order_by);
        }
        else{
            $d->order_by_asc($a_order_by);
        }


        if (!has_access($user->roleid, 'transactions', 'all_data')) {
            $d->where('aid', $user->id);
        }

        $d->limit($iDisplayLength);
        $d->offset($iDisplayStart);
        $x = $d->where('workspace_id',$workspace_id)->find_array();

        $i = $iDisplayStart;

        $colors = Colors::colorNames();



        foreach ($x as $xs){

            $full_name = $xs['account'];

            $css_bg = $colors[array_rand($colors)];



            $full_name_e = explode(' ',$full_name);

            $first_name = $full_name_e[0];

            $first_name_letter = $first_name[0];

            if(isset($full_name_e[1])){
                $last_name = $full_name_e[1];
                $last_name_letter = $last_name[0];
            }
            else{
                $last_name_letter = '';
            }

            $img = '<span class="ib_avatar ib_bg_'.$css_bg.'">'.$first_name_letter.$last_name_letter.'</span>';


            $records["data"][] = array(
                0 => $xs['tid'],
                1 => '<a href="'.U.'contacts/view/'.$xs['id'].'">'.$img.'</a>',
                2 => $xs['subject'],
                3 => $xs['account'],
                4 =>  '
                <span class="label label-default inline-block"> '.$xs['status'].' </span>
                ',
                5 => $xs['id'],
                6 => $xs['userid'],

                "DT_RowId" => 'row_'.$xs['id']


            );

        }


        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iTotalRecords;


        api_response($records);




        break;


    case 'update_cc':

        $id = _post('id');

        $d = db_find_one('sys_tickets',$id);

        $value =  _post('value');

        if($value != '' && !Validator::Email($value)){
            i_close($_L['Invalid Email']);
        }

        if($d){

            $d->cc = $value;
            $d->save();

        }

        echo '1';


        break;



    case 'update_bcc':


        $id = _post('id');

        $d = db_find_one('sys_tickets',$id);

        $value =  _post('value');


        if($value != '' && !Validator::Email($value)){
            i_close($_L['Invalid Email']);
        }

        if($d){
            $d->bcc = $value;
            $d->save();

        }

        echo '1';

        break;

    case 'update_status':


        $id = _post('id');

        $d = db_find_one('sys_tickets',$id);

        $value =  _post('value');



        if($d){
            $d->status = $value;
            $d->save();

        }

        echo '1';

        break;


    case 'update_department':


        $id = _post('id');

        $d = db_find_one('sys_tickets',$id);

        $value =  _post('value');



        if($d){
            $d->did = $value;
            $d->save();

        }

        echo '1';

        break;


    case 'update_assigned_to':


        $id = _post('id');

        $d = db_find_one('sys_tickets',$id);

        $value =  _post('value');


        // Find the user

    $staff = User::find($value);

    if($staff)
    {
        // send email

        // Assign task to this staff

        // check tasks already exist for this staff

        $task = Task::where('workspace_id',$workspace_id)->where('aid',$staff->id)
            ->where('tid',$d->id)
            ->first();

        if(!$task)
        {

            Tasks::create([
                'workspace_id' => $workspace_id,
                'title' => $d->tid,
                'rel_type' => 'Ticket',
                'rel_id' => $d->id,
                'aid' => $staff->id,
                'tid' => $d->id,
            ]);
        }

        Notify_Email::_send('', $staff->username, 'Ticket assigned: '.$d->tid, 'View Ticket- '.U.'tickets/admin/view/'.$d->id);

        //
    }

        if($d){
            $d->aid = $value;
            $d->save();

        }

        echo '1';

        break;

    case 'update_email':

        $id = _post('id');

        $d = db_find_one('sys_tickets',$id);

        $value =  _post('value');



        if($d && Validator::Email($value)){
            $d->email = $value;
            $d->save();
            echo '1';

        }
        else{
            echo 'Invalid Email';
        }




        break;

    case 'reply_make_public':

        $id = route(3);
        $id = str_replace('rp','',$id);

        $d = db_find_one('sys_ticketreplies',$id);



        if($d){
            $d->reply_type = 'public';
            $d->save();

            Tickets::sendReplyNotification($d->tid,$d->message);

            r2(U.'tickets/admin/view/'.$d->tid,'s','Updated Successfully');

        }



        break;


    case 'tasks_list':



        $tid = route(3);

        $tasks = ORM::for_table('sys_tasks')->where('rel_type','Ticket')->where('rel_id',$tid)->select('title')->select('id')->select('status')->order_by_desc('id')->where('workspace_id',$workspace_id)->find_array();

        $li = '';

        foreach ($tasks as $task){
            $li .= '<li class="task_item'.(($task['status'] == 'Completed') ? ' completed':'').'" id="t_tasks_'.$task['id'].'">
                                <input id="s_tasks_'.$task['id'].'" type="checkbox" value="" name="" '.(($task['status'] == 'Completed') ? ' checked':'').' class="i-checks"/>
                                <span class="m-l-xs">'.$task['title'].'</span>
                                
                            </li>';
        }

        if($li == ''){

            //  echo '<p>No data available.</p>';

        }

        else{
            echo '<ul class="todo-list m-t">
                            
                            '.$li.'
                            
                        </ul>';
        }




        break;



    case 'do_task':


        $ids = $_POST['ids'];
        $do = _post('action');

        if($do == 'completed'){

            foreach ($ids as $id){
                $id = str_replace('t_tasks_','',$id);
                $d = ORM::for_table('sys_tasks')->find_one($id);
                if($d){
                    $d->status = 'Completed';
                    $d->save();
                }
            }


        }

        elseif ($do == 'not_started'){
            foreach ($ids as $id){
                $id = str_replace('t_tasks_','',$id);
                $d = ORM::for_table('sys_tasks')->find_one($id);
                if($d){
                    $d->status = 'Not Started';
                    $d->save();
                }
            }
        }

        elseif ($do == 'delete'){
            foreach ($ids as $id){
                $id = str_replace('t_tasks_','',$id);
                $d = ORM::for_table('sys_tasks')->find_one($id);
                if($d){
                    $d->delete();
                }
            }
        }

        else{

        }

        echo 'ok';


        break;

    case 'set_task_completed':

        $id = route(3);
        $id = str_replace('s_tasks_','',$id);
        $d = ORM::for_table('sys_tasks')->find_one($id);
        if($d){
            $d->status = 'Completed';
            $d->save();
            echo 'ok';
        }

        break;

    case 'set_task_not_started':

        $id = route(3);
        $id = str_replace('s_tasks_','',$id);
        $d = ORM::for_table('sys_tasks')->find_one($id);
        if($d){
            $d->status = 'Not Started';
            $d->save();
            echo 'ok';
        }


        break;


    case 'update_phone':

        $id = _post('id');

        $d = db_find_one('sys_tickets',$id);

        if($d){
            $customer = db_find_one('crm_accounts',$d->userid);


            if($customer){
                $customer->phone = _post('value');
                $customer->save();

            }

        }


        echo '1';


        break;


    case 'available_status':


        echo '<div class="form-group">
                                <label for="bulk_status">Status</label>
                                <select class="form-control" id="bulk_status" name="bulk_status" size="1">
                                  
                                    <option value="Open">Open</option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="Escalated">Escalated</option>
                                    <option value="Closed">Closed</option>

                                </select>
                            </div>';




        break;


    case 'set_status':


        $ids_raw = $_POST['ids'];

        $status = _post('status');





        foreach ($ids_raw as $id_single){
            $id = str_replace('row_','',$id_single);
            $t = ORM::for_table('sys_tickets')->select('id')->find_one($id);
            if($t){
                $t->status = $status;
                $t->save();
            }

        }


        echo $_L['Data Updated'];


        break;

    case 'settings':


        view('tickets_admin_edit_modal');


        break;


    case 'delete_multiple':

        if(!isset($_POST['ids'])){
            exit;
        }

        $ids_raw = $_POST['ids'];

        $ids = array();

        foreach ($ids_raw as $id_single){
            $id = str_replace('row_','',$id_single);
            array_push($ids,$id);
        }

        $tickets = ORM::for_table('sys_tickets')->where_id_in($ids)->where('workspace_id',$workspace_id)->delete_many();

        r2(U.'tickets/admin/list/','s',$_L['Deleted Successfully']);




        break;

    case 's':

        is_dev();


        $t = new Schema('sys_tickets');
        $t->add('tid','varchar',100);
        $t->add('did','int',10);
        $t->add('aid','int',10);
        $t->add('pid','int',10);
        $t->add('sid','int',10);
        $t->add('lid','int',10);
        $t->add('oid','int',10);
        $t->add('company_id','int',10);
        $t->add('dname','varchar',100);
        $t->add('userid','int',11);
        $t->add('account','varchar',200);
        $t->add('email','varchar',200);
        $t->add('cc','varchar',200);
        $t->add('bcc','varchar',200);
        $t->add('created_at','timestamp');
        $t->add('updated_at','timestamp');
        $t->add('subject');
        $t->add('message');
        $t->add('status','varchar',100);
        $t->add('urgency','varchar',100);
        $t->add('admin','varchar',100);
        $t->add('attachments');
        $t->add('last_reply','varchar',100);
        $t->add('flag','int',1);
        $t->add('escalated','int',1);
        $t->add('replying','int',1);
        $t->add('is_spam','int',1);
        $t->add('rating','int',2);
        $t->add('client_read','varchar',100);
        $t->add('admin_read','varchar',100);
        $t->add('source','varchar',100);

//  Question Incident Problem Feature Request
        $t->add('ttype','varchar',100);

        $t->add('tstart','varchar',100);
        $t->add('tend','varchar',100);
        $t->add('ttotal','varchar',100);
        $t->add('todo');
        $t->add('tags');
        $t->add('notes');
        $t->save();


        $t = new Schema('sys_ticketreplies');
        $t->add('tid','int',11);
        $t->add('userid','int',11);
        $t->add('account','varchar',200);
        $t->add('reply_type','varchar',200);
        $t->add('email','varchar',200);
        $t->add('created_at','timestamp');
        $t->add('updated_at','varchar',100);
        $t->add('message');
        $t->add('replied_by','varchar',200);
        $t->add('admin','varchar',100);
        $t->add('attachments');
        $t->add('client_read','varchar',100);
        $t->add('admin_read','varchar',100);
        $t->add('rating','int',2);
        $t->save();

        $t = new Schema('sys_ticketpredefinedreplies');
        $t->add('rname','varchar',200);
        $t->add('reply');
        $t->add('tags');
        $t->add('created_at','datetime');
        $t->add('updated_at','varchar',100);
        $t->add('created_by','int',11);
        $t->add('updated_by','int',11);
        $t->add('attachments');
        $t->save();

        $t = new Schema('sys_ticketmaillog');
        $t->add('date','datetime');
        $t->add('account','varchar',200);
        $t->add('subject','varchar',200);
        $t->add('message');
        $t->add('status','varchar',100);
        $t->add('attachments');
        $t->save();

        $t = new Schema('sys_ticketdepartments');
        $t->add('dname','varchar',200);
        $t->add('description');
        $t->add('email','varchar',200);
        $t->add('hidden','int',1,'0');
        $t->add('delete_after_import','int',1,'0');
        $t->add('host','varchar',200);
        $t->add('port','varchar',50);
        $t->add('username','varchar',200);
        $t->add('password','varchar',100);
        $t->add('encryption','varchar',100);
        $t->add('calendar_id','varchar',200);
        $t->add('sorder','int',10);
        $t->save();

        $t = new Schema('sys_canned_responses');
        $t->add('title');
        $t->add('message');
        $t->add('tags');
        $t->add('attachments');
        $t->add('sorder','int',10,0);
        $t->save();

// create email template

        $d = ORM::for_table('sys_email_templates')->create();
        $d->tplname = 'Tickets:Client Ticket Created';
        $d->subject = '{{subject}}';
        $d->message = '<p>{{client_name}},</p>
<p>Thank you for contacting our support team. A support ticket has now been opened for your request. You will be notified when a response is made by email. Your ticket ID is {{ticket_id}} and a copy of your original message is included below.</p>
<p>
Subject: {ticket_subject}
<br /> Message: <br />
{{message}}
<br /> Priority: {{ticket_priority}}
<br /> Status: {{ticket_status}}
</p>
<p>You can view the ticket at any time at {{ticket_link}}</p>
';
        $d->send = 'Yes';
        $d->core = 'Yes';
        $d->hidden = 0;
        $d->save();


        $d = ORM::for_table('sys_email_templates')->create();
        $d->tplname = 'Tickets:Admin Ticket Created';
        $d->subject = '{{subject}}';
        $d->message = '<p>{{admin_view_link}}</p> {{message}}';
        $d->send = 'Yes';
        $d->core = 'Yes';
        $d->hidden = 0;
        $d->save();


        $d = ORM::for_table('sys_email_templates')->create();
        $d->tplname = 'Tickets:Client Response';
        $d->subject = '{{subject}}';
        $d->message = '<p>{{ticket_message}}</p>
<p>----------------------------------------------<br /> Ticket ID: #{{ticket_id}}<br /> Subject: {$ticket_subject}<br /> Status: {{ticket_status}}<br /> Ticket URL: {$ticket_link}}<br /> ----------------------------------------------</p>';
        $d->send = 'Yes';
        $d->core = 'No';
        $d->hidden = 0;
        $d->save();

        $d = ORM::for_table('sys_email_templates')->create();
        $d->tplname = 'Tickets:Admin Response';
        $d->subject = '{{subject}}';
        $d->message = '<p>{$ticket_message}</p>
<p>----------------------------------------------<br /> Ticket ID: #{$ticket_id}}<br /> Subject: {{ticket_subject}}<br /> Status: {{ticket_status}}<br /> Ticket URL: {{ticket_link}}<br /> ----------------------------------------------</p>';
        $d->send = 'Yes';
        $d->core = 'No';
        $d->hidden = 0;
        $d->save();

        break;

}