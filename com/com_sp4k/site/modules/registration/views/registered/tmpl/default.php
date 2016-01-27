<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/11/2015
 * Time: 11:08 AM
 */



?>

<script>
    jQuery('document').ready(function(){
        jQuery('#attendee_submit_button').on('click',function(e){
            e.preventDefault();
            jQuery.ajax('/',{
                type:'POST',
                data:{
                    format:'json',
                    option:'com_sp4k',
                    formdata: JSON.stringify(jQuery('#attendees').serialize()),
                    task: 'registration.cart.add'
                }
            });

        })
    })
</script>


Select Attendees


<form id="attendees">
    <ul class="unstyled">
        <li>
            <ul  class="inline row">
                <li class="span1"><input type="checkbox"/></li>
                <li class="span3">Name</li>
            </ul>
        </li>
        <?php foreach($this->model->children as $child):?>

            <li class="well well-sm">
                <ul  class="inline row">
                    <li class="span1"><input type="checkbox" name="children[]" value="<?php echo $child->id;?>"/></li>
                    <li class="span3"><?php echo $child->name;?></li>
                    <li class="span4">
                        <div>Select Start Date</div>
                        <div>
                            <ul>
                                <?php foreach ($this->model->dateStartOptions as $dateStartOption):?>
                                <li>
                                    <input type='radio' name='startdates[<?php echo $child->id;?>]' value="<?php echo $dateStartOption;?>"/>
                                    <?php echo strftime('%d/%m/%Y',$dateStartOption);?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href id="attendee_submit_button" class="btn btn-primary pull-right">Submit</a>
    <input type="hidden" name="event_id" value="<?php echo $this->model->event_id;?>"/>
    <input type="hidden" name="item_type" value="event"/>
    <input type="hidden" name="item_identifier" value="event_id"/>
</form>