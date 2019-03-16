<?php
/* Smarty version 3.1.33, created on 2019-02-14 05:27:21
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/signin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c6542891fa9d8_13371994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11716e7648de678c21392d26bc9aa0ecfddedfdc' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/frontend/signin.tpl',
      1 => 1542631740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6542891fa9d8_13371994 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1171025525c6542891af8b0_37000959', "head");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_486236095c6542891ec365_57322473', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "frontend/base.tpl");
}
/* {block "head"} */
class Block_1171025525c6542891af8b0_37000959 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_1171025525c6542891af8b0_37000959',
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
class Block_486236095c6542891ec365_57322473 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_486236095c6542891ec365_57322473',
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
