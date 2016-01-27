<?php
/**
 * Created by PhpStorm.
 * User: Ironman
 * Date: 8/16/2015
 * Time: 7:38 PM
 */

    class Sp4kModulesVenueControllersItemDisplay extends Sp4kBaseControllerDisplay
    {
        public function execute()
        {
            $request = $this->app->input->getArray();

            $viewNameParts  = explode('.',$request);

            //dump the module name in first element.
            array_shift($viewNameParts);

            if(count($viewNameParts) == 0){
                array_push($viewNameParts,'Items');
            }

            $viewLayoutName = '';

            $viewName = '';

            array_walk( $viewNameParts, function( $v, $k ) use ( &$viewName ){
                $viewName .= ucfirst($v);
            });

            /** @var JModelBase $modelName */
            $modelName = 'Sp4kModulesVenueModelsVenue';


            $formatName = ucfirst($this->app->input->getCmd('format','html'));
            $viewName = 'Sp4kModulesVenueViews'.$viewName.$formatName;

            $model = new $modelName(
                new Joomla\Registry\Registry($request)
            );
            /** @var JViewHtml $view */
            $view = new $viewName(
                new $modelName(
                    new Joomla\Registry\Registry(
                        $this->app->input->getArray()
                    )
                )
            );

            if($viewLayoutName !='')$view->setLayout($viewLayoutName);

            echo $view->render();
        }
    }