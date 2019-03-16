<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1" />
    <meta name="author" content="SmartTemplates" />
    <meta name="description" content="landing page template for saas companies" />
    <meta name="keywords" content="landing page template, saas landing page template, saas website template, one page saas template" />
    <title>{$brand_name} | Cloud Account, CRM & Billing Software</title>
    <link rel="stylesheet" href="{$app_url}ui/assets/css/saas_landing.css?v=2">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,900" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="header__content header__content--fluid-width">
        <div class="header__logo-title">{$brand_name}</div>
        <nav class="header__menu">
            <ul>
                <li><a class="selected header-link" href="#intro">HOME</a></li>
                <li class="menu-item-has-children"><a href="#features" class="header-link">FEATURES</a>
                    <ul class="sub-menu">
                        <li><a href="#about" class="header-link">OUR PRODUCTS</a></li>
                        <li><a href="#morefeatures" class="header-link">HOW IT WORKS</a></li>
                        <li><a href="#clients" class="header-link">OUR CLIENTS</a></li>
                        <li><a href="#testimonials" class="header-link">TESTIMONIALS</a></li>
                        <li><a href="#support" class="header-link">SUPPORT</a></li>
                    </ul>
                </li>
                <li><a href="#pricing" class="header-link">PRICING</a></li>
                <li><a href="#support" class="header-link">CONTACT</a></li>
                <li class="header__btn header__btn--login modal-toggle" data-openpopup="signuplogin" data-popup="login"><a href="#">LOGIN</a></li>
                <li class="header__btn header__btn--signup modal-toggle" data-openpopup="signuplogin" data-popup="signup"><a href="#">GET STARTED</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Section intro -->
<section class="section section--intro" id="intro">
    <div class="section__content section__content--fluid-width section__content--intro">
        <div class="intro">
            <div class="intro__content">
                <div class="intro__subtitle">Your business on the cloud</div>
                <div class="intro__title"><span>Something Great</span> will happen for your clients.</div>
                <div class="intro__description">Request a free demo <span>today</span></div>
                <div class="intro__form form-demo">
                    <form id="DemoForm" method="post" action="index.html">
                        <input type="text" class="form-demo__input" name="demourl" value="" placeholder="your email" />
                        <input type="submit" name="submit" class="form-demo__submit" id="submit" value="SEND" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-animation">
        <img src="images/intro-animation.png" alt="" title=""/>
    </div>
    <svg class="svg-intro-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <defs> <linearGradient id="linear" x1="0" y1="0%" x2="100%" y2="20%" spreadMethod="pad"> <stop offset="0%" stop-color="#64b13d"/> <stop offset="100%" stop-color="#088957"/> </linearGradient> </defs>
        <path d="M30,0 L56,80 Q57.5,84.4 60,82 L100,40 100,0 Z" fill="url(#linear)" fill-opacity="0.8"/>
    </svg>
</section>

<!-- Section features -->
<section class="section section--features" id="features">

    <div class="section__content section__content--fluid-width">
        <div class="grid grid--4col grid--features">

            <div class="grid__item grid__item--featured">
                <h3 class="grid__title"><span>Responsive</span> Layout</h3>
                <p class="grid__text">Responsive code that makes your landing page look good on all devices (desktops, tablets, and phones). Created with mobile specialists.</p>
                <div class="grid__icon"><img src="images/icons/icons/responsive.png" alt="" title=""/></div>
            </div>
            <div class="grid__item">
                <h3 class="grid__title">SaaS <span>Analysis</span></h3>
                <p class="grid__text">A perfect structure created after we analized trends in SaaS landing page designs. Analysis made to the most popular SaaS businesses.</p>
                <div class="grid__icon"><img src="images/icons/icons/analysis.png" alt="" title=""/></div>
            </div>

            <div class="grid__item">
                <h3 class="grid__title">Smart <span>BEM</span> Grid</h3>
                <p class="grid__text">Blocks, Elements and Modifiers. A smart HTML/CSS structure that can easely be reused. Layout driven by the purpose of modularity.</p>
                <div class="grid__icon"><img src="images/icons/icons/grid.png" alt="" title=""/></div>
            </div>

            <div class="grid__item">
                <h3 class="grid__title">Target <span>audience</span></h3>
                <p class="grid__text">Blocks, Elements and Modifiers. A smart HTML/CSS structure that can easely be reused. Layout driven by the purpose of modularity.</p>
                <div class="grid__icon"><img src="images/icons/icons/target.png" alt="" title=""/></div>
            </div>

        </div>
    </div>


</section>

<!-- Section about -->
<section class="section section--about" id="about">

    <div class="section__content section__content--fluid-width section__content--about">
        <div class="grid grid--5col grid--about">

            <div class="grid__item grid__item--x2">
                <h3 class="grid__title">Build your SAAS landing page using the <span>intelligent BEM interface</span></h3>
                <p class="grid__text">Blocks, Elements and Modifiers. A smart HTML/CSS structure that can easely be reused. Layout driven by the purpose of modularity.</p>
                <ul class="grid__list">
                    <li>Simple and Smart HTML code</li>
                    <li>Works reintegrated in any part of the layout</li>
                    <li>Reuse the elements from one design to another</li>
                </ul>

            </div>
            <div class="grid__item grid__item--x3">
                <div class="grid__image grid__image--right" data-paroller-factor="0.2" data-paroller-type="foreground" data-paroller-direction="vertical"><img src="images/desktop-frame-about.png" alt="" title=""/></div>
            </div>
        </div>
    </div>

</section>
<!-- Section about -->
<section class="section section--about">

    <div class="section__content section__content--fluid-width section__content--about">
        <div class="grid grid--5col grid--about">


            <div class="grid__item grid__item--x2 grid__item--floated-right">
                <h3 class="grid__title">Powerful services for <span>powerful applications</span></h3>
                <p class="grid__text">Responsive code that makes your landing page look good on all devices (desktops, tablets, and phones). Created with mobile specialists.</p>
                <ul class="grid__list">
                    <li>Responsive code</li>
                    <li>Look good on all devices</li>
                    <li>Created with mobile specialists</li>
                </ul>

            </div>
            <div class="grid__item grid__item--x3">
                <div class="grid__image grid__image--left" data-paroller-factor="0.2" data-paroller-type="foreground" data-paroller-direction="vertical"><img src="images/desktop-frame-about-2.png" alt="" title=""/></div>
            </div>
        </div>
    </div>

</section>
<!-- Section about -->
<section class="section section--about" id="about2">

    <div class="section__content section__content--fluid-width section__content--about">
        <div class="grid grid--5col grid--about">

            <div class="grid__item grid__item--x2">
                <h3 class="grid__title">Layout driven by the <span>purpose of modularity</span>.</h3>
                <p class="grid__text">Choose between multiple unique designs and easy integrate elements from one design to another. Following the latest design trends.</p>
                <ul class="grid__list">
                    <li>Elements from one design to another</li>
                    <li>Following the latest design trends</li>
                    <li>Reuse the elements from one design to another</li>
                </ul>

            </div>
            <div class="grid__item grid__item--x3">
                <div class="grid__image grid__image--right" data-paroller-factor="0.2" data-paroller-type="foreground" data-paroller-direction="vertical"><img src="images/desktop-frame-about-3.png" alt="" title=""/></div>
            </div>
        </div>
    </div>

</section>

<!-- Section features -->
<section class="section section--more-features" id="morefeatures">

    <div class="section__content section__content--fluid-width">
        <h2 class="section__title section__title--centered">More features</h2>
        <div class="section__description section__description--centered">
            We believe we have created the most efficient SaaS landing page for your users. Landing page with features that will convince you to use it for your SaaS business.
        </div>
        <div class="grid grid--5col grid--more-features">

            <div class="grid__item">
                <div class="grid__icon"><img src="images/icons/icons/security.png" alt="" title=""/></div>
                <h3 class="grid__title"><span>Reliable </span>and secure</h3>
            </div>

            <div class="grid__item">
                <div class="grid__icon"><img src="images/icons/icons/payment.png" alt="" title=""/></div>
                <h3 class="grid__title">Secure <span>payment</span></h3>
            </div>

            <div class="grid__item">
                <div class="grid__icon"><img src="images/icons/icons/location.png" alt="" title=""/></div>
                <h3 class="grid__title">Location <span>detection</span></h3>
            </div>

            <div class="grid__item">
                <div class="grid__icon"><img src="images/icons/icons/users.png" alt="" title=""/></div>
                <h3 class="grid__title">User <span>friendly</span></h3>
            </div>

            <div class="grid__item">
                <div class="grid__icon"><img src="images/icons/icons/calendar.png" alt="" title=""/></div>
                <h3 class="grid__title">Calendar <span>widget</span></h3>
            </div>


        </div>
        <div class="grid grid--5col grid--more-features">


            <div class="grid__item">
                <div class="grid__icon"><img src="images/icons/icons/clock.png" alt="" title=""/></div>
                <h3 class="grid__title"><span>Time </span>saving</h3>
            </div>

            <div class="grid__item">
                <div class="grid__icon"><img src="images/icons/icons/cloud.png" alt="" title=""/></div>
                <h3 class="grid__title">Cloud <span>Storage</span></h3>
            </div>

            <div class="grid__item">
                <div class="grid__icon"><img src="images/icons/icons/chat.png" alt="" title=""/></div>
                <h3 class="grid__title">Chat <span>module</span></h3>
            </div>

            <div class="grid__item">
                <div class="grid__icon"><img src="images/icons/icons/mobile.png" alt="" title=""/></div>
                <h3 class="grid__title">Mobile <span>ready</span></h3>
            </div>

            <div class="grid__item">
                <div class="grid__icon"><img src="images/icons/icons/award.png" alt="" title=""/></div>
                <h3 class="grid__title">Award <span>company</span></h3>
            </div>


        </div>
    </div>


</section>

<!-- Section testimonials -->
<section class="section section--testimonials" id="testimonials">

    <div class="section__content section__content--full-width section__content--padding">
        <h2 class="section__title section__title--centered">Success stories</h2>
        <div class="testimonials">
            <div class="testimonials__content swiper-wrapper">
                <div class="testimonials__slide swiper-slide">

                    <div class="testimonials__thumb"><img src="images/avatar-1.jpg" alt="" title=""/></div>
                    <div class="testimonials__source">Lason Duvan <a href="#">New York Business Center</a></div>
                    <div class="testimonials__text"><p>"Business is all about the customer: what the customer wants and what they get. "</p></div>

                </div>
                <div class="testimonials__slide swiper-slide">
                    <div class="testimonials__thumb"><img src="images/avatar-2.jpg" alt="" title=""/></div>
                    <div class="testimonials__source">Jada Sacks <a href="#">Paris Tehnics</a></div>
                    <div class="testimonials__text"><p>" I've internalized it to the point of understanding that the success of my actions and/or endeavors"</p></div>

                </div>
                <div class="testimonials__slide swiper-slide">
                    <div class="testimonials__thumb"><img src="images/avatar-3.jpg" alt="" title=""/></div>
                    <div class="testimonials__source">Lason Duvan <a href="#">Music Software</a></div>
                    <div class="testimonials__text"><p>"The American Dream is that any man or woman, despite of his or her background circumstances"</p></div>

                </div>
                <div class="testimonials__slide swiper-slide">
                    <div class="testimonials__thumb"><img src="images/avatar-4.jpg" alt="" title=""/></div>
                    <div class="testimonials__source">Duran Jackson <a href="#">New York Business Center</a></div>
                    <div class="testimonials__text"><p>"Generally, every customer wants a product or service that solves their problem, worth their money"</p></div>

                </div>
                <div class="testimonials__slide swiper-slide">
                    <div class="testimonials__thumb"><img src="images/avatar-5.jpg" alt="" title=""/></div>
                    <div class="testimonials__source">Maria Allesi <a href="#">Italy Solutions</a></div>
                    <div class="testimonials__text"><p>"No one can make you successful; the will to success comes from within.' I've made this my motto."</p></div>

                </div>
                <div class="testimonials__slide swiper-slide">
                    <div class="testimonials__thumb"><img src="images/avatar-6.jpg" alt="" title=""/></div>
                    <div class="testimonials__source">Jenifer Patrison<a href="#">App Dating</a></div>
                    <div class="testimonials__text"><p>"Can change their circumstances and rise as high as they are willing to work"</p></div>

                </div>
            </div>

            <div class="testimonials__pagination swiper-pagination"></div>

        </div>
        <div class="clear"></div>
    </div>

</section>


<!-- Section pricing -->
<section class="section" id="pricing">

    <div class="section__content section__content--fluid-width section__content--padding">
        <h2 class="section__title section__title--centered">Our Plans</h2>
        <div class="section__description section__description--centered">
            We believe we have created the most efficient SaaS landing page for your users. Landing page with features that will convince you to use it for your SaaS business.
        </div>


        <div class="pricing">
            <div class="pricing__switcher switcher">
                <div class="switcher__buttons">
                    <div class="switcher__button switcher__button--enabled">Monthly</div>
                    <div class="switcher__button">Yearly</div>
                    <div class="switcher__border"></div>
                </div>

            </div>


            <div class="pricing__plan">
                <h3 class="pricing__title">FREE</h3>
                <div class="pricing__values">
                    <div class="pricing__value pricing__value--show"><span>$</span>0 <b>/ month</b></div>
                    <div class="pricing__value pricing__value--hide pricing__value--hidden"><span>$</span>0 <b>/ yearly</b></div>
                </div>
                <ul class="pricing__list">
                    <li><b>1</b> User Account</li>
                    <li><b>10</b> Team Members</li>
                    <li><b>Unlimited</b> Emails Accounts</li>
                    <li>Set And Manage Permissions</li>
                    <li class="disabled">API &amp; extension support</li>
                    <li class="disabled">Developer support</li>
                    <li class="disabled">A / B Testing</li>
                </ul>
                <a class="pricing__signup" href="">Sign up</a>
            </div>
            <div class="pricing__plan pricing__plan--popular">
                <div class="pricing__badge-bg"></div>
                <div class="pricing__badge-text">POPULAR</div>
                <h3 class="pricing__title">PRO</h3>
                <div class="pricing__values">
                    <div class="pricing__value pricing__value--show"><span>$</span>49 <b>/ month</b></div>
                    <div class="pricing__value pricing__value--hide pricing__value--hidden"><span>$</span>529 <b>/ yearly</b></div>
                </div>
                <ul class="pricing__list">
                    <li><b>50</b> User Account</li>
                    <li><b>500</b> Team Members</li>
                    <li><b>Unlimited</b> Emails Accounts</li>
                    <li>Set And Manage Permis sions</li>
                    <li>API &amp; extension support</li>
                    <li>Developer support</li>
                    <li class="disabled">A / B Testing</li>
                </ul>
                <a class="pricing__signup" href="">Sign up</a>
            </div>
            <div class="pricing__plan">
                <h3 class="pricing__title">ULTRA</h3>
                <div class="pricing__values">
                    <div class="pricing__value pricing__value--show"><span>$</span>99 <b>/ month</b></div>
                    <div class="pricing__value pricing__value--hide pricing__value--hidden"><span>$</span>900 <b>/ yearly</b></div>
                </div>
                <ul class="pricing__list">
                    <li><b>Unlimited</b> User Account</li>
                    <li><b>Unlimited</b> Team Members</li>
                    <li><b>Unlimited</b> Emails Accounts</li>
                    <li>Set And Manage Permissions</li>
                    <li>API &amp; extension support</li>
                    <li>Developer support</li>
                    <li>A / B Testing</li>

                </ul>
                <a class="pricing__signup" href="">Sign up</a>
            </div>
        </div>

        <div class="clear"></div>
    </div>

</section>





<!-- Section -->
<section class="section section--clients" id="clients">
    <div class="section__content section__content--fluid-width">
        <div class="grid grid--5col">

            <div class="grid__item">
                <div class="grid__client-logo"><a href="#"><img src="images/clients/clients-logo1.png" alt="" title=""/></a></div>
            </div>
            <div class="grid__item">
                <div class="grid__client-logo"><a href="#"><img src="images/clients/clients-logo2.png" alt="" title=""/></a></div>
            </div>
            <div class="grid__item">
                <div class="grid__client-logo"><a href="#"><img src="images/clients/clients-logo3.png" alt="" title=""/></a></div>
            </div>
            <div class="grid__item">
                <div class="grid__client-logo"><a href="#"><img src="images/clients/clients-logo4.png" alt="" title=""/></a></div>
            </div>
            <div class="grid__item">
                <div class="grid__client-logo"><a href="#"><img src="images/clients/clients-logo5.png" alt="" title=""/></a></div>
            </div>
        </div>

    </div>
</section>



<!-- Section -->
<section class="section section--support" id="support">
    <div class="section__content section__content--fluid-width section__content--support">
        <div class="grid grid--2col grid--support">
            <div class="grid__item grid__item--padding">

                <h3 class="grid__title">Ready to get started?</h3>
                <p class="grid__text">Find out what LATERAL can do for your business</p>
            </div>
            <div class="grid__item grid__item--padding">
                <a href="#" class="grid__more">REQUEST A FREE DEMO</a>
            </div>

        </div>
        <div class="clear"></div>
    </div>
    <svg class="svg-support-bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path d="M0,50 L100,50 100,100 0,100 Z" fill="#f7f8f9"/>
    </svg>
</section>


<footer class="footer" id="footer">
    <div class="footer__content footer__content--fluid-width footer__content--svg">

        <div class="grid grid--5col">

            <div class="grid__item grid__item--x2">
                <h3 class="grid__title grid__title--footer-logo">LATERAL</h3>
                <p class="grid__text grid__text--copyright">Copyright &copy; 2018 LATERAL.  <br />All Rights Reserved. Proudly made in EU. </p>
                <ul class="grid__list grid__list--sicons">
                    <li><a href="#"><img src="images/social/black/twitter.png" alt="" title=""/></a></li>
                    <li><a href="#"><img src="images/social/black/facebook.png" alt="" title=""/></a></li>
                    <li><a href="#"><img src="images/social/black/linkedin.png" alt="" title=""/></a></li>
                </ul>
            </div>
            <div class="grid__item">
                <h3 class="grid__title grid__title--footer">Company</h3>
                <ul class="grid__list grid__list--fmenu">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Carrers</a></li>
                    <li><a href="#">Awards</a></li>
                    <li><a href="#">Users Program</a></li>
                    <li><a href="#">Locations</a></li>
                </ul>
            </div>
            <div class="grid__item">
                <h3 class="grid__title grid__title--footer">Products</h3>
                <ul class="grid__list grid__list--fmenu">

                    <li><a href="#">Integrations</a></li>
                    <li><a href="#">API</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Release Notes</a></li>
                </ul>
            </div>
            <div class="grid__item">
                <h3 class="grid__title grid__title--footer">Support</h3>
                <ul class="grid__list grid__list--fmenu">
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Press</a></li>

                </ul>
            </div>

        </div>


    </div>


</footer>


<section class="modal modal--signuplogin">
    <div class="modal__overlay modal__overlay--toggle"></div>
    <div class="modal__wrapper modal-transition">

        <div class="modal__body">

            <div class="modal__content modal__content--login">
                <div class="modal__info">
                    <h2 class="modal__title">First time here?</h2>
                    <div class="modal__descr">Join now and get <span>20% OFF</span> for all products</div>
                    <ul class="modal__list">
                        <li>premium access to all products</li>
                        <li>free testing tools</li>
                        <li>unlimited user accounts</li>
                    </ul>
                    <button class="modal__switch modal__switch--signup" data-popup="signup">Signup</button>
                </div>
                <div class="modal__form form">
                    <h2 class="form__title">Login</h2>
                    <form class="form__container" id="LoginForm" method="post" action="index.html">

                        <div class="form__row">
                            <label class="form__label" for="namec">Name</label>
                            <input name="namec" id="namec" class="form__input" type="text"/>
                            <span class="form__row-border"></span>
                        </div>
                        <div class="form__row">
                            <label class="form__label">Email</label>
                            <input name="emailc" class="form__input" type="text"/>
                            <span class="form__row-border"></span>
                        </div>

                        <div class="modal__checkbox"><input id="remember" name="remember" value="remember" checked type="checkbox"><label for="remember">Keep me Signed in</label></div>
                        <div class="modal__switch modal__switch--forgot" data-popup="forgot">Forgot Password?</div>
                        <input type="submit" name="submit" class="form__submit btn btn--green-bg" id="submitl" value="LOGIN" />
                    </form>
                </div>
            </div>  <!-- End Modal login -->

            <div class="modal__content modal__content--forgot">
                <div class="modal__form form">
                    <h2 class="form__title">Forgot Password</h2>
                    <form class="form__container" id="ForgotForm" method="post" action="index.html">
                        <div class="form__row">
                            <label class="form__label">Email</label>
                            <input name="emailf" class="form__input" type="text"/>
                            <span class="form__row-border"></span>
                        </div>
                        <input type="submit" name="submit" class="form__submit btn btn--green-bg" id="submitf" value="RESET PASSWORD" />
                    </form>
                </div>
                <div class="modal__info">
                    <h2 class="modal__title">We got you covered</h2>
                    <div class="modal__descr">A new password will be sent by email. Remembered your password?</div>
                    <button class="modal__switch modal__switch--signup" data-popup="login">Login</button>
                </div>
            </div>  <!-- End Modal login -->


            <div class="modal__content modal__content--signup">
                <div class="modal__form form">
                    <h2 class="form__title">Signup</h2>
                    <form class="form__container" id="SignupForm" method="post" action="index.html">
                        <div class="form__row">
                            <label class="form__label" for="names">Username</label>
                            <input name="namec" id="names" class="form__input" type="text"/>
                            <span class="form__row-border"></span>
                        </div>
                        <div class="form__row">
                            <label class="form__label">Email</label>
                            <input name="emails" class="form__input" type="text"/>
                            <span class="form__row-border"></span>
                        </div>
                        <div class="form__row">
                            <label class="form__label" for="pass">Password</label>
                            <input name="pass" id="pass" class="form__input" type="password"/>
                            <span class="form__row-border"></span>
                        </div>
                        <input type="submit" name="submit" class="form__submit btn btn--green-bg" id="submit" value="SIGNUP" />
                    </form>
                </div>
                <div class="modal__info">
                    <h2 class="modal__title">Allready have an account?</h2>
                    <div class="modal__descr">Login now and starting using our <span>amazing</span> products</div>
                    <ul class="modal__list">
                        <li>premium access to all products</li>
                        <li>free testing tools</li>
                        <li>unlimited user accounts</li>
                    </ul>
                    <button class="modal__switch modal__switch--login" data-popup="login">Login</button>
                </div>
            </div>  <!-- End Modal signup -->

        </div>

    </div>
</section>    <!-- Modal for Login and Signup -->

<section class="modal modal--animation">
    <div class="modal__overlay modal__overlay--toggle"></div>
    <div class="modal__wrapper modal__wrapper--image modal-transition">
        <div class="modal__body">
            <button class="modal__close modal__overlay--toggle"><span></span></button>
            <div class="modal__header">How it works animation</div>

            <div class="modal__image">
                <img src="images/intro-animation.gif" alt="" title=""/>
            </div>
        </div>
    </div>
</section>    <!-- Modal for animation -->
<script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.3.1,npm/swiper@4.4.1"></script>
<script src="{$app_url}ui/assets/js/saas_landing.js"></script>
</body>
</html>