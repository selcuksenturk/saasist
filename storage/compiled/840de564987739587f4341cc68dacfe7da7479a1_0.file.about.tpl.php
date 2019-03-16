<?php
/* Smarty version 3.1.33, created on 2019-02-14 06:15:06
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/about.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c654dba3431b4_73683501',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '840de564987739587f4341cc68dacfe7da7479a1' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/about.tpl',
      1 => 1547035868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c654dba3431b4_73683501 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2196665535c654dba340264_60492881', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "frontend/base.tpl");
}
/* {block "content"} */
class Block_2196665535c654dba340264_60492881 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2196665535c654dba340264_60492881',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




    <section class="welcome-agency text-center" data-scroll-index="1" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/team-brainstorm-meeting-in-bright-sunny-office_925x.jpg)">
        <div class="overlay-bg-75 flex-center">
            <div class="container">
                <div class="welcome-text">
                    <h1 class="mb-20px color-fff">Who we are and what we do</h1>
                    <p class="color-aaa">More about us and the people behind it.</p>
                    <a class="main-btn btn-1 mt-10px mr-10px before-gray" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contact">Say Hi!</a>

                </div>
            </div>
        </div>
    </section>


    <section class="brands-area bg-gray md-padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/br4.png">
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/br5.png">
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/br6.png">
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/br2.png">
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/br3.png">
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/br1.png">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about-area sec-padding" data-scroll-index="2">

        <div class="container">
            <div class="row mb-50px">
                <div class="col-md-6">
                    <div class="mt-25px mb-25px wow fadeInLeft">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/business-woman-flow-chart_925x.jpg" alt="img">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mt-25px mb-25px wow fadeInRight" data-wow-delay="0.7s">
                        <span class="color-blue fs-18 fw-500">About</span>
                        <h3 class="mt-10px mb-15px fw-600">The product</h3>
                        <p class="mb-15px">StackB is a groundbreaking innovative company based in San Francisco that aims to simplify business management to the businesses. Our goal is to deliver the best product experience for businesses and their customers. </p>
                        <p class="mb-10px"><i class="fa fa-check color-blue mr-5px"></i>We’ve gained tons of knowledge about growth and customer relations.</p>
                        <p class="mb-10px"><i class="fa fa-check color-blue mr-5px"></i>Our team is focused to build best business management software.</p>
                        <p><i class="fa fa-check color-blue mr-5px"></i>We are always open for the feedbacks.</p>
                        <a class="main-btn btn-3 mt-25px" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
contact">Contact us</a>
                    </div>
                </div>
            </div>


        </div>
    </section>



<?php
}
}
/* {/block "content"} */
}
