{extends file="$layouts_admin"}

{block name="content"}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">

                    <h3 style="color: #2f96f3;">{$_L['Order']} # {$order->id}</h3>
                    <hr>

                    {if has_access($user->roleid,'orders','edit')}
                        <a href="{$_url}orders/set/{$order->id}/Active/" class="md-btn md-btn-success waves-effect waves-light"><i class="fa fa-check"></i>  {$_L['Accept']} </a>
                        <a href="{$_url}orders/set/{$order->id}/Pending/" class="md-btn md-btn-primary waves-effect waves-light"><i class="fa fa-clock-o"></i>  {$_L['Pending']} </a>
                        <a href="{$_url}orders/set/{$order->id}/Cancelled/" class="md-btn md-btn-warning waves-effect waves-light"><i class="fa fa-times"></i>  {$_L['Cancel']} </a>
                    {/if}

                    {if has_access($user->roleid,'orders','delete')}
                        <a href="{$_url}delete/order/{$order->id}/" class="md-btn md-btn-danger waves-effect waves-light"><i class="fa fa-trash"></i>  {$_L['Delete']} </a>
                    {/if}


                    <hr>


                    <h4>{$_L['Available Module for this Order']}</h4>

                    <a href="{$_url}orders/module/{$order->id}/" class="md-btn md-btn-primary waves-effect waves-light"><i class="fa fa-plus"></i>  {$_L['Default']} </a>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="well">
                                <h4>{$_L['Order Number']} - {$order->ordernum}</h4>
                                <p><strong>{$_L['Customer']}: </strong> {$order->cname}</p>
                                <p><strong>{$_L['Product_Service']}: </strong> {$order->stitle}</p>
                                <p><strong>{$_L['Amount']}: </strong> <span class="amount">{$order->amount}</span> </p>
                                <p><strong>{$_L['Date']}: </strong>{date( $config['df'], strtotime($order->date_added))}</p>
                                <p><strong>{$_L['Status']}: </strong>

                                    {if $order->status eq 'Active'}
                                        <span class="label label-success">{ib_lan_get_line($_L[$order->status])}</span>
                                    {else}
                                        <span class="label label-danger">{ib_lan_get_line($_L[$order->status])}</span>
                                    {/if}
                                </p>
                                {if $order->iid neq '0'}
                                    <p><strong>{$_L['Invoice']}: </strong> <a href="{$_url}invoices/view/{$order->iid}/">{$order->iid}</a> </p>
                                {/if}



                            </div>
                        </div>
                        <div class="col-md-8">

                            <h4>{$_L['Activation Message']}</h4>
                            <hr>
                            <form method="post" id="ib_form">
                                <div class="form-group">
                                    <label for="activation_subject">{$_L['Subject']}</label>
                                    <input type="text" class="form-control" id="activation_subject" name="activation_subject" value="{$order->activation_subject}">
                                </div>
                                <div class="form-group">
                                    <label for="activation_message">{$_L['Message']}</label>
                                    <textarea class="form-control" id="activation_message" name="activation_message" rows="3">{$order->activation_message}</textarea>
                                </div>

                                <input type="hidden" name="oid" id="oid" value="{$order->id}">

                                <button type="submit" id="btn_activation_message_save" class="md-btn md-btn-success"><i class="fa fa-check"></i> {$_L['Save']}</button>
                                <button type="submit" id="btn_activation_message_send" class="md-btn md-btn-primary"><i class="fa fa-send"></i> {$_L['Send']}</button>

                            </form>


                        </div>
                    </div>



                </div>
            </div>
        </div>



    </div>
{/block}

{block name="script"}

    <script>

        $(function() {

            var _url = $("#_url").val();


            tinymce.init({
                selector: '#activation_message',
                // language: ib_lang,
                relative_urls: false,
                remove_script_host: false,
                removed_menuitems: 'newdocument',
                forced_root_block : false,
                fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
                setup: function(ed) {
                    ed.on('init', function() {
                        this.getDoc().body.style.fontSize = '14px';
                    });
                },
                table_default_styles: {
                    width: '100%'
                },
                plugins: [
                    'advlist autoresize autolink lists link image charmap print preview hr anchor pagebreak codesample',
                    'searchreplace wordcount visualblocks visualchars code',
                    'media nonbreaking save table contextmenu directionality',
                    'paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'fontselect fontsizeselect  insertfile | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
                toolbar2: '| responsivefilemanager | undo redo rtl print preview media image | forecolor backcolor link | codesample',
                image_advtab: true,
            });

            var $btn_activation_message_save = $("#btn_activation_message_save");
            var $btn_activation_message_send = $("#btn_activation_message_send");
            var $ib_form = $("#ib_form");

            $btn_activation_message_save.on('click', function(e) {
                e.preventDefault();

                $ib_form.block({ message: block_msg });
                $.post( _url + "orders/save_activation/", {

                    oid: $('#oid').val(),
                    activation_subject: $('#activation_subject').val(),
                    activation_message: tinyMCE.activeEditor.getContent(),
                    send_email: 'no'

                })
                    .done(function( data ) {

                        $ib_form.unblock();

                        if ($.isNumeric(data)) {

                            toastr.success(_L['data_updated']);

                        }

                        else {
                            toastr.error(data);
                        }

                    });

            });



            $btn_activation_message_send.on('click', function(e) {
                e.preventDefault();

                $ib_form.block({ message: block_msg });
                $.post( _url + "orders/save_activation/", {

                    oid: $('#oid').val(),
                    activation_subject: $('#activation_subject').val(),
                    activation_message: tinyMCE.activeEditor.getContent(),
                    send_email: 'yes'

                })
                    .done(function( data ) {

                        $ib_form.unblock();

                        if ($.isNumeric(data)) {

                            toastr.success(_L['email_sent']);

                        }

                        else {
                            toastr.error(data);
                        }

                    });

            });


        });

    </script>

{/block}