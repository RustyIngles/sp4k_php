<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/25/2015
 * Time: 4:12 PM
 */

?>

<?php if (!$this->model->items): ?>
        <h1>Your Cart Is Empty</h1>
<?php else: ?>
    <script>

        jQuery(document).ready(function(){
            jQuery('#submit-payment-button').on('click',function(e){
                e.preventDefault();
                window.location = 'index.php?option=com_sp4k&view=cart.review'
            })
        });
    </script>

    <form class="form-horizontal">
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
                    <input id="textinput" name="address_street1" type="text" placeholder="placeholder" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Street Address 2</label>
                <div class="controls">
                    <input id="textinput" name="address_street2" type="text" placeholder="placeholder" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">City</label>
                <div class="controls">
                    <input id="textinput" name="address_city" type="text" placeholder="placeholder" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">State</label>
                <div class="controls">
                    <input id="textinput" name="address_state" type="text" placeholder="placeholder" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Postal Code</label>
                <div class="controls">
                    <input id="textinput" name="address_postalcode" type="text" placeholder="placeholder" class="input-xlarge">
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
                    <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="input-xlarge">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">Account Number</label>
                <div class="controls">
                    <input id="textinput" name="accountNumber" type="text" placeholder="placeholder" class="input-xlarge">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="textinput">Sort Code</label>
                <div class="controls">
                    <input id="textinput" name="bankSortCode" type="text" placeholder="placeholder" class="input-xlarge">
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
                    <input id="textinput" name="cc_account_name" type="text" placeholder="placeholder" class="input-xlarge">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">Card Number</label>
                <div class="controls">
                    <input id="textinput" name="cc_card_number" type="text" placeholder="placeholder" class="input-xlarge">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">Expiration Date</label>
                <div class="controls">
                    <input id="textinput" name="cc_exp_date" type="text" placeholder="placeholder" class="input-xlarge">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="textinput">PIN</label>
                <div class="controls">
                    <input id="textinput" name="cc_pin" type="text" placeholder="placeholder" class="input-xlarge">
                </div>
            </div>
        </fieldset>
        <?php endif;?>
    </form>
    <a id="submit-payment-button" class="btn btn-success">Continue</a>
<?php endif; ?>

