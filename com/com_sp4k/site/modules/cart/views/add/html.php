<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/11/2015
 * Time: 11:06 AM
 */


    class Sp4kModulesCartViewsAddHtml extends Sp4kBaseViewHtml
    {
        public function __construct(JModel $model, SplPriorityQueue $paths = NULL)
        {
            parent::__construct($model,$paths);
            $this->paths->insert(__DIR__.'/tmpl','normal');
        }

        public function render()
        {
            if(isset($this->model->layout)){
                $this->setLayout($this->model->layout);
            }

            return parent::render();
        }
    }