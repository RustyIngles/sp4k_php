<?php
    
    /**
     * Created by Joseph Cardwell.
     * User: Ironman
     * Date: 10/28/2015
     * Time: 7:50 PM
     */
    $test = 'test';

    $validDAtes = $this->model->getValidDates();

    /** @var DatePeriod $period */
    $period = new DatePeriod(
            new DateTime(strftime('%Y-%m-%d',min($validDAtes))),
            new DateInterval('P1D'),
            new DateTime(strftime('%Y-%m-%d',max($validDAtes)))
    );

    foreach($period as $date){
        $allDatesArray[] = $date->getTimestamp();
    }

    $invalidDates = array_diff($allDatesArray,$validDAtes);
    JHtml::script('media/jui/js/jquery.min.js');
    JHTML::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js');
    JHTML::stylesheet('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.min.css');
    JFactory::$document->addScriptDeclaration("
        jQuery(document).ready(function(){
            jQuery('#datepicker".$this->child->id."').datepicker({
                    multidate:true,
                    startDate:'".strftime('%m/%d/%Y',min($validDAtes))."',
                    endDate:'".strftime('%m/%d/%Y',max($validDAtes))."'
             });
            jQuery('#datepicker".$this->child->id."').on('changeDate', function() {
                console.log(jQuery('#datepicker".$this->child->id."').datepicker('getFormattedDate'));
                jQuery('#dates".$this->child->id."').val(
                    jQuery('#datepicker".$this->child->id."').datepicker('getFormattedDate')
                );
            });
        });
    ");
?>
<div id="datepicker<?php echo $this->child->id;?>" data-date="<?php echo strftime('%m/%d/%Y',min($validDAtes));?>"></div>
<input type="hidden" id="dates<?php echo $this->child->id;?>" name="dates[<?php echo $this->child->id;?>]"/>

