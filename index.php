<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/YiiBase.php';
$config=dirname(__FILE__).'/protected/config/main.php';
require_once($yii);

class Yii extends YiiBase {
    /**
     * @static
     * @return CWebApplication
     */
    public static function app()
    {
        return parent::app();
    }
}
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

$app = Yii::createWebApplication($config)->run();