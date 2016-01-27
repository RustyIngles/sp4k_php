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
        jQuery('#submit-payment-button').on('click',function(e){
            e.preventDefault();
            jQuery('#review').toggle();
            jQuery('#payment').toggle();
        })

        jQuery('#checkout-button.btn').on('click',function(e){
            e.preventDefault();
            jQuery('#paymentinfo').submit();
        });

        jQuery('#continue-shopping.btn').on('click',function(e){
            e.preventDefault();
            jQuery('#review').toggle();
            jQuery('#payment').toggle();
        });
    });
</script>
<div id="sp4k_cart-container">
    <div id="payment">
        <?php if (!$this->model->items): ?>
            <h1>Your Cart Is Empty</h1>
        <?php else: ?>


            <form class="form-horizontal" id="paymentinfo" method="post">
                <?php
                    if(
                            isset($this->model->recurring)
                            &&
                            $this->model->recurring
                            &&
                            $this->model->orderTotals['cost_next'] > 0
                    ):
                        ?>
                        <fieldset>
                            <legend>Address</legend>
                            <div class="control-group">
                                <label class="control-label" for="textinput">Street Address 1</label>
                                <div class="controls">
                                    <input id="textinput" name="pl[address_street1]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textinput">Street Address 2</label>
                                <div class="controls">
                                    <input id="textinput" name="pl[address_street2]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textinput">City</label>
                                <div class="controls">
                                    <input id="textinput" name="pl[address_city]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textinput">State</label>
                                <div class="controls">
                                    <input id="textinput" name="pl[address_state]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textinput">Postal Code</label>
                                <div class="controls">
                                    <input id="textinput" name="pl[address_postalcode]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <!-- Form Name -->
                            <legend>Direct Debit Billing Information</legend>

                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="textinput">Account Name</label>
                                <div class="controls">
                                    <input id="textinput" name="pl[accountHolderName]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="textinput">Account Number</label>
                                <div class="controls">
                                    <input id="textinput" name="pl[accountNumber]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textinput">Sort Code</label>
                                <div class="controls">
                                    <input id="textinput" name="pl[bankSortCode]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>
                        </fieldset>
                    <?php endif; ?>

                <?php
                    if(
                            isset($this->model->paynow)
                            &&
                            $this->model->paynow
                            &&
                            $this->model->orderTotals['cost_now'] > 0
                    ):
                        ?>

                        <fieldset>
                            <!-- Form Name -->
                            <legend>Credit Cart Billing Information</legend>

                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="textinput">Account Name</label>
                                <div class="controls">
                                    <input id="textinput" name="pn[cc_account_name]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="textinput">Card Number</label>
                                <div class="controls">
                                    <input id="textinput" name="pn[cc_card_number]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="textinput">Expiration Date</label>
                                <div class="controls">
                                    <input id="textinput" name="pn[cc_exp_date]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="textinput">PIN</label>
                                <div class="controls">
                                    <input id="textinput" name="pn[cc_pin]" type="text" placeholder="placeholder" class="input-xlarge">
                                </div>
                            </div>
                            <input type="hidden" name="option" value="com_sp4k"/>
                            <input type="hidden" name="task" value="cart.process"/>
                        </fieldset>
                    <?php endif;?>
            </form>
            <a id="submit-payment-button" class="btn btn-success">Continue</a>
        <?php endif; ?>
    </div>
    <div id="review" style="display:none;">
        <?php if(isset($this->model->items) && count($this->model->items)):?>
            <?php foreach($this->model->items as $item):?>
                <?php echo $item->description;?><br/>
                Pay Now:<?php echo $item->totals['cost_now'];?> via Credit Card
                1st Bill:<?php echo $item->totals['cost_next'];?> via Direct Debit
            <?php endforeach;?>
            <ul>
                <li style="display:inline-block;list-style-type:none;">
                    <a id="checkout-button" href class="btn btn-success">Submit Payment</a>
                </li>
                <li style="display:inline-block;list-style-type:none;">
                    <a id="continue-shopping" href class="btn btn-primary">Back</a>
                </li>
            </ul>
        <?php else: ?>
            <h2>Your Cart Is Empty</h2>
        <?php endif; ?>
    </div>
</div>
