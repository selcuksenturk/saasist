<!DOCTYPE html>

<html>
{literal}
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-3895722-26"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-3895722-26');
</script>
{/literal}

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$_title}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{$app_url}apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{$app_url}favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{$app_url}favicon-16x16.png">
    <link rel="manifest" href="{$app_url}site.webmanifest">
    <link rel="mask-icon" href="{$app_url}safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">


    <link href="{$theme}default/css/app.css?v=3" rel="stylesheet">

    {*<link href="{$theme}default/css/bootstrap.min.css" rel="stylesheet">*}
    {*<link href="{$assets}/css/font-awesome.min.css?ver={$file_build}" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/icheck/skins/square/blue.css" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/css/animate.css" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/toggle/bootstrap-toggle.min.css" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/flag-icon/css/flag-icon.min.css" rel="stylesheet">*}
    {*<link href="{$assets}fonts/open-sans/open-sans.css?ver=4.0.1" rel="stylesheet">*}
    {*<link href="{$theme}default/css/style.css?ver={$file_build}" rel="stylesheet">*}
    {*<link href="{$theme}default/css/component.css?ver={$file_build}" rel="stylesheet">*}
    {*<link href="{$theme}default/css/custom.css?ver={$file_build}" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/icons/css/ibilling_icons.css" rel="stylesheet">*}
    {*<link href="{$theme}default/css/material.css" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/notify/pnotify.min.css" rel="stylesheet">*}
    {*<link href="{$app_url}ui/lib/fancybox/fancybox.min.css" rel="stylesheet">*}

    <link href="{$theme}default/css/{$config['nstyle']}.css" rel="stylesheet">

    <script>
        window.clx = {
            base_url: '{$_url}',
            i18n: {
                yes: '{$_L['Yes']}',
                no: '{$_L['No']}',
                are_you_sure: '{$_L['are_you_sure']}'
            }
        }
    </script>

    {foreach $plugin_ui_header_admin as $plugin_ui_header_add}
        {$plugin_ui_header_add}
    {/foreach}

    {if $config['rtl'] eq '1'}
        <link href="{$theme}default/css/bootstrap-rtl.min.css" rel="stylesheet">
        <link href="{$theme}default/css/style-rtl.min.css" rel="stylesheet">
    {/if}

    {if isset($xheader)}
        {$xheader}
    {/if}

    {block name=style}{/block}

    {foreach $plugin_ui_header_admin_css as $plugin_ui_header_add_css}
        <link href="{$plugin_ui_header_add_css}" rel="stylesheet">
    {/foreach}

    <style>
        .navbar-default i{
            font-size: 16px;

        }
        .nav>li.active>a {
            padding-left: 19px;
        }
    </style>

</head>

<body class="fixed-nav {if $config['mininav']}mini-navbar{/if}" id="ib_body">

<!-- Started Header Section -->


<section>
    <div id="wrapper">

        <!-- Navigation Button -->

        <nav class="navbar-default navbar-static-side" id="ib_navbar" role="navigation">
            <div class="sidebar-collapse">

                <ul class="nav nav-highlight" id="side-menu">


                    {if isset($workspace) && $workspace->is_active == 0}

                        <li class="active" style="margin-top: 20px;"><a href="{$_url}settings/billing"><i class="icon-credit-card-1"></i> <span class="nav-label">{$_L['Billing']}</span></a></li>

                        {else}

                        {$admin_extra_nav[0]}

                        {if has_access($user->roleid,'reports')}
                            <li {if $_application_menu eq 'dashboard'}class="active"{/if} style="margin-top: 20px;"><a href="{$_url}{$config['redirect_url']}/"><i class="fa fa-tachometer"></i> <span class="nav-label">{$_L['Dashboard']}</span></a></li>
                        {/if}


                        {if $user->workspace_id == 1}

                            <li class="{if $_application_menu eq 'super_admin'}active{/if}">
                                <a href="#"><i class="glyphicon glyphicon-file"></i> <span class="nav-label">{$_L['Super Admin']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li><a href="{$_url}super_admin/dashboard">{$_L['Dashboard']}</a></li>
                                    <li><a href="{$_url}super_admin/workspaces">{$_L['Workspaces']}</a></li>
                                    <li><a href="{$_url}super_admin/users">{$_L['Users']}</a></li>
                                    <li><a href="{$_url}super_admin/plans">{$_L['Plans']}</a></li>
                                    <li><a href="{$_url}settings/plugins">{$_L['Plugins']}</a></li>
                                    <li><a href="{$_url}super_admin/settings">{$_L['Settings']}</a></li>



                                </ul>
                            </li>


{*                            {if APP_STAGE eq 'Dev'}*}

{*                                <li {if $_application_menu eq 'dev'}class="active"{/if}><a href="{$_url}dev"><i class="fa fa-file-code-o"></i> <span class="nav-label">{$_L['Developer']}</span></a></li>*}

{*                            {/if}*}

                        {/if}



                        {$admin_extra_nav[1]}

                        {if has_access($user->roleid,'customers')}
                            <li class="{if $_application_menu eq 'contacts'}active{/if}">
                                <a href="#"><i class="icon-users"></i> <span class="nav-label">{$_L['Customers']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    {if has_access($user->roleid,'customers','create')}
                                        <li><a href="{$_url}contacts/add/">{$_L['Add Customer']}</a></li>
                                    {/if}
                                    <li><a href="{$_url}contacts/list/">{$_L['List Customers']}</a></li>

                                    {if has_access($user->roleid,'companies','view') && ($config['companies'])}
                                        <li><a href="{$_url}contacts/companies/">{$_L['Companies']}</a></li>
                                    {/if}


                                    <li><a href="{$_url}contacts/groups/">{$_L['Groups']}</a></li>



                                    {foreach $sub_menu_admin['crm'] as $sm_crm}

                                        {$sm_crm}


                                    {/foreach}
                                </ul>
                            </li>
                        {/if}



                        {$admin_extra_nav[2]}
                        {if has_access($user->roleid,'transactions')}
                            {if $config['accounting'] eq '1'}
                                <li class="{if $_application_menu eq 'transactions'}active{/if}">
                                    <a href="#"><i class="fa fa-calculator"></i> <span class="nav-label">{$_L['Transactions']}</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a href="{$_url}transactions/deposit/">{$_L['New Deposit']}</a></li>
                                        <li><a href="{$_url}transactions/expense/">{$_L['New Expense']}</a></li>
                                        <li><a href="{$_url}transactions/transfer/">{$_L['Transfer']}</a></li>

                                        <li><a href="{$_url}transactions/list/">{$_L['View Transactions']}</a></li>
                                        <li><a href="{$_url}accounts/balances/transactions">{$_L['Balance Sheet']}</a></li>
                                    </ul>
                                </li>
                            {/if}
                        {/if}


                        {$admin_extra_nav[3]}


                        {if has_access($user->roleid,'sales')}

                            {if ($config['invoicing'] eq '1') OR ($config['quotes'] eq '1')}



                                <li class="{if $_application_menu eq 'invoices'}active{/if}">
                                    <a href="#"><i class="icon-credit-card-1"></i> <span class="nav-label">{$_L['Sales']}</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">

                                        {if $config['invoicing'] eq '1'}
                                            <li><a href="{$_url}invoices/list/">{$_L['Invoices']}</a></li>
                                            <li><a href="{$_url}invoices/add/">{$_L['New Invoice']}</a></li>


                                            <li><a href="{$_url}invoices/add/1/0/pos">{$_L['POS']}</a></li>


                                            <li><a href="{$_url}invoices/list-recurring/">{$_L['Recurring Invoices']}</a></li>
                                            <li><a href="{$_url}invoices/add/recurring/">{$_L['New Recurring Invoice']}</a></li>
                                        {/if}

                                        {if $config['quotes'] eq '1'}
                                            <li><a href="{$_url}quotes/list/">{$_L['Quotes']}</a></li>
                                            <li><a href="{$_url}quotes/new/">{$_L['Create New Quote']}</a></li>
                                        {/if}
                                        <li><a href="{$_url}invoices/payments/">{$_L['Payments']}</a></li>

                                        {foreach $sub_menu_admin['sales'] as $sm_sales}

                                            {$sm_sales}


                                        {/foreach}

                                    </ul>
                                </li>

                            {/if}

                        {/if}


                        {if has_access($user->roleid,'suppliers') && ($config['suppliers'])}

                            <li class="{if $_application_menu eq 'suppliers'}active{/if}">
                                <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">{$_L['Suppliers']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    {if has_access($user->roleid,'suppliers','create')}
                                        <li><a href="{$_url}contacts/add/supplier">{$_L['Add Supplier']}</a></li>
                                    {/if}
                                    <li><a href="{$_url}contacts/list/supplier">{$_L['List Suppliers']}</a></li>

                                    {*{if has_access($user->roleid,'companies','view') && ($config['companies'])}*}
                                    {*<li><a href="{$_url}contacts/companies/suppliers">{$_L['Companies']}</a></li>*}
                                    {*{/if}*}


                                    {*<li><a href="{$_url}contacts/groups/">{$_L['Groups']}</a></li>*}


                                </ul>
                            </li>

                        {/if}



                        {if has_access($user->roleid,'purchase') && ($config['purchase'])}




                            <li class="{if $_application_menu eq 'purchase'}active{/if}">
                                <a href="#"><i class="fa fa-cubes"></i> <span class="nav-label">{$_L['Purchase']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li><a href="{$_url}purchases/list/">{$_L['Purchase Orders']}</a></li>
                                    <li><a href="{$_url}purchases/add/">{$_L['New Purchase Order']}</a></li>


                                </ul>
                            </li>



                        {/if}

                        {*{if has_access($user->roleid,'suppliers') && ($config['suppliers'])}*}

                        {*<li class="{if $_application_menu eq 'suppliers'}active{/if}">*}
                        {*<a href="#"><i class="icon-th-large-outline"></i> <span class="nav-label">{$_L['Suppliers']}</span><span class="fa arrow"></span></a>*}
                        {*<ul class="nav nav-second-level">*}

                        {*{if has_access($user->roleid,'suppliers','create')}*}
                        {*<li><a href="{$_url}suppliers/add/">{$_L['Add Supplier']}</a></li>*}
                        {*{/if}*}
                        {*<li><a href="{$_url}suppliers/list/">{$_L['List Suppliers']}</a></li>*}

                        {*</ul>*}
                        {*</li>*}
                        {*{/if}*}


                        {if has_access($user->roleid,'leads','view') && ($config['leads'])}
                            <li {if $_application_menu eq 'leads'}class="active"{/if}><a href="{$_url}leads/"><i class="fa fa-address-card-o"></i> <span class="nav-label">{$_L['Leads']}</span></a></li>
                        {/if}


                        {if has_access($user->roleid,'sms') && ($config['sms'])}

                            <li class="{if $_application_menu eq 'sms'}active{/if}">
                                <a href="#"><i class="fa fa-envelope-o"></i> <span class="nav-label">{$_L['SMS']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li><a href="{$_url}sms/init/send/">{$_L['Send Single SMS']}</a></li>
                                    <li><a href="{$_url}sms/init/bulk/">{$_L['Send Bulk SMS']}</a></li>
                                    {*<li><a href="{$_url}sms/init/inbox/">{$_L['Inbox']}</a></li>*}
                                    <li><a href="{$_url}sms/init/sent/">{$_L['Sent']}</a></li>
                                    <li><a href="{$_url}sms/init/templates/">{$_L['SMS Templates']}</a></li>
                                    {*<li><a href="{$_url}sms/init/notifications/">{$_L['Notifications']}</a></li>*}
                                    {*<li><a href="{$_url}sms/init/drivers/">{$_L['SMS Drivers']}</a></li>*}
                                    <li><a href="{$_url}sms/init/settings/">{$_L['Settings']}</a></li>


                                </ul>
                            </li>



                        {/if}


                        {if has_access($user->roleid,'support') && ($config['support'])}

                            <li class="{if $_application_menu eq 'support'}active{/if}">
                                <a href="#"><i class="fa fa-life-ring"></i> <span class="nav-label">{$_L['Support']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li><a href="{$_url}tickets/admin/create/">{$_L['Open New Ticket']}</a></li>
                                    <li><a href="{$_url}tickets/admin/list/">{$_L['Tickets']}</a></li>
                                    <li><a href="{$_url}tickets/admin/predefined_replies/">{$_L['Predefined Replies']}</a></li>
                                    <li><a href="{$_url}tickets/admin/departments/">{$_L['Departments']}</a></li>


                                </ul>
                            </li>



                        {/if}



                        {if has_access($user->roleid,'kb') && ($config['kb'])}

                            <li class="{if $_application_menu eq 'kb'}active{/if}">
                                <a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">{$_L['Knowledgebase']}</span><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <li><a href="{$_url}kb/a/edit/">{$_L['New Article']}</a></li>
                                    <li><a href="{$_url}kb/a/all/">{$_L['All Articles']}</a></li>



                                </ul>
                            </li>



                        {/if}






                        {if has_access($user->roleid,'orders') && ($config['orders'])}

                            {if ($config['orders'] eq '1')}



                                <li class="{if $_application_menu eq 'orders'}active{/if}">
                                    <a href="#"><i class="fa fa-server"></i> <span class="nav-label">{$_L['Orders']}</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a href="{$_url}orders/list/">{$_L['List All Orders']}</a></li>
                                        <li><a href="{$_url}orders/add/">{$_L['Add New Order']}</a></li>

                                    </ul>
                                </li>

                            {/if}

                        {/if}


                        {*{if has_access($user->roleid,'projects') && ($config['projects'])}*}
                        {*<li class="{if $_application_menu eq 'projects'}active{/if}">*}
                        {*<a href="#"><i class="fa fa-file-text-o"></i> <span class="nav-label">{$_L['Projects']}</span><span class="fa arrow"></span></a>*}
                        {*<ul class="nav nav-second-level">*}
                        {*<li><a href="{$_url}projects/list/">List Projects</a></li>*}
                        {*<li><a href="{$_url}projects/add/">Add New Project</a></li>*}

                        {*</ul>*}
                        {*</li>*}
                        {*{/if}*}



                        {*{if has_access($user->roleid,'hrm') && ($config['hrm'])}*}
                        {*<li class="{if $_application_menu eq 'hrm'}active{/if}">*}
                        {*<a href="#"><i class="icon-vcard"></i> <span class="nav-label">{$_L['HRM']}</span><span class="fa arrow"></span></a>*}
                        {*<ul class="nav nav-second-level">*}
                        {*<li><a href="{$_url}orders/list/">{$_L['List All Orders']}</a></li>*}
                        {*<li><a href="{$_url}orders/add/">{$_L['Add New Order']}</a></li>*}

                        {*</ul>*}
                        {*</li>*}
                        {*{/if}*}


                        {if has_access($user->roleid,'documents') && ($config['documents'])}
                            <li {if $_application_menu eq 'documents'}class="active"{/if}><a href="{$_url}documents/"><i class="fa fa-file-o"></i> <span class="nav-label">{$_L['Documents']}</span></a></li>
                        {/if}



                        {if has_access($user->roleid,'tasks') && ($config['tasks'])}
                            <li {if $_application_menu eq 'tasks'}class="active"{/if}><a href="{$_url}tasks"><i class="fa fa-tasks"></i> <span class="nav-label">{$_L['Tasks']}</span></a></li>
                        {/if}



                        {if has_access($user->roleid,'calendar') && ($config['calendar'])}
                            <li {if $_application_menu eq 'calendar'}class="active"{/if}><a href="{$_url}calendar/events/"><i class="fa fa-calendar"></i> <span class="nav-label">{$_L['Calendar']}</span></a></li>
                        {/if}

                        {if ($config['password_manager']) && has_access($user->roleid,'password_manager')}
                            <li {if $_application_menu eq 'password_manager'}class="active"{/if}><a href="{$_url}password_manager"><i class="fa fa-list-ul"></i> <span class="nav-label">{$_L['Password Manager']}</span></a></li>
                        {/if}


                        {$admin_extra_nav[4]}

                        {if has_access($user->roleid,'bank_n_cash')}
                            {if $config['accounting'] eq '1'}
                                <li class="{if $_application_menu eq 'accounts'}active{/if}">
                                    <a href="#"><i class="fa fa-university"></i> <span class="nav-label">{$_L['Bank n Cash']}</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        <li><a href="{$_url}accounts/add/">{$_L['New Account']}</a></li>

                                        <li><a href="{$_url}accounts/list/">{$_L['List Accounts']}</a></li>
                                        <li><a href="{$_url}accounts/balances/">{$_L['Account_Balances']}</a></li>

                                    </ul>
                                </li>
                            {/if}

                        {/if}


                        {$admin_extra_nav[5]}

                        {if has_access($user->roleid,'products_n_services')}

                            {if ($config['invoicing'] eq '1') OR ($config['quotes'] eq '1')}
                                <li class="{if $_application_menu eq 'ps'}active{/if}">
                                    <a href="#"><i class="fa fa-cube"></i> <span class="nav-label">{$_L['Products n Services']}</span><span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        {if $config['inventory'] eq '1'}
                                            {*<li><a href="{$_url}inventory/dashboard/">{$_L['Inventory']}</a></li>*}
                                        {/if}
                                        <li><a href="{$_url}ps/p-list/">{$_L['Products']}</a></li>
                                        <li><a href="{$_url}ps/p-new/">{$_L['New Product']}</a></li>
                                        <li><a href="{$_url}ps/s-list/">{$_L['Services']}</a></li>
                                        <li><a href="{$_url}ps/s-new/">{$_L['New Service']}</a></li>


                                    </ul>
                                </li>
                            {/if}

                        {/if}




                        {$admin_extra_nav[6]}

                        {if has_access($user->roleid,'reports')}



                            <li class="{if $_application_menu eq 'reports'}active{/if}">
                                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">{$_L['Reports']} </span><span class="fa arrow"></span></