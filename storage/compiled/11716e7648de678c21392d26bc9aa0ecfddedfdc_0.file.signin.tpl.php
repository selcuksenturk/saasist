<?php
/* Smarty version 3.1.33, created on 2019-05-01 03:37:38
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/signin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cc94cc2dbc5e4_65275253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11716e7648de678c21392d26bc9aa0ecfddedfdc' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/signin.tpl',
      1 => 1556695882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cc94cc2dbc5e4_65275253 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17897114195cc94cc2db0016_92752541', "head");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1203962525cc94cc2db5a41_96885064', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "frontend/base.tpl");
}
/* {block "head"} */
class Block_17897114195cc94cc2db0016_92752541 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_17897114195cc94cc2db0016_92752541',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php if (isset($_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login']) && $_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login'] == 1) {?>

        <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
            <?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js'><?php echo '</script'; ?>
>
        <?php }?>

    <?php }
}
}
/* {/block "head"} */
/* {block "content"} */
class Block_1203962525cc94cc2db5a41_96885064 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1203962525cc94cc2db5a41_96885064',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <section class="welcome-area sec-padding p-relative o-hidden bg-gray" data-scroll-index="1">
        <div class="container">
            <div class="row welcome-text sec-padding flex-center">

                <div class="col-md-6">
                    <img alt="img" src="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
storage/pages/single-user-with-laptop.png">
                </div>

                <div class="col-md-6 mb-50px z-index-1">

                    <div class="card"">

                        <div class="card-body">
                            <h5 class="card-title">Login</h5>

                            <form class="login" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
login/post/<?php if (isset($_smarty_tpl->tpl_vars['after']->value)) {
echo $_smarty_tpl->tpl_vars['after']->value;?>
/<?php }?>">

                                <div class="form-group m-bottom-md">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>


                                <?php if (isset($_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login']) && $_smarty_tpl->tpl_vars['config']->value['config_recaptcha_in_admin_login'] == 1) {?>

                                    <?php if ($_smarty_tpl->tpl_vars['config']->value['recaptcha'] == '1') {?>
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['config']->value['recaptcha_sitekey'];?>
"></div>
                                        </div>
                                    <?php }?>

                                <?php }?>



                                <button type="submit" class="btn btn-primary">Submit</button>


                            </form>

                            <div style="margin-top: 30px;">
                                <div>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
admin/forgot-pw/" class="font-12"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Forgot password'];?>
</a>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="pattern p-absolute">
        </div>
    </section>


<?php
}
}
/* {/block "content"} */
}
