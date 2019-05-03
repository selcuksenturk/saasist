<?php

/*
 * When translating or editing, do not change 'name' value. This will be translated automatically using i18n file.
 * Only edit the 'template' value.
 */

return [
    [
        'name' => 'Invoice Created',
        'template' => 'Your Invoice- {{invoice_id}} is created. To view your invoice- {{invoice_url}}'
    ],
    [
        'name' => 'Invoice Payment Reminder',
        'template' => 'We have not received payment for invoice {{invoice_id}}, dated {{invoice_date}}. To view your invoice- {{invoice_url}}'
    ],
    [
        'name' => 'Invoice Overdue Notice',
        'template' => 'Your Invoice- {{invoice_id}} is now overdue. To view your invoice- {{invoice_url}}'
    ],
    [
        'name' => 'Invoice Payment Confirmation',
        'template' => 'We have received your Payment for Invoice ID- {{invoice_id}}'
    ],
    [
        'name' => 'Invoice Refund Confirmation',
        'template' => 'Your Payment for {{invoice_id}} has been refunded.'
    ],
    [
        'name' => 'Quote Created',
        'template' => 'A Quote has been created- {{quote_id}}. You can view this Quote- {{quote_url}}'
    ],
    [
        'name' => 'Quote Accepted',
        'template' => 'Thanks for Accepting Quote - {{quote_id}}. You can view this Quote- {{quote_url}}'
    ],
    [
        'name' => 'Quote Cancelled',
        'template' => 'Quote has been cancelled - {{quote_id}}. You can view this Quote- {{quote_url}}'
    ],
    [
        'name' => 'Quote Accepted: Admin Notification',
        'template' => 'Quote - {{quote_id}} has been accepted. You can view this Quote- {{quote_url}}'
    ],
    [
        'name' => 'Quote Cancelled: Admin Notification',
        'template' => 'Quote - {{quote_id}} has been Cancelled. You can view this Quote- {{quote_url}}'
    ]
];