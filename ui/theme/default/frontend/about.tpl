{extends file="frontend/base.tpl"}

{block name="content"}



    <section class="welcome-agency text-center" data-scroll-index="1" style="background-image: url({$app_url}storage/pages/team-brainstorm-meeting-in-bright-sunny-office_925x.jpg)">
        <div class="overlay-bg-75 flex-center">
            <div class="container">
                <div class="welcome-text">
                    <h1 class="mb-20px color-fff">Who we are and what we do</h1>
                    <p class="color-aaa">More about us and the people behind it.</p>
                    <a class="main-btn btn-1 mt-10px mr-10px before-gray" href="{$_url}contact">Say Hi!</a>

                </div>
            </div>
        </div>
    </section>


    <section class="brands-area bg-gray md-padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="{$app_url}storage/pages/br4.png">
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="{$app_url}storage/pages/br5.png">
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="{$app_url}storage/pages/br6.png">
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="{$app_url}storage/pages/br2.png">
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="{$app_url}storage/pages/br3.png">
                    </div>
                </div>
                <div class="col-md-2 col-sm-4">
                    <div class="mt-25px mb-25px">
                        <img alt="img" src="{$app_url}storage/pages/br1.png">
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
                        <img src="{$app_url}storage/pages/business-woman-flow-chart_925x.jpg" alt="img">
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
                        <a class="main-btn btn-3 mt-25px" href="{$_url}contact">Contact us</a>
                    </div>
                </div>
            </div>


        </div>
    </section>



{/block}