<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/25/2015
     * Time: 4:12 PM
     */

?>
<script>
    jQuery(document).ready(function(){
        jQuery('#checkout-button.btn').on('click',function(e){
            e.preventDefault();
            window.location ='/index.php?option=com_sp4k&task=cart.process';
        });

        jQuery('#continue-shopping.btn').on('click',function(e){
            e.preventDefault();
            window.location = '/index.php?option=com_sp4k&task=cart.checkout';
        });
    });
</script>
<div id="sp4k_cart-container">
    <?php echo $this->model->result; ?>
</div>
