<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/4/2015
     * Time: 9:25 AM
     */
?>

<?php foreach($this->model->venues as $venue):?>

<a href="index.php?option=com_sp4k&view=cart.add&id=<?php echo $this->model->product->id;?>&venue_id=<?php echo $venue->id;?>">
    <?php echo $venue->title;?>
</a><br/>

<?php endforeach; ?>
