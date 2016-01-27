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
            window.location ='/index.php?option=com_sp4k&view=cart.review';
        });

        jQuery('#continue-shopping.btn').on('click',function(e){
            e.preventDefault();
            window.location = '/';
        });
    });
</script>
<div id="sp4k_cart-container">
    <?php if(isset($this->model->items) && count($this->model->items)):?>
        <?php foreach($this->model->items as $item):?>
            <?php echo $item->description;?><br/>
            Pay Now:<?php echo $item->totals['cost_now'];?>
            1st Bill:<?php echo $item->totals['cost_next'];?>
        <?php endforeach;?>
        <ul>
            <li style="display:inline-block;list-style-type:none;">
                <a id="checkout-button" href class="btn btn-success">Checkout</a>
            </li>
            <li style="display:inline-block;list-style-type:none;">
                <a id="continue-shopping" href class="btn btn-primary">Continue Shopping</a>
            </li>
        </ul>
    <?php else: ?>
        <h2>Your Cart Is Empty</h2>
    <?php endif; ?>


</div>
