<?php

    /**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/17/2015
 * Time: 3:09 PM
 */
?>

<ul class="unstyled">
    <li>
        <ul  class="inline row">
            <li class="span3">Class Name</li>
            <li class="span3">Venue Name</li>
            <li class="span3">Timeslot</li>
        </ul>
    </li>
    <?php foreach($this->model->items as $event): ?>

        <li class="well well-sm">
            <ul  class="inline row">
                <li class="span3"><?php echo $event->product_title;?></li>
                <li class="span3"><?php echo $event->venue_title;?></li>
                <li class="span3"><?php echo gmdate('H:i:s', $event->timestart*60);?> - <?php echo gmdate('H:i', $event->timeend*60);?></li>
                <li><a class="btn btn-primary" href="/index.php?option=com_sp4k&view=cart.add&event_id=<?php echo $event->id;?>">Book Now</a></li>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>




