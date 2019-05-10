<?php
/* Smarty version 3.1.33, created on 2019-05-07 04:46:56
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/features.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cd14600091ca3_59951370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da37504c026538aa045c17edb70c9bd317e10052' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/features.tpl',
      1 => 1556695882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd14600091ca3_59951370 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6163284275cd1460008ad46_94862127', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "frontend/base.tpl");
}
/* {block "content"} */
class Block_6163284275cd1460008ad46_94862127 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_6163284275cd1460008ad46_94862127',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <section class="welcome-page sec-padding text-center p-relative o-hidden bg-gray">
        <div class="container">
            <div class="row welcome-text sec-padding flex-center">
                <div class="col-md-12 mb-20px z-index-1">
                    <h1 class="color-blue">It’s all coming together</h1>
                </div>
                <div class="col-md-8 text-center">
                    <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/office-meeting.png" class="ml-auto mr-auto">
                </div>
            </div>
        </div>
        <div class="pattern p-absolute">
        </div>
    </section>

    <section class="features-area sec-padding text-center">
        <div class="container">
            <h1 class="title-h">Be more productive with online business software</h1>
            <p class="title-p">Easy & affordable business software with features to run every aspect of your business</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-calculator fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Accounting</h4>
                        <p>Track your revenue & make smarter decisions. Now you can have it all, for less.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-database fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Sales</h4>
                        <p>Sell smarter & faster with integrated billing and sales tools.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-data-validate fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Billing</h4>
                        <p>Invoice customers and get paid online.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-cube fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Purchases & Orders</h4>
                        <p>Manage purchased and orders in one single palce.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-support fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Customer Service</h4>
                        <p>Offer customer service with built in Tickets and Knowledgebase.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-task-o fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Productivity Tools</h4>
                        <p>Calendar, Tasks, SMS and many other tools. Also you can develop, extend with plugins.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="get-started bg-gray text-center triangle-top triangle-bottom">
        <div class="container">
            <div class="row mb-50px">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 z-index-2">
                    <h3 class="mb-10px">Get started for free today.</h3>
                    <p class="mb-30px">Try it Free for 30 days. No credit card required. Cancel anytime.</p>
                    <form class="p-relative" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
register">
                        <input type="email" name="email" required class="radius-50px mb-10px pl-15px pt-7px pb-7px no-border w-100" placeholder="Enter your email">
                        <button class="bg-orange color-fff radius-50px pr-15px pl-15px pt-7px pb-7px no-border p-absolute">Get Started</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


<?php
}
}
/* {/block "content"} */
}
