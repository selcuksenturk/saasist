{extends file="frontend/base.tpl"}

{block name="head"}

{if $social_sign_in['google']['enable']}
    <meta name="google-signin-client_id" content="{$social_sign_in['google']['client_id']}">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
{/if}

{/block}

{block name="content"}

    <section class="welcome-page register-page sec-padding p-relative o-hidden h-auto">
        <div class="container">
            <div class="row welcome-text sec-padding flex-center">
                <div class="col-md-6 mb-50px">
                    <img alt="img" src="{$app_url}storage/pages/users-with-laptop.png" class="ml-auto mr-auto">
                </div>
                <div class="col-md-6">
                    <h1>Sign up for free * Forever!</h1>
                    
                    <form id="log-in" action="{$base_url}signup/post" method="post" class="mt-30px">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group p-relative">
                                    <input type="text" placeholder="Full Name" required name="full_name" class="d-block w-100">
                                    <i class="fa fa-user fs-20 color-blue p-absolute"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group p-relative">
                                    <input type="email" name="email" placeholder="E-mail" required class="d-block w-100">
                                    <i class="fa fa-envelope fs-20 color-blue p-absolute"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group p-relative">
                            <input type="text" placeholder="Company Name" required name="company_name" class="d-block w-100">
                            <i class="fa fa-building-o fs-20 color-blue p-absolute"></i>
                        </div>
                        <div class="form-group p-relative">
                            <input type="password" name="password" placeholder="Choose Password" required class="d-inline-block w-100">
                            <i class="fa fa-lock fs-20 color-blue p-absolute"></i>
                        </div>
                        <div class="form-group p-relative">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="d-inline-block w-100">
                            <i class="fa fa-lock fs-20 color-blue p-absolute"></i>
                        </div>

                        {if $config['recaptcha'] eq '1'}
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="{$config['recaptcha_sitekey']}"></div>
                            </div>
                        {/if}

                        <div class="form-group mb-30px">
                            * By clicking "Register" you will agree <a href="#0">Terms  of Use</a> & <a href="#0">Privacy Policy</a>.
                        </div>
                        <button role="button" class="main-btn btn-3 before-gray">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="shape-1 bg-gray p-absolute">
        </div>
    </section>

{/block}