<?php
$this->breadcrumbs=array(
    'Настройки',
);

$this->flashes(); ?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'products-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype'=>'multipart/form-data'))); ?>
        <div class="row-fluid">
            <div class="span12">                
                <div class="widget">
                    <div class="head dark">
                        <div class="icon"><i class="icos-pencil2"></i></div>
                        <h2>Обзор</h2>
                    </div>                        
                    <div class="block-fluid">
                        <?php foreach($model as $item): ?>
                        <div class="row-form">
                            <div class="span4"><label for="Products_url"><?=$item['title'];?></label></div>
                            <div class="span8"><input size="60" maxlength="255" name="Settings[<?=$item['id'];?>][id]" type="hidden" value="<?=$item['id'];?>">
                                <input size="60" maxlength="255" name="Settings[<?=$item['id'];?>][value]" id="Products_url" type="text" value="<?=$item['value'];?>"></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
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
<?php $this->endWidget(); ?>