<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/16/2015
 * Time: 4:00 PM
 */

foreach($this->model->productApp->items->items as $item): ?>
    <div class="well well-small">
        <div class="span12">
            <ul class="ui-menu inline ">
                <li class="inline">
                    <?php echo $item->name; ?>
                </li>
                <li class="inline">
                    <div  class="btn btn-small btn-success">EDIT</div>
                </li>
            </ul>
        </div>
    </div>
<?php endforeach; ?>