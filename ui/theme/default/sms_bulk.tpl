{extends file="$layouts_admin"}

{block name="content"}

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">

                    <div id="result"></div>

                    <form class="form-horizontal" action="{$_url}sms/init/send_post/" method="post" id="iform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="from">{$_L['From']} </label>

                            <div class="col-lg-6"><input type="text" name="from" id="from" class="form-control " value="{$config['sms_sender_name']}">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sms_to">{$_L['To']} </label>

                            <div class="col-lg-6">

                                <select multiple="multiple" id="contacts" name="contacts[]">
                                    {foreach $c as $cs}
                                        <option value="{$cs['phone']}">{$cs['account']} - {$cs['phone']}</option>
                                    {/foreach}
                                </select>

                                <span class="help-block">
                                <a href="#" id="ib_select_all">{$_L['Select all']}</a> |
                                <a href="#" id="ib_de_select_all">{$_L['De select all']}</a>
                            </span>

                            </div>
                        </div>


                        <div class="form-group"><label class="col-lg-2 control-label" for="message">{$_L['SMS']} </label>

                            <div class="col-lg-6">

                                <textarea class="form-control" name="message" id="message" rows="4"></textarea>

                                <p class="help-block" id="sms-counter">
                                    {$_L['Remaining']}: <span class="remaining"></span> | {$_L['Length']}: <span class="length"></span> | {$_L['Messages']}: <span class="messages"></span>
                                </p>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-6">
                                <button class="btn btn-primary" type="submit" id="send"><i
                                            class="fa fa-check"></i> {$_L['Send']}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>


{/block}

{block name="script"}

    <script>
        $(document).ready(function () {

            var _url = $("#_url").val();

            var send = $("#send");

            var result = $("#result");

            var iform = $( "#iform" );

            $('#message').countSms('#sms-counter');

            var contacts = $("#contacts");

            contacts.multiSelect({
                selectableHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='{$_L['Search']}...'>",
                selectionHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='{$_L['Search']}...'>",
                afterInit: function(ms){
                    var that = this,
                        $selectableSearch = that.$selectableUl.prev(),
                        $selectionSearch = that.$selectionUl.prev(),
                        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                        .on('keydown', function(e){
                            if (e.which === 40){
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                        .on('keydown', function(e){
                            if (e.which == 40){
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                },
                afterSelect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                },
                afterDeselect: function(){
                    this.qs1.cache();
                    this.qs2.cache();
                }
            });


            $('#ib_select_all').click(function(){
                contacts.multiSelect('select_all');
                return false;
            });
            $('#ib_de_select_all').click(function(){
                contacts.multiSelect('deselect_all');
                return false;
            });








            send.on('click', function(e) {


                e.preventDefault();

                iform.block({ message: null });


                $.post( _url + "sms/init/bulk_post/", iform.serialize())
                    .done(function (data) {

                        iform.unblock();

                        result.html(data);

                    });


            });



        });
    </script>

{/block}