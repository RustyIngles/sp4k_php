<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 9/11/2015
 * Time: 4:25 PM
 */

class Sp4kModulesOrderViewsApiJson extends Sp4kViewsJson
{
    protected $model;

    public function __construct(JModel $model)
    {

        $paths = new SplPriorityQueue();
        $paths->insert(__DIR__ . '/tmpl', 'normal');

        parent::__construct($model, $paths);
    }

    public function render()
    {
        $response = new stdClass();
        $response->markup = parent::render();
        $response->status = $this->model->error ? 0 : 1;
        $response->msg = false;
        $response->data = $this->model;

        return json_encode($response);
    }
}