<?php $form = $this->beginWidget('CActiveForm', array(
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
        )
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="form-title">Основные настройки</div>

<div class="row">
    <?php echo $form->labelEx($meta_model,'title'); ?>
    <?php echo $form->textField($meta_model,'title'); ?>
    <?php echo $form->error($meta_model,'title'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($meta_model,'description'); ?>
    <?php echo $form->textArea($meta_model,'description'); ?>
    <?php echo $form->error($meta_model,'description'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($meta_model,'keywords'); ?>
    <?php echo $form->textArea($meta_model,'keywords'); ?>
    <?php echo $form->error($meta_model,'keywords'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'name'); ?>
    <?php echo $form->textArea($model,'name'); ?>
    <?php echo $form->error($model,'name'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'logo'); ?>
    <?php if($model->logo): ?>
    <p><?php echo CHtml::image(Yii::app()->baseUrl.'/uploads/thumb_50x50_'.$model->logo); ?></p>
    <?php endif; ?>
    <?php echo $form->fileField($model,'logo_file'); ?>
    <?php echo $form->error($model,'logo'); ?>
</div>

<div class="row">
    <?php echo CHtml::submitButton($model->isNewRecord?'Создать':'Сохранить', array('class'=>'btn'))?>
</div>

<?php $this->endWidget(); ?>