<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/25/2015
     * Time: 3:38 PM
     */


?>

    <div class="blahblahblah">
    <?php
        foreach($this->model->cart as $item):
    ?>
            <?php var_dump($item);?>
    <?php
        endforeach;
    ?>
