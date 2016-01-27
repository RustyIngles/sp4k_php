<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 11/3/2015
     * Time: 11:13 PM
     */

?>

<?php foreach($this->model->products as $product): ?>

<a href="/index.php?option=com_sp4k&view=cart.add&id=<?php echo $product->id;?>"><?php echo $product->title; ?></a>

<?php endforeach; ?>
