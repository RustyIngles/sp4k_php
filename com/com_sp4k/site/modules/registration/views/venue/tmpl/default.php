<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/18/2015
 * Time: 1:47 PM
 */

JHtmlBehavior::framework(true);
?>
<form method="post">

    <ul id="venue_list">
        <?php foreach($this->model->venueApp->items->items as $venue): ?>
        <li>
            <a href id="venue_<?php echo $venue->id;?>">
                <?php echo $venue->name; ?>
            </a>
            <?php if($venue->id == $this->model->selected):?>
            <br/>SELECTED
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <input type="submit" value="Continue"/>
    <input type="hidden" name="venue_id" value="<?php echo $this->model->selected;?>"/>
</form>
<script>
    (function(){
        jQuery('#venue_list li a').each(function(){
            jQuery(this).on('click',function(e){
                e.preventDefault();
                jQuery("input[name='venue_id']").val(
                    parseInt(
                        jQuery(this).attr('id').replace('venue_','')
                    )
                );
            })
        })
    })(jQuery);
</script>