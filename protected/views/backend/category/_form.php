<?php 
$form=$this->beginWidget('CActiveForm', array(
    'htmlOptions' => array('enctype'=>'multipart/form-data'))); 

$this->flashes($form->errorSummary($model)); ?>

<div class="row-fluid">
    <div class="span12">                
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
                    <div class="span2"><?php echo $form->labelEx($model,'title'); ?></div>
                    <div class="span10"><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?></div>
                </div>
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'url'); ?></div>
                    <div class="span10"><?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?></div>
                </div>
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'parent_id'); ?></div>
                    <div class="span10">
                    <select name="Category[parent_id]" class="select" style="width: 100%">
                        <option value='0'>Пусто</option>
                        <?=$model->get_html_select($model->tree_array(Category::model()->FindAll()), '0', $model->parent_id?array('1'=>$model->parent_id):false);?>
                    </select>
                    </div>
                </div>  
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'description'); ?></div>
                    <div class="span10"><?php $this->widget('ImperaviRedactorWidget', array(
                    'model' => $model,
                    'attribute' => 'description',
                    'name' => 'description',
                    'htmlOptions'=>array('style'=>'height:300px'),
                        'options' => array(
                            'lang' => 'ru',
                            'toolbar' => true,
                            'iframe' => true,
                            'css' => 'wym.css',
                        ),
                     )); ?>
                    </div>                        
                </div>
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'meta_title'); ?></div>
                    <div class="span10"><?php echo $form->textField($model,'meta_title',array('size'=>60,'maxlength'=>255)); ?></div>
                </div>
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'meta_keywords'); ?></div>
                    <div class="span10"><?php echo $form->textField($model,'meta_keywords',array('size'=>60,'maxlength'=>255)); ?></div>
                </div>
                <div class="row-form">
                    <div class="span2"><?php echo $form->labelEx($model,'meta_description'); ?></div>
                    <div class="span10"><?php echo $form->textField($model,'meta_description',array('size'=>60,'maxlength'=>255)); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="widget">
    <div class="row-fluid">
        <div class="toolbar bottom TAL">
            <?php echo CHtml::button('Сохранить', array('submit'=>'', 'class'=>'btn btn-primary'));?>                     
            <a class="btn" href="/admin/category/">Вернуться</a>    
        </div>                      
    </div>  
</div>
<?php $this->endWidget(); ?>