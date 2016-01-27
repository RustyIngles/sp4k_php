<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 8/16/2015
     * Time: 4:00 PM
     */

?>
<form method="post">

    <div class="form-horizontal">
        <label for="venue_image">Insert Uploader</label>
        <img src="<?php echo $this->model->productApp->item->image;?>"/>
        <input type="file" name="venue_image"/>
    </div>
    <div class="form-horizontal">
        <lable for="venue_name">Name:</lable>
        <input id="venue_name"
               type="text"
               name="data[name]"
               value="<?php echo $this->model->productApp->item->name;?>"/>
    </div>



    <input type="submit"/>
    <input type="hidden" name="option" value="com_sp4k"/>
    <input type="hidden" name="task" value="product.admin.update"/>
    <input type="hidden" name="data[id]" value="<?php echo $this->model->productApp->item->id;?>"/>
</form>