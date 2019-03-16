<?php
/* Smarty version 3.1.33, created on 2019-02-10 17:15:54
  from '/Users/razib/Documents/valet/stackb/ui/theme/default/sms_bulk.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c60a29aca1458_89213002',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '139e94a48aa75beb1b967cd3f6da122b668ae9fe' => 
    array (
      0 => '/Users/razib/Documents/valet/stackb/ui/theme/default/sms_bulk.tpl',
      1 => 1549836952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c60a29aca1458_89213002 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17435244175c60a29ac90cb2_52390676', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12206384935c60a29ac9cd77_88881503', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)$_smarty_tpl->tpl_vars['layouts_admin']->value));
}
/* {block "content"} */
class Block_17435244175c60a29ac90cb2_52390676 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_17435244175c60a29ac90cb2_52390676',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">

                    <div id="result"></div>

                    <form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
sms/init/send_post/" method="post" id="iform">

                        <div class="form-group"><label class="col-lg-2 control-label" for="from"><?php echo $_smarty_tpl->tpl_vars['_L']->value['From'];?>
 </label>

                            <div class="col-lg-6"><input type="text" name="from" id="from" class="form-control " value="<?php echo $_smarty_tpl->tpl_vars['config']->value['sms_sender_name'];?>
">

                            </div>
                        </div>

                        <div class="form-group"><label class="col-lg-2 control-label" for="sms_to"><?php echo $_smarty_tpl->tpl_vars['_L']->value['To'];?>
 </label>

                            <div class="col-lg-6">

                                <select multiple="multiple" id="contacts" name="contacts[]">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c']->value, 'cs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['phone'];?>
"><?php echo $_smarty_tpl->tpl_vars['cs']->value['account'];?>
 - <?php echo $_smarty_tpl->tpl_vars['cs']->value['phone'];?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>

                                <span class="help-block">
                                <a href="#" id="ib_select_all"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select all'];?>
</a> |
                                <a href="#" id="ib_de_select_all"><?php echo $_smarty_tpl->tpl_vars['_L']->value['De select all'];?>
</a>
                            </span>

                            </div>
                        </div>


                        <div class="form-group"><label class="col-lg-2 control-label" for="message"><?php echo $_smarty_tpl->tpl_vars['_L']->value['SMS'];?>
 </label>

                            <div class="col-lg-6">

                                <textarea class="form-control" name="message" id="message" rows="4"></textarea>

                                <p class="help-block" id="sms-counter">
                                    <?php echo $_smarty_tpl->tpl_vars['_L']->value['Remaining'];?>
: <span class="remaining"></span> | <?php echo $_smarty_tpl->tpl_vars['_L']->value['Length'];?>
: <span class="length"></span> | <?php echo $_smarty_tpl->tpl_vars['_L']->value['Messages'];?>
: <span class="messages"></span>
                                </p>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-6">
                                <button class="btn btn-primary" type="submit" id="send"><i
                                            class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Send'];?>
</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>


<?php
}
}
/* {/block "content"} */
/* {block "script"} */
class Block_12206384935c60a29ac9cd77_88881503 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_12206384935c60a29ac9cd77_88881503',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <?php echo '<script'; ?>
>
        $(document).ready(function () {

            var _url = $("#_url").val();

            var send = $("#send");

            var result = $("#result");

            var iform = $( "#iform" );

            $('#message').countSms('#sms-counter');

            var contacts = $("#contacts");

            contacts.multiSelect({
                selectableHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
...'>",
                selectionHeader: "<input type='text' class='form-control' autocomplete='off' placeholder='<?php echo $_smarty_tpl->tpl_vars['_L']->value['Search'];?>
...'>",
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
    <?php echo '</script'; ?>
>

<?php
}
}
/* {/block "script"} */
}
