{extends file="frontend/base.tpl"}

{block name="content"}

    <section class="welcome-page sec-padding text-center p-relative o-hidden bg-gray">
        <div class="container">
            <div class="row welcome-text sec-padding flex-center">
                <div class="col-md-12 mb-20px z-index-1">
                    <h1 class="color-blue">Features</h1>
                </div>
                <div class="col-md-8 text-center">
                    <img alt="img" src="{$app_url}storage/pages/office-meeting.png" class="ml-auto mr-auto">
                </div>
            </div>
        </div>
        <div class="pattern p-absolute">
        </div>
    </section>

    <section class="features-area sec-padding text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-calculator fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Accounting</h4>
                        <p>Make smart decisions.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-database fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Sales</h4>
                        <p>Focus only your sales.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-data-validate fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Billing</h4>
                        <p>Edit, list, recur, remind.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-cube fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Supply</h4>
                        <p>Easy supply management.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-support fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Clients</h4>
                        <p>Seamless customer tracking.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-task-o fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Plans</h4>
                        <p>Calendar, reminder and tasks.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-cube fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Reports</h4>
                        <p>The devil is in the detail.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-support fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Support</h4>
                        <p>Solve problems precisely.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-25px mb-25px">
                        <i class="im im-task-o fs-35 color-blue bg-gray radius-50 mb-20px transition-3"></i>
                        <h4>Orders</h4>
                        <p>Efficient order mechanism.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


{/block}