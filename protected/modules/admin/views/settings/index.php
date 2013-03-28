<?php $form = $this->beginWidget('CActiveForm'); ?>

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
    <?php echo $form->labelEx($model,'contacts_text'); ?>
    <?php echo $form->textArea($model,'contacts_text'); ?>
    <?php echo $form->error($model,'contacts_text'); ?>
</div>

<div class="row">
    <?php echo CHtml::submitButton('Сохранить', array('class'=>'btn'))?>
</div>

<?php $this->endWidget(); ?>

<?php $form = $this->beginWidget('CActiveForm'); ?>

<?php echo $form->errorSummary($model); ?>

<br>

<div class="form-title">Настройки доступа</div>

<div class="row">
    <?php echo $form->labelEx($changePassword_model,'pass_old'); ?>
    <?php echo $form->passwordField($changePassword_model,'pass_old', array('class'=>'short')); ?>
    <?php echo $form->error($changePassword_model,'pass_old'); ?>
</div>
<br>

<div class="row">
    <?php echo $form->labelEx($changePassword_model,'username_new'); ?>
    <?php echo $form->textField($changePassword_model,'username_new', array('class'=>'short')); ?>
    <?php echo $form->error($changePassword_model,'username_new'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($changePassword_model,'pass_new'); ?>
    <?php echo $form->passwordField($changePassword_model,'pass_new', array('class'=>'short')); ?>
    <?php echo $form->error($changePassword_model,'pass_new'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($changePassword_model,'pass_new2'); ?>
    <?php echo $form->passwordField($changePassword_model,'pass_new2', array('class'=>'short')); ?>
    <?php echo $form->error($changePassword_model,'pass_new2'); ?>
</div>

<div class="row">
    <?php echo CHtml::submitButton('Сменить', array('class'=>'btn'))?>
</div>

<?php $this->endWidget(); ?>