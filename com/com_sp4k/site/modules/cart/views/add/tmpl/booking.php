<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/11/2015
 * Time: 11:08 AM
 */



?>




Select Attendees



    <ul class="unstyled">
        <li>
            <ul  class="inline row">
                <li class="span1"><input type="checkbox"/></li>
                <li class="span3">Name</li>
            </ul>
        </li>
        <?php
            foreach($this->model->children as $child):
                $this->child = $child;
            ?>

            <li class="well well-sm">
                <ul  class="inline row">
                    <li class="span1"><input type="checkbox" name="children[]" value="<?php echo $child->id;?>"/></li>
                    <li class="span3"><?php echo $child->name;?></li>
                    <li class="span4">
                        <?php echo $this->setLayout('booking_'.$this->model->type); ?>
                    </li>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
