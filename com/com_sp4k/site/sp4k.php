<?php

    defined('_JEXEC') or die('Restricted access');

    JLoader::registerPrefix("Sp4k",__DIR__);
    JLoader::registerPrefix("Sp4k",JPATH_LIBRARIES."/sp4k");

    $doc = JFactory::$document;
    //$doc->addStyleSheet(JUri::base() . '/media/com_sp4k/css/jobs.css');
    //$doc->addStyleSheet(JUri::base() . '/media/com_sp4k/lib/jqueryui/jquery-ui.min.css');
    //$doc->addStyleSheet(JUri::base() . '/media/com_sp4k/lib/jqueryui/jquery-ui.theme.min.css');
    //$doc->addStyleSheet(JUri::base() . '/media/com_sp4k/lib/jqueryui/jquery-ui.structure.min.css');


    //$doc->addScript(JUri::base() . '/media/com_sp4k/js/jobs.js','text/javascript',true,true);
    //$doc->addScript(JUri::base() . '/media/com_sp4k/lib/jqueryui/jquery-ui.min.js','text/javascript',true,true);

    $controllerNamePrefix = 'Sp4kModules';
    $input = JFactory::$application->input;

    $controller = null;
    $controllerName = null;
    $controllerNameSuffix = null;
    $controllerParts = [];

    $view = false;
    $task = false;
    $display = null;


    $request =
        $input->get('controller',//is controller set?
            $input->get('task',false)//else is task set?
        );

    if($request == false){
        //fall back to view
        if($request = $input->get('view', false)){
            $request .= '.display';
        }else{
            $request = 'venue.list.display';
        }
    }

    $controllerParts = explode('.',$request);
    $controllerNamePrefix .= ucfirst(array_shift($controllerParts)).'Controllers';
    array_walk($controllerParts , function( $v, $k)use(&$controllerName){
        $controllerName .= ucfirst($v);
    });

    $controllerName .= $display;
    $controllerName = $controllerNamePrefix . $controllerName;


    /** @var JControllerBase $controller */
    $controller = new $controllerName();
    $controller->execute();