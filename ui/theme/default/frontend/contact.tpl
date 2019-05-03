{extends file="frontend/base.tpl"}

{block name="content"}


    <section class="welcome-page sec-padding text-center p-relative o-hidden bg-gray">
        <div class="container">
            <div class="row welcome-text sec-padding flex-center">
                <div class="col-md-12 mb-20px z-index-1">
                    <h1 class="color-blue">Contact</h1>
                </div>
                <div class="col-md-8 text-center">
                    <img alt="img" src="{$app_url}storage/pages/h.png" class="ml-auto mr-auto">
                </div>
            </div>
        </div>
        <div class="pattern p-absolute">
        </div>
    </section>


    <section class="contact-area sec-padding">
        <div class="container">
            <p class="title-p">If you have any question, please feel free to contact us.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="address">
                        <p class="mb-30px"><i class="color-blue bg-gray radius-50 fs-35 mr-10px text-center im im-map-o"></i>Yenidoğan mh. Abdi İpekçi cd. No:34 D:4 İstanbul</p>
                    </div>
                    <div class="address">
                        <p class="mb-30px"><i class="color-blue bg-gray radius-50 fs-35 mr-10px text-center im im-phone"></i>Land: +902125017797 | Mobile: +905542915939</p>
                    </div>
                    <div class="address">
                        <p class="mb-30px"><i class="color-blue bg-gray radius-50 fs-35 mr-10px text-center im im-mail"></i>info@saas.ist | asist@saas.ist</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <form class="form" id="contact-form" method="post" action="">
                            <div class="messages"></div>
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="form_name" class="form-control" type="text" name="name" placeholder="Name"  required="required" data-error="Name is required.">
                                            <div class="help-block with-errors color-orange"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="form_email" class="form-control" type="email" name="email" placeholder="E-mail" required="required" data-error="email is required.">
                                            <div class="help-block with-errors color-orange"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="form_subject" class="form-control" type="text" name="subject" placeholder="Subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea id="form_message" class="form-control" name="message" placeholder="Message" rows="6" required="required" data-error="Message."></textarea>
                                            <div class="help-block with-errors color-orange"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" value="Send" class="main-btn btn-3 color-fff radius-50px bg-orange color-orange-hvr">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


{/block}