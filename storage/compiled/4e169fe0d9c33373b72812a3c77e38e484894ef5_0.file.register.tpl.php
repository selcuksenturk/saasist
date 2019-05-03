<?php
/* Smarty version 3.1.33, created on 2019-05-03 03:38:29
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ccbeff59736c8_57304133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e169fe0d9c33373b72812a3c77e38e484894ef5' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/register.tpl',
      1 => 1556869103,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ccbeff59736c8_57304133 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15070780705ccbeff596ed35_94909183', "head");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18609355625ccbeff5970d75_80154281', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "frontend/base.tpl");
}
/* {block "head"} */
class Block_15070780705ccbeff596ed35_94909183 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_15070780705ccbeff596ed35_94909183',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ($_smarty_tpl->tpl_vars['social_sign_in']->value['google']['enable']) {?>
    <meta name="google-signin-client_id" content="<?php echo $_smarty_tpl->tpl_vars['social_sign_in']->value['google']['client_id'];?>
">
    <?php echo '<script'; ?>
 src="https://apis.google.com/js/platform.js" async defer><?php echo '</script'; ?>
>
<?php }?>

<?php
}
}
/* {/block "head"} */
/* {block "content"} */
class Block_18609355625ccbeff5970d75_80154281 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_18609355625ccbeff5970d75_80154281',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



    <section class="welcome-page register-page sec-padding p-relative o-hidden h-auto">
        <div class="container">
            <div class="row welcome-text sec-padding flex-center">
                <div class="col-md-6 mb-50px">
                    <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/users-with-laptop.png" class="ml-auto mr-auto">
                </div>
                <div class="col-md-6">
                    <h1>Sign Up</h1>
                    <h6 class="fw-400 mt-20px mb-10px color-666">Start your free trial now.</h6>

                    <?php if ($_smarty_tpl->tpl_vars['social_sign_in']->value['google']['enable']) {?>
                        <div class="g-signin2" data-onsuccess="onSignIn"></div>
                    <?php }?>



                    <form id="log-in" action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
signup/post" method="post" class="mt-30px">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group p-relative">
                                    <input type="text" placeholder="Your full name" required name="full_name" class="d-block w-100">
                                    <i class="fa fa-user fs-20 color-blue p-absolute"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group p-relative">
                                    <input type="email" name="email" placeholder="Email" required class="d-block w-100">
                                    <i class="fa fa-envelope fs-20 color-blue p-absolute"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group p-relative">
                            <input type="text" placeholder="Company name" required name="company_name" class="d-block w-100">
                            <i class="fa fa-building-o fs-20 color-blue p-absolute"></i>
                        </div>
                        <div class="form-group p-relative">
                            <input type="password" name="password" placeholder="Choose password" required class="d-inline-block w-100">
                            <i class="fa fa-lock fs-20 color-blue p-absolute"></i>
                        </div>
                        <div class="form-group p-relative">
                            <input type="password" name="password_confirmation" placeholder="Confirm password" required class="d-inline-block w-100">
                            <i class="fa fa-lock fs-20 color-blue p-absolute"></i>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_sitekey'];?>
"></div>
                            </div>
                        <?php }?>

                        <div class="form-group mb-30px">
                            By clicking Create account you agree to the <a href="#0">Terms  of Use</a> and our <a href="#0">Privacy Policy</a>.
                        </div>
                        <button role="button" class="main-btn btn-3 before-gray">Sign Up </button>
                    </form>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
signin" class="d-inline-block mt-20px">Already registered? Sign in</a>
                </div>
            </div>
        </div>
        <div class="shape-1 bg-gray p-absolute">
        </div>
    </section>




    <section class="testimonials sec-padding bg-gray text-center">
        <div class="container">
            <div class="owl-carousel owl-theme">
                <div class="single-review">
                    <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/team-1.jpg" class="radius-50 ml-auto mr-auto mb-20px">
                    <p class="fs-16 fw-300 color-555">
                        No other business financial management application offers the depth and breadth of tools found in CloudOnex.
                    </p>
                    <h5 class="mt-20px mb-0px">Daniel Robert </h5>
                    <span class="color-orange fw-400 fs-15 d-block mb-10px">One mobile solutions</span>
                </div>
                <div class="single-review">
                    <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/team-2.jpg" class="radius-50 ml-auto mr-auto mb-20px">
                    <p class="fs-16 fw-300 color-555">It is the most intuitive, full-featured business software I have ever used,
                        and I have used them all.</p>
                    <h5 class="mt-20px mb-0px">Ken O’Brien</h5>
                    <span class="color-orange fw-400 fs-15 d-block mb-10px">HK Export</span>
                </div>

            </div>
        </div>
    </section>


<?php
}
}
/* {/block "content"} */
}
