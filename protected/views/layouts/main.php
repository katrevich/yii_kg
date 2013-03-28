<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <?php

    $meta_id =  Settings::model()->find()->meta_id;
    $meta = Meta::model()->findByPk($meta_id);

    Yii::app()->params->title = $meta->title;
    Yii::app()->params->keywords = $meta->keywords;
    Yii::app()->params->description = $meta->description;

    ?>

    <title><?php echo Yii::app()->params->title; ?></title>

    <meta name="description" content="<?php echo Yii::app()->params->description; ?>">
    <meta name="keywords" content="<?php echo Yii::app()->params->keywords; ?>">

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/common.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>


    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="site-top-line">
        строка юзера
    </div>
    <header class="site-header site-container">
        <?php
            $this->widget('zii.widgets.CMenu', array(
                'items'=>array(
                    // Important: you need to specify url as 'controller/action',
                    // not just as 'controller' even if default acion is used.
                    array('label'=>'Главная', 'url'=>array('site/index')),
                    array('label'=>'Каталог', 'url'=>array('catalog/index')),
                    array('label'=>'Доставка', 'url'=>array('site/page/id/shipping')),
                ),
            ));
        ?>
    </header>
    <div class="site-content site-container">
        <?php echo $content; ?>
    </div>
    <footer class="site-footer site-container">
        футер
    </footer>
</body>
</html>
