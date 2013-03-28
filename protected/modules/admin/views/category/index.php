
<?php
    echo CHtml::link('Добавить рубрику', $this->createUrl('add'), array('class'=>'btn'));
    echo "<br>";
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider'=>$data,
        'columns'=>array(
            'name',
            array(
                'name'=>'logo',
                'type'=>'html',
                'value'=>'CHtml::link(CHtml::image(Yii::app()->baseUrl."/uploads/thumb_50x50_".$data->logo), Yii::app()->baseUrl."/uploads/original_".$data->logo)',
            ),
            array(
                'class'=>'CButtonColumn',
                'template'=>'{update} {delete}'
            ),
        ),
    ));
?>