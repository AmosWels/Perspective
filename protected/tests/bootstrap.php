<?php

// change the following paths if necessary
$yiit='D:\Enovate\Dev\Yii\yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
