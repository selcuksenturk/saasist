{extends file="$layouts_admin"}

{block name="content"}


    <div class="row kb-page">
        {*<div class="col-md-12">*}
        {*<div class="search-bar ">*}
        {*<div class="input-group">*}
        {*<input type="text" class="form-control" id="article_search" placeholder="Search for..."> </div>*}
        {*</div>*}
        {*</div>*}
        <div class="col-md-8" id="kb_add_area">
            <div class="panel panel-default">
                <h3 class="panel-heading">{$_L['Add New Article']} </h3>
                <div class="panel-body">


                    <form id="ib_form" class="form-horizontal push-10-t push-10" method="post">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="title" name="title" value="{$val['title']}" autofocus>
                                    <label for="title">{$_L['Title']}</label>

                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea class="form-control" id="description" name="description" rows="3">{$val['description']}</textarea>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-xs-12">




                                {*<input type="hidden" name="attachments" id="attachments" value="">*}

                                <input type="hidden" name="kbid" id="kbid" value="{$val['id']}">

                                <button class="btn btn-primary" id="ib_form_submit" type="submit"><i class="fa fa-send push-5-r"></i> {$_L['Submit']}</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="panel panel-default">
                <h3 class="panel-heading">{$_L['Group']} </h3>

                <div class="panel-body">


                    <form id="ib_add_group" class="form-horizontal push-10-t push-10" method="post">

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material floating">
                                    <input class="form-control" type="text" id="gname" name="gname">
                                    <label for="gname">{$_L['Name']}</label>

                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-xs-12">


                                <button class="btn btn-primary" id="ib_add_group_submit" type="submit"><i class="fa fa-check push-5-r"></i> {$_L['Save']}</button>
                            </div>
                        </div>
                    </form>


                    <div id="div_groups">

                    </div>



                </div>
            </div>

            <div class="panel panel-default">
                <h3 class="panel-heading">{$_L['Latest Articles']} </h3>

                <div class="panel-body">


                    <div class="topics-list">
                        <ul>

                            {foreach $kbs as $kb}
                                <li><a href="javascript:void(0)" id="k{$kb['id']}" class="kb_view"> {$kb['title']} </a></li>

                                {foreachelse}
                                <p class="text-center">You do not have any Article</p>
                            {/foreach}

                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>


{/block}

{block name="script"}
    <script type="text/javascript" src="{$app_url}ui/lib/tinymce/tinymce.min.js"></script>

    {if $user['language'] neq 'en' || $user['language'] neq ''}
        <script type="text/javascript" src="{$app_url}ui/lib/tinymce/langs/{getTinyMceLocale($user['language'])}.js"></script>
    {/if}

    <script type="text/javascript" src="{$app_url}ui/lib/js/editor.js?v=3"></script>

    <script>
        function deleteKb(kbid) {
            bootbox.confirm(_L['are_you_sure'], function(result) {
                if(result){
                    window.location.href = base_url + "kb/a/delete/" + kbid;
                }
            });
        }

        function loadKbGroups() {

            var $div_groups = $("#div_groups");

            $div_groups.html(block_msg);

            $.get( base_url + "kb/a/ajax_groups/"+$("#kbid").val(), function( data ) {
                $div_groups.html(data);
                $('.ib_input_groups').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'icheckbox_square-blue',
                    increaseArea: '20%' // optional
                });

            });

        }

        $(function() {

            loadKbGroups();

            ib_editor("#description",400,true,true,'{getTinyMceLocale($user['language'])}');

            var ib_form_submit = $("#ib_form_submit");

            var kb_add_area = $("#kb_add_area");

            ib_form_submit.on('click', function(e) {
                e.preventDefault();
                kb_add_area.block({ message: block_msg });
                var selected_groups = [];

                $('.ib_input_groups').filter(':checked').each(function() {
                    selected_groups.push(this.id);
                });
                console.log(selected_groups);
                $.post( base_url + "kb/a/save/", { title: $("#title").val(), description: tinyMCE.activeEditor.getContent(), kbid: $("#kbid").val(),groups: selected_groups })
                    .done(function (data) {
                        if ($.isNumeric(data)) {

                            window.location = base_url + 'kb/a/edit/' + data;

                        }
                        else {
                            kb_add_area.unblock();
                            toastr.error(data);

                        }
                    });

            });


            $(".kb_view").on('click',function (e) {
                e.preventDefault();
                iModal.ajax(base_url + "kb/a/a_view/"+this.id, $(this).html());
            });

            $("#ib_add_group_submit").on('click',function (e) {
                e.preventDefault();

                $("#ib_add_group").block({ message: block_msg });

                $.post(base_url + 'kb/a/group_create/', { gname: $("#gname").val() }, function (data) {

                    $("#ib_add_group").unblock();

                    $("#gname").val('');

                    loadKbGroups();

                })

            })


        });
    </script>

{/block}