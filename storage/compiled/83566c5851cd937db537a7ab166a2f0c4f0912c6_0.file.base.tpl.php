<?php
/* Smarty version 3.1.33, created on 2019-05-01 03:37:31
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/base.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc94cbb434082_54699778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83566c5851cd937db537a7ab166a2f0c4f0912c6' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/base.tpl',
      1 => 1556695882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc94cbb434082_54699778 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if (isset($_smarty_tpl->tpl_vars['page_title']->value)) {?>
        <title><?php echo $_smarty_tpl->tpl_vars['page_title']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['config']->value['CompanyName'];?>
</title>
    <?php } else { ?>
        <title>Business Software - Accounting, Inventory, Invoicing & CRM</title>
    <?php }?>

    <!-- Bootstrap CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/theme/default/css/frontend.css?ver=a<?php echo $_smarty_tpl->tpl_vars['file_build']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/assets/css/font-awesome.min.css?ver=<?php echo $_smarty_tpl->tpl_vars['file_build']->value;?>
" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/ui/assets/css/iconmonstr-iconic-font.min.css?ver=<?php echo $_smarty_tpl->tpl_vars['file_build']->value;?>
" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800%7cPoppins:100,200,300,400,500,600,700,800" rel="stylesheet">

    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10147784455cc94cbb422d02_56444185', "head");
?>


</head>
<body>

<!-- ==================================================
                      navbar
================================================== -->
<nav class="navbar navbar-transparent <?php if (isset($_smarty_tpl->tpl_vars['_navbar_is_white']->value)) {?> navbar-transparent <?php } else { ?> navbar-black-links<?php }?> navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/logo.png" style="max-height: 40px;" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['_active_menu']->value == 'Home') {?>active<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['_active_menu']->value == 'Features') {?>active<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
features">Features and benefits</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['_active_menu']->value == 'Pricing') {?>active<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pricing">Plans & Pricing</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['_active_menu']->value == 'About') {?>active<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if ($_smarty_tpl->tpl_vars['_active_menu']->value == 'Signin') {?>active<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
signin">Sign in</a>
                </li>

                <li class="nav-item log-in">
                    <a class="nav-link flex-center bg-blue radius-5px transition-3" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
register">Free Trial</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8214380155cc94cbb42d9d2_07484205', "content");
?>



<!-- ==================================================
                      End get-started
================================================== -->

<!-- ==================================================
                      footer-area
================================================== -->
<section class="footer-area sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <div class="mt-25px mb-25px">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/logo.png" style="max-height: 35px;" class="mb-20px" alt="img">
                    <h6>What is Business suite ?</h6>
                    <p class="mb-20px">A business suite is a set of business software functions enabling the core business and business support processes inside and beyond the boundaries of an organization.</p>
                    <a class="main-btn btn-3" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
register">Get Started</a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="mt-25px mb-25px links">
                    <h4 class="mb-20px">Company</h4>
                    <h6 class="mb-10px">
                        <i class="fa fa-angle-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
about" class="color-333 color-blue-hvr transition-3">About</a>
                    </h6>
                    <h6 class="mb-10px">
                        <i class="fa fa-angle-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
pricing" class="color-333 color-blue-hvr transition-3">Pricing</a>
                    </h6>

                    <h6 class="mb-10px">
                        <i class="fa fa-angle-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
signin" class="color-333 color-blue-hvr transition-3">Sign In</a>
                    </h6>
                    <h6 class="mb-10px">
                        <i class="fa fa-angle-right"></i> <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contact" class="color-333 color-blue-hvr transition-3">Contact</a>
                    </h6>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="mt-25px mb-25px">
                    <h4 class="mb-20px">Contact</h4>
                    <h6><i class="fa fa-map-marker mr-5px fs-15 color-blue bg-gray radius-50 address text-center"></i> Address </h6>
                    <p>350 Rhode Island St Suite 240 <br> San Francisco, CA 94103, USA</p>
                    <h6><i class="fa fa-phone mr-5px fs-15 color-blue bg-gray radius-50 address text-center"></i> +1 (650) 488-7772</h6>
                    <h6 class="mb-30px"><i class="fa fa-envelope mr-5px fs-15 color-blue bg-gray radius-50 address text-center"></i> sales@cloudonex.com</h6>
                    <a href="https://www.facebook.com/cloudonex/" target="_blank" class="social color-blue color-fff-hvr bg-orange-hvr bg-gray text-center radius-50 fs-15 d-inline-block"><i class="fa fa-facebook"></i> </a>
                    <a href="javascript:;" class="social color-blue color-fff-hvr bg-orange-hvr bg-gray text-center radius-50 fs-15 d-inline-block"><i class="fa fa-twitter"></i> </a>
                    <a href="javascript:;" class="social color-blue color-fff-hvr bg-orange-hvr bg-gray text-center radius-50 fs-15 d-inline-block"><i class="fa fa-linkedin"></i> </a>
                    <a href="javascript:;" class="social color-blue color-fff-hvr bg-orange-hvr bg-gray text-center radius-50 fs-15 d-inline-block"><i class="fa fa-behance"></i> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================================================
                      End footer-area
================================================== -->

<!-- ==================================================
                      copyright-area
================================================== -->
<section class="bg-gray sm-padding text-center">
    <div class="container">
        <h6 class="mb-0px">© <?php echo date('Y');?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
">CloudOnex</a> , All rights reserved.</h6>
    </div>
</section>
<!-- ==================================================
                      End copyright-area
================================================== -->


<!-- ==================================================
                      scroll-top-btn
================================================== -->
<div class="scroll-top-btn text-center">
    <i class="fa fa-angle-up fs-20 color-fff bg-blue bg-orange-hvr radius-50"></i>
</div>
<!-- ==================================================
                      End scroll-top-btn
================================================== -->




<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
ui/theme/default/js/frontend.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
/* {block "head"} */
class Block_10147784455cc94cbb422d02_56444185 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_10147784455cc94cbb422d02_56444185',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "head"} */
/* {block "content"} */
class Block_8214380155cc94cbb42d9d2_07484205 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8214380155cc94cbb42d9d2_07484205',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
