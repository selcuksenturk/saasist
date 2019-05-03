<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {if isset($page_title)}
        <title>Asist | Business in Assistance</title>
    {else}
        <title>Asist | Business in Assistance</title>
    {/if}

    <!-- Bootstrap CSS -->
    <link href="{$app_url}/ui/theme/default/css/frontend.css?ver=a{$file_build}" rel="stylesheet">
    <link href="{$app_url}/ui/assets/css/font-awesome.min.css?ver={$file_build}" rel="stylesheet">
    <link href="{$app_url}/ui/assets/css/iconmonstr-iconic-font.min.css?ver={$file_build}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800%7cPoppins:100,200,300,400,500,600,700,800" rel="stylesheet">

    {block name="head"}{/block}

</head>
<body>


<!-- ==================================================
                      navbar
================================================== -->
<nav class="navbar navbar-transparent {if isset($_navbar_is_white)} navbar-transparent {else} navbar-black-links{/if} navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{$app_url}">
            <img src="{$app_url}storage/pages/logo.png" style="max-height: 50px;" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {if $_active_menu == 'Home'}active{/if}" href="{$app_url}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {if $_active_menu == 'Features'}active{/if}" href="{$_url}features">Features</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {if $_active_menu == 'Pricing'}active{/if}" href="{$_url}pricing">Pricing</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {if $_active_menu == 'Signin'}active{/if}" href="{$_url}signin">Sign in</a>
                </li>

                <li class="nav-item log-in">
                    <a class="nav-link flex-center bg-blue radius-5px transition-3" href="{$_url}register">Sign up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{block name="content"}{/block}

<!-- ==================================================
                      End get-started
================================================== -->


<!-- ==================================================
                      footer-area
================================================== -->

<!-- ==================================================
                      End footer-area
================================================== -->


<!-- ==================================================
                      copyright-area
================================================== -->
<section class="bg-gray sm-padding text-center">
    <div class="container">
        <h6 class="mb-0px">All rights reserved | <a href="{$app_url}">Asist</a> © {date(Y)}</h6>
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


{*<script src="js/jquery-3.3.1.min.js"></script>*}
{*<script src="js/jquery-migrate-3.0.0.min.js"></script>*}
{*<script src="js/popper.min.js"></script>*}
{*<script src="js/bootstrap.min.js"></script>*}
{*<script src="js/jquery.counterup.min.js"></script>*}
{*<script src="js/jquery.waypoints.min.js"></script>*}
{*<script src="js/lity.min.js"></script>*}
{*<script src="js/scrollIt.min.js"></script>*}
{*<script src="js/validator.js"></script>*}
{*<script src="js/owl.carousel.min.js"></script>*}
{*<script src="js/main.js"></script>*}
{*<script src="js/wow.min.js"></script>*}

<script src="{$app_url}ui/theme/default/js/frontend.js"></script>

</body>
</html>