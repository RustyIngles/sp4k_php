<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/16/2015
 * Time: 3:59 PM
 */

    class Sp4kModulesRegistrationViewsVenueHtml extends JViewHtml
    {
        public function __construct(JModel $model, SplPriorityQueue $paths = NULL)
        {
            parent::__construct($model,$paths);
            $this->paths->insert(__DIR__.'/tmpl','normal');
        }

        public function render()
        {
            return parent::render();
        }
    }