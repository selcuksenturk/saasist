{extends file="frontend/base.tpl"}

{block name="content"}


    <section class="welcome-agency text-center" data-scroll-index="1" style="background-image: url({$app_url}storage/pages/team-brainstorm-meeting-in-bright-sunny-office_925x.jpg)">
        <div class="overlay-bg-75 flex-center">
            <div class="container">
                <div class="welcome-text">
                    <h1 class="mb-20px color-fff">About</h1>
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
                        <h3 class="mt-10px mb-15px fw-600">Who are we?</h3>
                        <p class="mb-15px">We are small, hardworking also ambitious team from Turkey. We believe that simplifying business management will move forward you and your business. Simply our goal is to deliver the best user experience for businesses and their customers. Because we are passionate about it.</p>
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