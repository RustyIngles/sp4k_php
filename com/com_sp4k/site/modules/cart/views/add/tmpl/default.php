<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/25/2015
     * Time: 7:14 PM
     */


?>
<script>
    jQuery('document').ready(function(){
        jQuery('#attendee_submit_button').on('click',function(e){
            e.preventDefault();
            jQuery.ajax('/',{
                type:'POST',
                data:{
                    format:'json',
                    option:'com_sp4k',
                    formdata: JSON.stringify(jQuery('#attendees').serialize()),
                    task: 'cart.add'
                }
            }).always(
                    function(){
                        window.location = '/index.php?option=com_sp4k&view=cart';
                    }
            );

        })
    })
</script>
<form id="attendees">
<?php
    foreach($this->model->product->plugins as $index=>$model){
        $view = clone($this);
        $view->model = $model;
        echo $view->setLayout($index);
    }
?>

<a href id="attendee_submit_button" class="btn btn-primary pull-right">Submit</a>
<input type="hidden" name="product_id" value="<?php echo $this->model->product->id;?>"/>
</form>
