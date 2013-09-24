<?php $form=$this->beginWidget('CActiveForm', array(
    'htmlOptions' => array('enctype'=>'multipart/form-data'))); 

$this->flashes($form->errorSummary($model)); ?>

<div class="row-fluid">
    <div class="span6">                 
        <div class="widget">
            <div class="head dark">
                <div class="icon"><i class="icos-pencil2"></i></div>
                <h2>Обзор</h2>
            </div>                        
            <div class="block-fluid">
                <div class="row-form">
                    <div class="span2">Опции:</div>
                    <div class="span10">
                    <?php echo $form->checkBox($model,'checked'); ?>
                    <?php echo $form->labelEx($model,'checked'); ?>
                    </div>
                </div>
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'username'); ?></div>
                    <div class="span10"><?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?></div>
                </div>
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'role'); ?></div>
                    <div class="span10"><?php echo $form->dropDownList($model,'role',array('administrator'=>'Администратор','moderator'=>'Оператор', 'user'=>'Клиент'),array(
              		'class'=>'select','style'=>'width:100%',
              			 )); ?>
           			</div>
                </div>
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'phone'); ?></div>
                    <div class="span10"><?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?></div>
                </div>
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'email'); ?></div>
                    <div class="span10"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?></div>
                </div>
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'address'); ?></div>
                    <div class="span10"><?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="widget">
    <div class="row-fluid">
        <div class="toolbar bottom TAL">
            <?php echo CHtml::button('Сохранить', array('submit'=>'', 'class'=>'btn btn-primary'));?>                     
            <a class="btn" href="/admin/users/">Вернуться</a>    
        </div>                      
    </div>  
</div>
<?php $this->endWidget(); ?>