<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{$_L['Register']} - {$_title}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{$app_url}apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{$app_url}favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{$app_url}favicon-16x16.png">
    <link rel="manifest" href="{$app_url}site.webmanifest">
    <link rel="mask-icon" href="{$app_url}safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
    <link rel="stylesheet" href="{$app_url}ui/lib/bootstrap/css/bootstrap.min.css">
    <script src="{$app_url}ui/lib/jquery.min.js"></script>
    <script src="{$app_url}ui/lib/bootstrap/js/bootstrap.bundle.min.js"></script>


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

    {if $config['recaptcha'] eq '1'}
        <script src='https://www.google.com/recaptcha/api.js'></script>
    {/if}

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
                                    <a class="link-fx text-primary font-w700 font-size-h1" href="{$base_url}signup/post">
                                        <img class="logo" src="{$app_url}storage/system/{$config['logo_default']}" alt="Logo">
                                    </a>

                                    <div class="mt-3">
                                        <p class="text-muted"> <span style="font-size: 20px;">Get Started</span> <br>
                                            Give us a try FREE for 30 days. No credit card is needed.</p>
                                    </div>
                                </div>

                                {if isset($notify)}
                                    {$notify}
                                {/if}

                                <form action="{$base_url}signup/post" method="post">

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
                                    {if $config['recaptcha'] eq '1'}
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="{$config['recaptcha_sitekey']}"></div>
                                        </div>
                                    {/if}
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
</html>