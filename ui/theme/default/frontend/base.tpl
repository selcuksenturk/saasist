<!doctype html>
<html lang="en">

{literal}
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-3895722-26"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-3895722-26');
</script>

<script type="text/javascript">
(function(a,l,b,c,r,s){
_nQc=c,r=a.createElement(l),s=a.getElementsByTagName(l)[0];
r.async=1;
r.src=l.src=("https:"==a.location.protocol?"https://":"http://")+b;
s.parentNode.insertBefore(r,s);})
(document,"script","serve.albacross.com/track.js","89093290");
</script>

<!-- Salesflare tracking -->
<script src="https://track.salesflare.com/flare.js"></script>
<script>
	var flare = new Flare();
	flare.track("_j8HUebSSnLDWR3fMuuDTkf-qQcdukV31kVS_ogWsU0tE");
</script>

<script src="//adpxl.co/Bt7feHB0/an.js"></script><noscript><img src="//adpxl.co/Bt7feHB0/spacer.gif" alt=""></noscript>

<script>
    Userback = window.Userback || {};
    Userback.access_token = '3615|5004|i6WPXvPcAWFnrSSmMdy0oggERhk4gCUbt3WeZy3AiCAZHv6vHb';
    (function(id) {
        var s = document.createElement('script');
        s.async = 1;s.src = 'https://static.userback.io/widget/v1.js';
        var parent_node = document.head || document.body;parent_node.appendChild(s);
    })('userback-sdk');
</script>

<!-- start Gist JS code--><script>    (function(d,h,w){var gist=w.gist=w.gist||[];gist.methods=['trackPageView','identify','track','setAppId'];gist.factory=function(t){return function(){var e=Array.prototype.slice.call(arguments);e.unshift(t);gist.push(e);return gist;}};for(var i=0;i<gist.methods.length;i++){var c=gist.methods[i];gist[c]=gist.factory(c)}s=d.createElement('script'),s.src="https://widget.getgist.com",s.async=!0,e=d.getElementsByTagName(h)[0],e.appendChild(s),s.addEventListener('load',function(e){},!1),gist.setAppId("po9y4gho"),gist.trackPageView()})(document,'head',window);</script><!-- end Gist JS code-->
{/literal}

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