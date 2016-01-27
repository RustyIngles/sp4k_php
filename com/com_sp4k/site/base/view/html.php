<?php

    /**
     * Created by PhpStorm.
     * User: Ironman
     * Date: 7/16/2015
     * Time: 7:52 PM
     */

    class Sp4kBaseViewHtml extends JViewHtml
    {
        public function __construct(JModel $model, SplPriorityQueue $paths = NULL)
        {
            parent::__construct($model,$paths);
        }
    }