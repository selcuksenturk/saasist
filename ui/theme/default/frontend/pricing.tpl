{extends file="frontend/base.tpl"}

{block name="content"}

    {*<section class="welcome-agency text-center" style="background-image: url({$app_url}storage/pages/dashboard-on-laptop.jpg);" data-scroll-index="1">*}
        {*<div class="overlay-bg-85 flex-center">*}
            {*<div class="container">*}
                {*<div class="welcome-text">*}
                    {*<h1 class="mb-20px color-fff">Start a free 30 days trial in the Team plan, no credit card required</h1>*}
                    {*<p class="color-aaa">All plans comes with powerful features.</p>*}
                    {*<a class="main-btn btn-1 mt-10px mr-10px before-gray" href="#">Get Started</a>*}
                    {*<a class="main-btn btn-1 btn-orange mt-10px before-gray" href="javascript:;" data-lity><i class="fa fa-play"></i> Watch Our Video</a>*}
                {*</div>*}
            {*</div>*}
        {*</div>*}
    {*</section>*}


    <section class="price-area bg-gray text-center" style="padding-top: 150px;" data-scroll-index="5">
        <div class="container">
            <h1 class="color-blue">Pricing</h1>
            <br>
                <div class="col-md-8 text-center">
                    <img alt="img" src="{$app_url}storage/pages/credit-card.png" class="ml-auto mr-auto">
                </div>
            <br>
            <p class="title-p"></p>
            <ul class="tabs list-unstyled  text-center">
                <li id="tab1" class="active pl-25px pr-25px pt-10px pb-10px bg-fff color-blue mb-10px d-inline-block">Free | ∞</li>
                <li id="tab2" class="pl-25px pr-25px pt-10px pb-10px bg-fff color-blue mb-10px d-inline-block">* * * * *</li>
            </ul>            
            <div class="tabs-content">
                <div id="tab1-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="price-table bg-fff mt-25px mb-25px">
                                <h3 class="fw-500">Free * Forever</h3>
                                <h1 class="fw-500 mt-20px mb-20px"><span class="fw-500 bg-gray radius-50px pl-25px pr-25px"><span class="fs-40">$ 0</span></h1>
                                <p><i class="fa fa-check color-blue"></i> Accounting</p>
                                <p><i class="fa fa-check color-blue"></i> Sales</p>
                                <p><i class="fa fa-check color-blue"></i> Billing</p>
                                <p><i class="fa fa-check color-blue"></i> Supply</p>
                                <p><i class="fa fa-check color-blue"></i> Clients</p>
                                <p><i class="fa fa-check color-blue"></i> Plans</p>
                                <p><i class="fa fa-check color-blue"></i> Reports</p>
                                <p><i class="fa fa-check color-blue"></i> Orders</p>
                                <p><i class="fa fa-check color-blue"></i> Support</p>
            </ul>
                                <p class="ml-10px mr-10x mb-20px">We have announcement to make: Promote us!</p>
            </ul>
                                <p class="ml-10px mr-10x mb-20px">No trials, limitations or hidden fees! Use many features as you want freely.</p>
            </ul>
                                <p class="ml-10px mr-10x mb-20px">All these features will be always free when you announce or promote us!</p>
                                <a class="main-btn btn-3 mt-20px" href="{$_url}register">Sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tab2-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="price-table bg-fff mt-25px mb-25px">
                                <h3 class="fw-500">* * * * *</h3>
                                <h1 class="fw-500 mt-20px mb-20px"><span class="fw-500 bg-gray radius-50px pl-25px pr-25px">◡</span></h1>
                                <p><i class="fa fa-check color-blue"></i> Consult & Advise</p>
                                <p><i class="fa fa-check color-blue"></i> Many Integrations</p>
                                <p><i class="fa fa-check color-blue"></i> Human Resources</p>
                                <p><i class="fa fa-check color-blue"></i> Documentation</p>
                                <p><i class="fa fa-check color-blue"></i> Getting Payments</p>
                                <p><i class="fa fa-check color-blue"></i> Import & Export</p>
                                <p><i class="fa fa-check color-blue"></i> No Branding</p>
                                <p><i class="fa fa-check color-blue"></i> Professional Support</p>
            </ul>
                                <p class="ml-10px mr-10x mb-20px">As "someone wise" we aim to reach new entrepreneurs and initiatives that need financial support.</p>
            </ul>
                                <p class="ml-10px mr-10x mb-20px">We provide financial consulting services to enterprises. We do our best for years.</p>
                                <a class="main-btn btn-3 mt-20px" href="{$_url}register">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>


{/block}