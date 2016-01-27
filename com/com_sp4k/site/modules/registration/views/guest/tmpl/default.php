<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/11/2015
 * Time: 7:28 AM
 */


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){
        $("#login .button").click(function(){

            $("#login").toggle('fade',{
                direction:'right',
                complete:function(){
                    $("#register").toggle('fade',{
                        direction:'left'
                    });
                },
                duration:200
            });

        });
        var numChildren = 1;
        $("#register .button").click(function(){

            $("#register").toggle('fade',{
                direction:'right',
                complete:function(){
                    $("#login").toggle('fade',{
                        direction:'left'
                    });
                },
                duration:200
            });

        });

        $("#add_child").on('click',function(e){
            e.preventDefault();
            numChildren++;
            var newDiv = $("#child_template").clone();
            jQuery(newDiv).attr('id','child_'+numChildren);
            jQuery(newDiv).find('[name="child[1][name]"]').attr('name','child['+numChildren+'][name]').val('');
            jQuery(newDiv).find('[name="child[1][dob]"]').attr('name','child['+numChildren+'][dob]').val('');

            jQuery(newDiv).appendTo(jQuery('.children_fields'));
        });

        $('#submit').on('click',function(e){
            e.preventDefault();
            $.ajax('/',{
                data:{
                    option:'com_sp4k',
                    task:'registration.account.create',
                    format: 'json',
                    data: JSON.stringify($('#register_form').serialize())
                },
                type:'POST'
            }).done(function(){location.reload(true)});
        });
    });
</script>

<style>
    #register, #login {
        border: solid 1px #c3c3c3;
        width: 100%;
        top: 0;
        left: 0;
        padding: 10px;
        min-height: 500px;
    }

    #register .button{
        float:right;
    }
    #register {
        display:none;

    }
    #login .button{
        float: left;
    }
    #login{

    }
    .child_container {
        border: 1px solid rgba(128, 128, 128, 0.21);
        padding: 11px 6px 0px;
        margin: 5px 0;
    }

</style>

<div >
    <div id="register">
        <div class="button btn btn-primary btn-small"><h3>Already have an account? Login -></h3></div>
        <br/>
        <form class="form-horizontal text-center" id="register_form" method="post">
            <fieldset style="margin: 0 auto;display: inline-block;text-align: left;">
                <legend>Registeration Infomation</legend>
                <fieldset class="well well-small" style="margin-top: -40px;">
                    <legend style="padding-top: 50px;margin-bottom: -21px;">Parent</legend>
                        <div class="control-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                                <input  type="text" name="f_name" placeholder="First Name"/>
                            </div>
                            <div class="controls">
                                <input  type="text" name="l_name" placeholder="Last Name"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Mobile</label>
                            <div class="controls">
                                <input type="text" name="mobile"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Receive SMS?</label>
                            <div class="controls">
                                <input type="checkbox" name="sms"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input type="email" name="email" reqired/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input type="password" name="password1"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Confirm Password</label>
                            <div class="controls">
                                <input type="password" name="password2"/>
                            </div>
                        </div>

                </fieldset>

                <fieldset class="children_fields well well-small" style="margin-top: -40px;">
                    <legend style="padding-top: 50px;margin-bottom: 2px;">Children <span class="btn btn-primary btn-small"><b><a href id="add_child">+</a></b></span></legend>
                    <div id="child_template" class="child_container">
                        <div class="control-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                                <input type="text" name="child[1][name]">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">DOB</label><div class="controls">
                                <div class="input-append">
                                    <input class="input-small" type="date" name="child[1][dob]">
                                    <button class="btn" type="button"><i class="icon-calendar"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <a class="pull-right btn btn-primary" href id="submit">Submit</a>
                <input type="hidden" name="redirect" value="<?php echo base64_encode($_SERVER['REQUEST_URI']);?>"
            </fieldset>
        </form>

    </div>
    <div id="login">
        <div class="button btn btn-primary btn-small"><h3><--  Don't have an account yet?Register Now!</h3></div>
        <br/>
            <div>
                login
            </div>
        </div>
    </div>
</div>

