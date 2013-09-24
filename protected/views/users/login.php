<?php
$this->breadcrumbs=array(
    'Вход',
);
?>
<div class="row">
<div class="span12">
    <div class="title-area">
        <h1 class="inline"><span class="light">Вход</span></h1>
    </div>
</div>
<section class="span12 single single-page">
<?php
$form=$this->beginWidget('CActiveForm', array(
    'id'=>'login-form',
    'enableClientValidation'=>true,
    'htmlOptions'=>array(
        'class'=>'std',
        'id'=>'login_form',
    ),
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
<div class=" align-center">
    <b>E-Mail Адрес:</b><br>
    <?php echo $form->textField($model,'email'); ?>
    <?php echo $form->error($model,'email'); ?>
    <br>
    <br>
    <b>Пароль:</b><br>
    <?php echo $form->passwordField($model,'password'); ?>
    <?php echo $form->error($model,'password'); ?>
    <br>
    <a href="/forgotten/">Восстановить пароль</a><br>
    <br>
    <?php echo CHtml::submitButton('Войти', array('class'=>'btn btn-primary bold')); ?>
</div>
<?php $this->endWidget(); ?>
</section>
</div>
 
