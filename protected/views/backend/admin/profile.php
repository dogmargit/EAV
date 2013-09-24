<?php 
$this->breadcrumbs=array( 
    'Профиль',
);

$form=$this->beginWidget('CActiveForm', array(
    'htmlOptions' => array('enctype'=>'multipart/form-data'))); 

$this->flashes($form->errorSummary($model)); ?>

<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="head dark">
                <div class="icon"><i class="icos-pencil3"></i></div>
                <h2>Изменение профиля</h2>
            </div>
            <div class="block-fluid">
                <div class="row-form">
                    <div class="span3">
                        <img src="<?php if($model->pic) { echo '/images/thumbs_160/'.$model->pic;}  else { echo '/resourses/backend/img/examples/users/dmitry.jpg'; };?>" class="img-polaroid" style="margin-bottom: 5px;" width="100px">
                    </div>
                    <div class="span9">
                        <p class="np nm"><strong>Аватар:</strong></p>
                        <div class="input-append file">
                            <?php echo CHtml::activeFileField($model, 'pic'); ?> 
                            <input type="text" style="width: 349px;">
                            <button class="btn">Выбрать</button>
                        </div>
                    </div>
                </div>                                        
                <div class="row-form">
                    <div class="span3"><?php echo $form->labelEx($model,'username'); ?></div>
                    <div class="span9"><?php echo $form->textField($model,'username'); ?></div>
                </div>
                <div class="row-form">
                    <div class="span3"><?php echo $form->labelEx($model,'email'); ?></div>
                    <div class="span9"><?php echo $form->textField($model,'email'); ?></div>
                </div>                                        
                <div class="row-form">
                    <div class="span3"><?php echo $form->labelEx($model,'phone'); ?></div>
                    <div class="span9"><?php echo $form->textField($model,'phone'); ?></div>
                </div>
                <div class="row-form">
                    <div class="span3"><?php echo $form->labelEx($model,'address'); ?></div>
                    <div class="span9"><?php echo $form->textArea($model,'address'); ?></div>
                </div>
                <div class="row-form">
                    <div class="span3"><?php echo $form->labelEx($model,'password'); ?></div>
                    <div class="span9"><?php echo $form->passwordField($model,'password'); ?></div>
                </div>         
                <div class="row-form">
                    <div class="span3"><?php echo $form->labelEx($model,'confirmpassword'); ?></div>
                    <div class="span9"><?php echo $form->passwordField($model,'confirmpassword'); ?></div>
                </div>                                                                                                                                               
            </div>
        </div>      
        <div class="widget">
            <div class="row-fluid">
                <div class="toolbar bottom TAL">
                    <?php echo CHtml::button('Сохранить', array('submit'=>'', 'class'=>'btn btn-primary'));?>    
                    <a class="btn" href="javascript:javascript:history.go(-1)">Вернуться</a>                    
                </div>                      
            </div>  
        </div>  
    </div>
    <?php $this->endWidget(); ?>
</div>