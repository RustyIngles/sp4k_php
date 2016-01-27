<?php
    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 9/11/2015
     * Time: 7:08 AM
     */


    class Sp4kModulesPaymentViewsProcessHtml extends JViewHtml
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