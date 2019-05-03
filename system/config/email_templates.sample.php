<?php

/*
 * When translating or editing, do not change 'name' value. This will be translated automatically using i18n file.
 * Only edit the 'subject' and 'message' value.
 */

return [
    [
        'name' => 'Invoice:Invoice Created',
        'subject' => '{{business_name}} Invoice',
        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This email serves as your official invoice from <strong>{{business_name}}. </strong>	</div><div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
    ],
    [
        'name' => 'Admin:Password Change Request',
        'subject' => '{{business_name}} password change request',
        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Hi {{name}},</div>	<div style="padding:5px">		This is to confirm that we have received a Forgot Password request for your Account Username - {{username}} <br>From the IP Address - {{ip_address}}	</div>	<div style="padding:5px">		Click this linke to reset your password- <br><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{password_reset_link}}">{{password_reset_link}}</a>	</div><div style="padding:5px">Please note: until your password has been changed, your current password will remain valid. The Forgot Password Link will be available for a limited time only.</div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
    ],
    [
        'name' => 'Admin:New Password',
        'subject' => '{{business_name}} New Password for Admin',
        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3">

<div style="padding:5px;font-size:11pt;font-weight:bold">
   Hello {{name}}
</div>


	<div style="padding:5px">
		Here is your new password for <strong>{{business_name}}. </strong>
	</div>

	
<div style="padding:10px 5px">
    Log in URL: <a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{login_url}}">{{login_url}}</a><br>Username: {{username}}<br>Password: {{password}}</div>

<div style="padding:5px">For security reason, Please change your password after login. </div>

<div style="padding:0px 5px">
	<div>Best Regards,<br>{{business_name}} Team</div>

</div>

</div>'
    ],
    [
        'name' => 'Invoice:Invoice Payment Reminder',
        'subject' => '{{business_name}} Invoice Payment Reminder',
        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is a billing reminder that your invoice no. {{invoice_id}} which was generated on {{invoice_date}} is due on {{invoice_due_date}}. 	</div><div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
    ],
    [
        'name' => 'Invoice:Invoice Overdue Notice',
        'subject' => '{{business_name}} Invoice Overdue Notice',
        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is the notice that your invoice no. {{invoice_id}} which was generated on {{invoice_date}} is now overdue.	</div>	<div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
    ],
    [
        'name' => 'Invoice:Invoice Payment Confirmation',
        'subject' => '{{business_name}} Invoice Payment Confirmation',
        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3">

<div style="padding:5px;font-size:11pt;font-weight:bold">
   Greetings,
</div>



	<div style="padding:5px">
		This is a payment receipt for Invoice {{invoice_id}} sent on {{invoice_date}}.
	</div>


	<div style="padding:5px">
		Login to your client Portal to view this invoice.
	</div>


<div style="padding:10px 5px">
    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div>


<div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div>


<div style="padding:0px 5px">
	<div>Best Regards,<br>{{business_name}} Team</div>


</div>


</div>'
    ],
    [
        'name' => 'Invoice:Invoice Refund Confirmation',
        'subject' => '{{business_name}} Invoice Refund Confirmation',
        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,\'droid sans\',\'lucida sans\',sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		This is confirmation that a refund has been processed for Invoice {{invoice_id}} sent on {{invoice_date}}.	</div><div style="padding:10px 5px">    Invoice URL: <a href="{{invoice_url}}" target="_blank">{{invoice_url}}</a><a target="_blank" style="color:#1da9c0;font-weight:bold;padding:3px;text-decoration:none" href="{{app_url}}"></a><br>Invoice ID: {{invoice_id}}<br>Invoice Amount: {{invoice_amount}}<br>Due Date: {{invoice_due_date}}</div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
    ],
    [
        'name' => 'Quote:Quote Created',
        'subject' => '{{quote_subject}}',
        'message' => '<div style="line-height:1.6;color:#222;text-align:left;width:550px;font-size:10pt;margin:0px 10px;font-family:verdana,sans-serif;padding:14px;border:3px solid #d8d8d8;border-top:3px solid #007bc3"><div style="padding:5px;font-size:11pt;font-weight:bold">   Greetings,</div>	<div style="padding:5px">		Dear {{contact_name}},&nbsp;<br> Here is the quote you requested for.  The quote is valid until {{valid_until}}.	</div><div style="padding:10px 5px">    Quote Unique URL: <a href="{{quote_url}}" target="_blank">{{quote_url}}</a><br></div><div style="padding:5px"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span><br></div><div style="padding:0px 5px">	<div>Best Regards,<br>{{business_name}} Team</div></div></div>'
    ],
    [
        'name' => 'Client:Client Signup Email',
        'subject' => 'Your {{business_name}} Login Info',
        'message' => '<p>Dear {{client_name}},</p>
<p>Welcome to {{business_name}}.</p>
<p>You can track your billing, profile, transactions from this portal.</p>
<p>Your login information is as follows:</p>
<p>---------------------------------------------------------------------------------------</p>
<p>Login URL: {{client_login_url}} <br />Email Address: {{client_email}}<br /> Password: Your chosen password.</p>
<p>----------------------------------------------------------------------------------------</p>
<p>We very much appreciate you for choosing us.</p>
<p>{{business_name}} Team</p>'
    ],
    [
        'name' => 'Tickets:Client Ticket Created',
        'subject' => '{{subject}}',
        'message' => '<p>{{client_name}},</p>
<p>Thank you for contacting our support team. A support ticket has now been opened for your request. You will be notified when a response is made by email. Your ticket ID is {{ticket_id}} and a copy of your original message is included below.</p>
<p>
Subject: {ticket_subject}
<br /> Message: <br />
{{message}}
<br /> Priority: {{ticket_priority}}
<br /> Status: {{ticket_status}}
</p>
<p>You can view the ticket at any time at {{ticket_link}}</p>
'
    ],
    [
        'name' => 'Tickets:Admin Ticket Created',
        'subject' => '{{subject}}',
        'message' => '<p>{{admin_view_link}}</p> {{message}}'
    ],
    [
        'name' => 'Tickets:Client Response',
        'subject' => '{{subject}}',
        'message' => '<p>{{ticket_message}}</p>
<p>----------------------------------------------<br /> Ticket ID: #{{ticket_id}}<br /> Subject: {{ticket_subject}}<br /> Status: {{ticket_status}}<br /> Ticket URL: {{ticket_link}}<br /> ----------------------------------------------</p>'
    ],
    [
        'name' => 'Tickets:Admin Response',
        'subject' => '{{subject}}',
        'message' => '<p>{{ticket_message}}</p>
<p>----------------------------------------------<br /> Ticket ID: #{{ticket_id}}<br /> Subject: {{ticket_subject}}<br /> Status: {{ticket_status}}<br /> Ticket URL: {{ticket_link}}<br /> ----------------------------------------------</p>'
    ],
    [
        'name' => 'Purchase Invoice:Invoice Created',
        'subject' => '{{business_name}} Invoice',
        'message' => '<div style="line-height: 1.6; color: #222; text-align: left; width: 550px; font-size: 10pt; margin: 0px 10px; font-family: verdana,\'droid sans\',\'lucida sans\',sans-serif; padding: 14px; border: 3px solid #d8d8d8; border-top: 3px solid #007bc3;">
<div style="padding: 5px; font-size: 11pt; font-weight: bold;">Greetings,</div>
<div style="padding: 5px;">This email serves as your official invoice from <strong>{{business_name}}. </strong></div>
<div style="padding: 10px 5px;">Invoice URL: {{invoice_url}}<br />Invoice ID: {{invoice_id}}<br />Invoice Amount: {{invoice_amount}}</div>
<div style="padding: 5px;"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">If you have any questions or need assistance, please don\'t hesitate to contact us.</span></div>
<div style="padding: 0px 5px;">
<div>Best Regards,<br />{{business_name}} Team</div>
</div>
</div>'
    ],
    [
        'name' => 'Quote:Quote Cancelled',
        'subject' => '{{business_name}} Quote',
        'message' => '<div style="line-height: 1.6; color: #222; text-align: left; width: 550px; font-size: 10pt; margin: 0px 10px; font-family: verdana,sans-serif; padding: 14px; border: 3px solid #d8d8d8; border-top: 3px solid #007bc3;">
<div style="padding: 5px; font-size: 11pt; font-weight: bold;">Greetings,</div>
<div style="padding: 5px;">Dear {{contact_name}},&nbsp;<br />We are sorry to see you go. If you chnage your mind, you can Accept it again from following url. The quote is valid until {{valid_until}}.</div>
<div style="padding: 10px 5px;">Quote Unique URL: <a href="http://stackb.dev/{{quote_url}}" target="_blank" rel="noopener noreferrer">{{quote_url}}</a></div>
<div style="padding: 5px;"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span></div>
<div style="padding: 0px 5px;">
<div>Best Regards,<br />{{business_name}} Team</div>
</div>
</div>'
    ],
    [
        'name' => 'Quote:Quote Accepted',
        'subject' => '{{business_name}} Quote',
        'message' => '<div style="line-height: 1.6; color: #222; text-align: left; width: 550px; font-size: 10pt; margin: 0px 10px; font-family: verdana,sans-serif; padding: 14px; border: 3px solid #d8d8d8; border-top: 3px solid #007bc3;">
<div style="padding: 5px; font-size: 11pt; font-weight: bold;">Greetings,</div>
<div style="padding: 5px;">Dear {{contact_name}},&nbsp;<br />Thank you for accepting the Quote.</div>
<div style="padding: 10px 5px;">Quote: <a href="{{quote_url}}" target="_blank" rel="noopener noreferrer">{{quote_url}}</a></div>
<div style="padding: 5px;"><span style="font-size: 13.3333330154419px; line-height: 21.3333320617676px;">You may view the quote at any time and simply reply to this email with any further questions or requirement.</span></div>
<div style="padding: 0px 5px;">
<div>Best Regards,<br />{{business_name}} Team</div>
</div>
</div>'
    ],

];