<?php $form=$this->beginWidget('CActiveForm', array(
    'htmlOptions' => array('enctype'=>'multipart/form-data'))); 

$this->flashes($form->errorSummary($model)); ?>

<div class="row-fluid">
    <div class="span12">                
        <div class="widget">
            <div class="head dark">
                <div class="icon"><i class="icos-pencil2"></i></div>
                <h2>Обзор</h2>
            </div>  
            <div class="block-fluid tabbable">                    
                <ul class="nav nav-tabs">
                    <li  class="active"><a href="#tab0" data-toggle="tab">Обзор</a></li>
                    <li><a href="#tab1" data-toggle="tab">Расцветки</a></li>
                    <li><a href="#tab2" data-toggle="tab">Связь</a></li>
                    <li><a href="#tab3" data-toggle="tab">Сопутствующие</a></li>
                    <li><a href="#tab4" data-toggle="tab">Мета Теги</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab0">
                <div class="row-form">
                    <div class="span2">Опции:</div>
                    <div class="span10">
                    <?php echo $form->checkBox($model,'checked'); ?>
                    <?php echo $form->labelEx($model,'checked'); ?>
                    <?php echo $form->checkBox($model,'recomended'); ?>
                    <?php echo $form->labelEx($model,'recomended'); ?>
                    <?php echo $form->checkBox($model,'special'); ?>
                    <?php echo $form->labelEx($model,'special'); ?>
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
                    <div class="span2"><?php echo $form->labelEx($model,'price'); ?></div>
                    <div class="span10"><?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>255)); ?></div>
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
                    <div class="span2"><?php echo $form->labelEx($model,'pic'); ?></div>
                    <div class="span10">    
                        <?php if($model->pic):?>
                        <div class="row-form">
                            <div class="sGallery clearfix">
                                <div class="item" id="sgImg_1" style="margin-left: 19px; margin-right: 19px;">
                                    <a href="/images/<?=$model->pic;?>" class="fb" rel="group"><img src="/images/thumbs_160/<?=$model->pic;?>" width="160"></a>
                                    <ul class="controls">
                                         <li><i class="icon-remove"></i> <?php echo $form->checkBox($model,'pic_del'); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php else:?>
                        <div class="input-append file">
                            <?php echo CHtml::activeFileField($model, 'pic'); ?>
                            <input type="text"/>
                            <button class="btn" onclick="return false;">Выбрать</button>
                        </div>
                        <?php endif;?>              
                    </div>
                </div> 

                    </div>
                    <div class="tab-pane" id="tab1">
                        <div class="row-form">
                            <div class="span3">Изображение:</div>
                            <div class="span9">               
                                <div class="input-append file">
                                    <input name="pics[]" type="file" multiple="true">
                                    <input type="text"/>
                                    <button class="btn" onclick="return false;">Выбрать</button>
                                </div>
                            </div>
                        </div> 
                        <div class="block-fluid events">
                            <?php foreach($model->pics as $item): ?>
                            <div class="item" style="display:block;min-height:80px;padding:5px;">
                                <div class="date">
                                    <img src="/images/thumbs_160/<?=$item['pic'];?>" />
                                </div>
                                <div class="info">
                                    <div class=" pull-right">
                                        <input type="checkbox" value="<?=$item['pic'];?>" name="pics[<?=$item['id'];?>][imgs_del]"/>Удалить
                                    </div>      
                                    <?php echo CHtml::hiddenField('pics['.$item["id"].'][id]', $item["id"]); ?>
                                    <?php echo CHtml::textField('pics['.$item["id"].'][title]', $item["title"], array('size'=>60,'maxlength'=>255, 'class'=>'span3')); ?>
                                    <?php echo CHtml::textField('pics['.$item["id"].'][price]', $item["price"], array('size'=>60,'maxlength'=>255, 'class'=>'span3')); ?>
                                    <?php echo CHtml::textField('pics['.$item["id"].'][url]', $item["url"], array('size'=>60,'maxlength'=>255, 'class'=>'span3')); ?>                               <div class="clearfix"></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="row-form">
                            <div class="span3">Производитель:</div>
                            <div class="span9">
                                <?php echo CHtml::activeDropDownList($model, 'brands_id', CHtml::listData(Brands::model()->checked()->findAll(),'id', 'title'), array('option selected'=>$data->manufacturer_id, 'class'=>'select', 'style'=>'width: 100%;')); ?>
                            </div>
                        </div> 
                        <div class="row-form">
                            <div class="span3">Категория:</div>
                            <div class="span9">
                                <select name="Categories[]" class="select" multiple="multiple" style="width: 100%">
                                <?=Category::model()->get_html_select(Category::model()->tree_array(Category::model()->FindAll()), '0', $model->get_id_categories($model->categories));?>
                                </select>
                            </div>
                        </div>  
                        <div class="clear"></div>  
                    </div>
                    <div class="tab-pane" id="tab3">
                        <div class="row-form">
                            <div class="span12">
                                <span class="top title">Список товаров:</span>
                                <?php $htmlOptions = array('multiple' => 'multiple', 'id'=>'msc', 'options' =>$related_select);
                                echo CHtml::listBox('Related', 'title', CHtml::listData(Products::model()->findAll(),'id', 'title'), $htmlOptions); ?>
                                <div class="btn-group">
                                    <button class="btn btn-mini btn-primary" id="ms_select">Выбрать все</button>
                                    <button class="btn btn-mini btn-primary" id="ms_deselect">Удалить все</button>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="tab-pane" id="tab4">
                        <div class="row-form">
                            <div class="span2"><?php echo $form->labelEx($model,'meta_title'); ?></div>
                            <div class="span10"><?php echo $form->textField($model,'meta_title',array('size'=>60,'maxlength'=>255)); ?></div>
                        </div>
                        <div class="row-form">
                            <div class="span2"><?php echo $form->labelEx($model,'meta_keywords'); ?></div>
                            <div class="span10"><?php echo $form->textArea($model,'meta_keywords',array('size'=>60,'maxlength'=>255)); ?></div>
                        </div>
                        <div class="row-form">
                            <div class="span2"><?php echo $form->labelEx($model,'meta_description'); ?></div>
                            <div class="span10"><?php echo $form->textArea($model,'meta_description',array('size'=>60,'maxlength'=>255)); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>
<div class="widget">
    <div class="row-fluid">
        <div class="toolbar bottom TAL">
            <?php echo CHtml::button('Сохранить', array('submit'=>'', 'class'=>'btn btn-primary'));?>                     
            <a class="btn" href="/admin/products/">Вернуться</a>    
        </div>                      
    </div>  
</div>
<?php $this->endWidget(); ?>