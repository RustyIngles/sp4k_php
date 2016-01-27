<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/16/2015
 * Time: 4:52 PM
 */


    class Sp4kModulesVenueControllersAdminItemsDisplay extends Sp4kBaseControllerDisplay
    {
        public function execute()
        {
            $request = $this->input->getArray();
            /** @var JModelBase $modelName */
            $modelName = 'Sp4kModulesVenueModelsVenue';

            if(!isset($request['filter'])){
                $request['filter'] =
                    [
                        'id'=>
                            [
                                'operator'=>'!=',
                                'skipquote'=>true,
                                'value'=>0
                            ]
                    ];
            }

            $formatName = ucfirst($this->app->input->getCmd('format','html'));
            $viewName = 'Sp4kModulesVenueViewsAdmin'.$formatName;

            $model = new $modelName(
                new Joomla\Registry\Registry($request)
            );
            /** @var JViewHtml $view */
            $view = new $viewName(
                $model
            );

            $view->setLayout('items');

            echo $view->render();
        }
    }