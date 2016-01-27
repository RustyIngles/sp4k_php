<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/28/2015
     * Time: 7:51 PM
     */
?>
<div>Select Start Date</div>
<div>
    <ul>
        <?php foreach ($this->model->getValidDates() as $dateStartOption):?>
            <li>
                <input type='radio' name='startdates[<?php echo $this->child->id;?>]' value="<?php echo $dateStartOption;?>"/>
                <?php echo strftime('%d/%m/%Y',$dateStartOption);?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
