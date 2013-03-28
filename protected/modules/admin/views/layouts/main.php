<!doctype html>
<html>
<head>
    <title>KG - admin</title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css">
</head>
<body>

    <div id="admin" class="clear">
        <div class="main">
            <div class="main-in clear">
                <?php echo $content; ?>
            </div>

        </div>
        <div class="side">
        <?php
            $this->widget('zii.widgets.CMenu', array(
                'items'=>array(
                    array('label'=>'Настройки', 'url'=>array('/admin/settings')),
                    array('label'=>'Категории', 'url'=>array('/admin/category')),
                    array('label'=>'Товары', 'url'=>array('/admin/product')),
                    array('label'=>'Страницы', 'url'=>array('/admin/page')),
                ),
            ));
            ?>
        </div>

    </div>

</body>
</html>