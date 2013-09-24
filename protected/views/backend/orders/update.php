<?php
$this->breadcrumbs=array(
    'Заказы'=>array('admin/orders'),
    $model->user_email,
);

$form=$this->beginWidget('CActiveForm', array(
    'htmlOptions' => array('enctype'=>'multipart/form-data'))); 

$this->flashes($form->errorSummary($model)); ?>

<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="block invoice">
                <h1>Заказ #<?=$model->id?></h1>
                <span class="date">Дата: <?=$model->created_at;?></span>
                <div class="row-fluid">
                    <div class="span4">
                        <h4>От <?=$model->user_name;?></h4>
                        <address>
                            <p><strong>Имя:</strong> <?=$model->user_name;?></p>
                            <p><strong>Адрес:</strong> <?=$model->user_address;?></p>
                            <p><strong>Телефон:</strong> <?=$model->user_phone;?></p>
                            <p><strong>Комментарий:</strong> <?=$model->user_comment;?></p>
                        </address>
                    </div>
                    <div class="span3">
                        <h4>Доп. Информация</h4>
                        <address>
                            <p><strong>IP адрес.</strong> <?=$model->user_ip;?></p>
                            <p><strong>Электронный адрес.</strong> <?=$model->user_email;?></p>
                        </address>                                
                    </div>
                    <div class="span2"></div>
                    <div class="span3">
                        <h4>Накладная</h4>
                        <p><strong>Дата заказа:</strong> <?=$model->created_at;?></p>
                        <p><strong>Дата доставки:</strong> <?=$model->created_at;?></p>
                        <div class="highlight">
                            <strong>На сумму:</strong> <?=$model->subtotal;?> <em>Рублей</em>
                        </div>
                    </div>
                </div>
                <h3>Позиции</h3>
                <table cellpadding="0" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="70%">Товар</th>
                            <th width="10%">Цена</th>
                            <th width="10%">Кол-во</th>
                            <th width="10%">сумма</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($model->products as $item): ?>
                        <tr>
                            <td><a href="/products/view/<?=$item['id']?>"><?=$item['products_name']?></a></td>
                            <td><?=$item['price']?></td>
                            <td><?=$item['quantity']?></td>
                            <td><?=$item['subtotal']?></td>
                        </tr>   
                        <? endforeach; ?>                                      
                    </tbody>
                </table>
                <div class="row-fluid">
                    <div class="span3">
                    <?php echo $form->labelEx($model,'status_id'); ?>
                    <?php echo $form->dropDownList($model,'status_id', array('1'=>'Новый', 'Проверен')); ?>
                    <?php echo $form->error($model,'status_id'); ?>
                    </div>
                    <div class="span6"></div>
                    <div class="span3">
                        <div class="total">
                            <div class="highlight">
                                <strong><span>Итого:</span> <?=$model->subtotal;?> <em>Р</em></strong>
                            </div>
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
            <a class="btn" href="/admin/orders/">Вернуться</a>    
        </div>                      
    </div>  
</div>
<?php $this->endWidget(); ?>