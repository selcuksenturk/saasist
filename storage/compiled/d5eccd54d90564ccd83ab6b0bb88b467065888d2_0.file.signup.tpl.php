<?php
/* Smarty version 3.1.33, created on 2019-02-10 15:15:42
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/signup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60866ebf6f25_06448723',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd5eccd54d90564ccd83ab6b0bb88b467065888d2' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/signup.tpl',
      1 => 1539008334,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60866ebf6f25_06448723 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $_smarty_tpl->tpl_vars['_L']->value['Register'];?>
 - <?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
</title>

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
favicon-16x16.png">
    <link rel="manifest" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
site.webmanifest">
    <link rel="mask-icon" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/bootstrap/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/lib/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>


    <style>

        body {
            font-family: "Nunito Sans",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            text-align: left;
            background-color: #f4f6fa;
        }

        .hero-static {
            min-height: 100vh;
        }
        @media (min-width: 576px) {
            .pl-sm-0, .px-sm-0 {
                padding-left: 0!important;
            }
            .pr-sm-0, .px-sm-0 {
                padding-right: 0!important;
            }
        }

        .card {
            -webkit-box-shadow: 0 0 50px 0 rgba(22,104,183,.15);
            box-shadow: 0 0 50px 0 rgba(22,104,183,.15);
            border: none;
            border-radius: 0;
        }



        .form-control {
            display: block;
            width: 100%;
            padding: .438rem .875rem;
            font-size: .894rem;
            line-height: 1.54;
            color: #4E5155;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(24,28,33,0.1);
            border-radius: .25rem;
            -webkit-transition: border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            color: #4E5155;
            background-color: #fff;
            border-color: #26B4FF;
            outline: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }


    </style>

    <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
        <?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js'><?php echo '</script'; ?>
>
    <?php }?>

</head>
<body>
<div id="page-container">
    <main id="main-container">
        <div class="row no-gutters justify-content-center bg-body-dark mx-auto" style="max-width: 550px; margin: 50px;">
            <div class="hero-static col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-md-12">



                                <div class="mb-2 text-center">
                                    <a class="link-fx text-primary font-w700 font-size-h1" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
signup/post">
                                        <img class="logo" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/system/<?php echo $_smarty_tpl->tpl_vars['config']->value['logo_default'];?>
" alt="Logo">
                                    </a>

                                    <div class="mt-3">
                                        <p class="text-muted"> <span style="font-size: 20px;">Get Started</span> <br>
                                            Give us a try FREE for 30 days. No credit card is needed.</p>
                                    </div>
                                </div>

                                <?php if (isset($_smarty_tpl->tpl_vars['notify']->value)) {?>
                                    <?php echo $_smarty_tpl->tpl_vars['notify']->value;?>

                                <?php }?>

                                <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
signup/post" method="post">

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Your full name">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                        <small class="text-muted">We will send you an email to verify your account.</small>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Choose password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                                    </div>
                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_sitekey'];?>
"></div>
                                        </div>
                                    <?php }?>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-primary">
                                            Sign Up
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html><?php }
}
