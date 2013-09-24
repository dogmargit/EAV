<div class="checkout-steps">
    <div class="clearfix" style="text-align:center;">
        <span class="span1"></span>
        <div class="step done">
            <div class="step-badge">1</div>
            Корзина
        </div>
        <div class="step active">
            <div class="step-badge">3</div>
            Оформление данных
        </div>
        <div class="step">
            <div class="step-badge">4</div>
            Заказ оформлен
        </div>
    </div>
</div>
<?php
$form=$this->beginWidget('CActiveForm', array(
    'htmlOptions'=>array(
        'class'=>'form-horizontal form-checkout',
    )
)); ?>
<div class="control-group">
    <?php echo $form->labelEx($model,'user_name', array('class'=>'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model,'user_name', array('class'=>'span4')); ?> <?php echo $form->error($model,'user_name'); ?>
    </div>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model,'user_email', array('class'=>'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model,'user_email', array('class'=>'span4')); ?> <?php echo $form->error($model,'user_email'); ?>
    </div>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model,'user_phone', array('class'=>'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model,'user_phone', array('class'=>'span2')); ?> <?php echo $form->error($model,'user_phone'); ?>
    </div>
</div>
<div class="control-group">
    <?php echo $form->labelEx($model,'user_address', array('class'=>'control-label')); ?>
    <div class="controls">
        <?php echo $form->textArea($model,'user_address', array('class'=>'span4', 'rows'=>'4')); ?> <?php echo $form->error($model,'user_address'); ?>
    </div>
</div>
<hr />
<p class="pull-left">
    <?=CHtml::link('Пересчитать', array('/cart'), array('class'=>'btn higher bold')); ?>
</p>
<p class="pull-right">
    <?=CHtml::submitButton('Оформить заказ', array('class'=>'btn btn-success higher bold')); ?>
</p>
<?php $this->endWidget(); ?>