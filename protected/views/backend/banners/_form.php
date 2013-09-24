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
                    <div class="span2"><?php echo $form->labelEx($model,'position'); ?></div>
                    <div class="span10"><?php echo $form->textField($model,'position',array('size'=>60,'maxlength'=>255)); ?></div>
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
                <div class="row-form">
                    <div class="span2">Объекты</div>
                    <div class="span10">
                        <?php if($model->objects): ?>
                        <?php foreach($model->objects as $item): ?>
                        <input type="hidden" value="<?=$item->id;?>" name="objects[<?=$item->id;?>][id]">
                        <a href="#model_<?=$item->id;?>" role="button" class="btn" data-toggle="modal"># <?=$item->id;?></a>
                        <div id="model_<?=$item->id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Объект № <?=$item->id;?></h3>
                          </div>
                          <div class="modal-body">
                            <div class="row-form">
                                <div class="span3">Позиция ширины:</div>
                                <div class="span9">
                                    <span class="top slider_b" id="slider_<?=$item->id;?>_data_x" data-slider-id="<?=$item->id;?>" data-value="<?=$item->data_x;?>" data-max="1000" data-name="data_x"></span>
                                    <div></div> 
                                    <input type="text" value="<?=$item->data_x;?>" name="objects[<?=$item->id;?>][data_x]">
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span3">Позиция высоты:</div>
                                <div class="span9">
                                    <span class="top slider_b" id="slider_<?=$item->id;?>_data_y" data-slider-id="<?=$item->id;?>" data-value="<?=$item->data_y;?>" data-max="1000" data-name="data_y"></span>
                                    <div></div> 
                                    <input type="text" name="objects[<?=$item->id;?>][data_y]" value="<?=$item->data_y;?>" >
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span3">Скорость:</div>
                                <div class="span9">
                                    <span class="top slider_b" id="slider_<?=$item->id;?>_data_speed" data-slider-id="<?=$item->id;?>" data-value="<?=$item->data_speed;?>" data-max="5000" data-name="data_speed"></span>
                                    <div></div> 
                                    <input type="text" name="objects[<?=$item->id;?>][data_speed]" value="<?=$item->data_speed;?>" >
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span3">Начальная задержка:</div>
                                <div class="span9">
                                    <span class="top slider_b" id="slider_<?=$item->id;?>_data_start" data-slider-id="<?=$item->id;?>" data-value="<?=$item->data_start;?>" data-max="3000" data-name="data_start"></span>
                                    <div></div> 
                                    <input type="text" name="objects[<?=$item->id;?>][data_start]" value="<?=$item->data_start;?>" >
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span3">Текст:</div>
                                <div class="span9">
                                    <textarea style="min-height: 50px !important;" name="objects[<?=$item->id;?>][text]"><?=$item->text;?></textarea>
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span3">Изображение:</div>
                                <div class="span9">
                                    <?php if($item->pic):?>
                                    <div class="row-form">
                                        <div class="sGallery clearfix">
                                            <div class="item" id="sgImg_1">
                                                <a href="/images/<?=$item->pic;?>" class="fb" rel="group"><img src="/images/<?=$item->pic;?>" ></a>
                                                <ul class="controls">
                                                     <li><i class="icon-remove"></i> <input type="checkbox" value="<?=$item->pic?>" name="objects[<?=$item->id;?>][pic_del]"> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php else:?>
                                    <div class="input-append file">
                                    <input name="objects_pics[<?=$item->id;?>]" type="file" multiple="true" style="width: 803px;">
                                    <input type="text" style="width: 817px;">
                                    <button class="btn" onclick="return false;">Выбрать</button>
                                    </div>
                                    <?php endif;?>  
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span3">Тип объекта:</div>
                                <div class="span9">
                                    <?=CHtml::dropDownList('objects['.$item->id.'][class]', $item->class, array(
                                        'lft ltt'=>'Картинка',
                                        'lfl str' => 'Вдоль летающий объект',
                                        'lfl big_theme'=>'Заголовок',
                                        'lfl small_theme'=>'Описание',
                                        'lfl btn'=>'Кнопка',
                                    )); ?>
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span3">Ссылка:</div>
                                <div class="span9">
                                    <input type="text" name="objects[<?=$item->id;?>][link]" />
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span3">Кнопка:</div>
                                <div class="span9">
                                    <?=CHtml::dropDownList('objects['.$item->id.'][btn]', $item->class, array(
                                        'btn-danger'=>'Голубая',
                                        'btn-success'=>'Желтая',
                                        'btn-warning'=>'Оранжевая',
                                        'btn-info'=>'Синяя',
                                        'btn-primary'=>'Синяя',
                                    )); ?>
                                </div>
                            </div>
                            <div class="row-form">
                                <div class="span3">Эффект:</div>
                                <div class="span9">
                                    <?=CHtml::dropDownList('objects['.$item->id.'][data_easing]', $item->data_easing, array(
                                        'linear'=>'linear',
                                        'easeInSine'=>'easeInSine',
                                        'easeOutSine'=>'easeOutSine',
                                        'easeInOutSine'=>'easeInOutSine',
                                        'easeInQuad'=>'easeInQuad',
                                        'easeOutQuad'=>'easeOutQuad',
                                        'easeInOutQuad'=>'easeInOutQuad',
                                        'easeInCubic'=>'easeInCubic',
                                        'easeOutCubic'=>'easeOutCubic',
                                        'easeInOutCubic'=>'easeInOutCubic',
                                        'easeInQuart'=>'easeInQuart',
                                        'easeOutQuart'=>'easeOutQuart',
                                        'easeInOutQuart'=>'easeInOutQuart',
                                        'easeInQuint'=>'easeInQuint',
                                        'easeOutQuint'=>'easeOutQuint',
                                        'easeInOutQuint'=>'easeInOutQuint',
                                        'easeInExpo'=>'easeInExpo',
                                        'easeOutExpo'=>'easeOutExpo',
                                        'easeInOutExpo'=>'easeInOutExpo',
                                        'easeInCirc'=>'easeInCirc',
                                        'easeOutCirc'=>'easeOutCirc',
                                        'easeInOutCirc'=>'easeInOutCirc',
                                        'easeInBack'=>'easeInBack',
                                        'easeOutBack'=>'easeOutBack',
                                        'easeInOutBack'=>'easeInOutBack',
                                        'easeInElastic'=>'easeInElastic',
                                        'easeOutElastic'=>'easeOutElastic',
                                        'easeInOutElastic'=>'easeInOutElastic',
                                        'easeInBounce'=>'easeInBounce',
                                        'easeOutBounce'=>'easeOutBounce',
                                        'easeInOutBounce'=>'easeInOutBounce',
                                    )); ?>
                                    <span class="bottom pull-right"><a href="http://easings.net/ru" target="_blank">Шпаргалка</a></span>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <a class="btn" data-dismiss="modal" aria-hidden="true">Сохранить</a>
                          </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <a href="#add_object" role="button" class="btn" data-toggle="modal">Добавить</a>
                    </div>
                </div>
                <div id="add_object" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Добавить объекты</h3>
                  </div>
                  <div class="modal-body">
                    <span class="top title">Кол-во Объектов:</span>
                    <input type="text" name="add_object" value=""/>   
                  </div>
                  <div class="modal-footer">
                    <a class="btn" data-dismiss="modal" aria-hidden="true">Сохранить</a>
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
            <a class="btn" href="/admin/banners/">Вернуться</a>    
        </div>                      
    </div>  
</div>
<?php $this->endWidget(); ?>