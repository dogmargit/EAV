<?php if(Yii::app()->cart->getItemsCount() > '0'): ?>
<div class="checkout-steps">
    <div class="clearfix" style="text-align:center;">
        <span class="span1"></span>
        <div class="step active">
            <div class="step-badge">1</div>
            Корзина
        </div>
        <div class="step">
            <div class="step-badge">3</div>
            Оформление данных
        </div>
        <div class="step">
            <div class="step-badge">4</div>
            Заказ оформлен
        </div>
    </div>
</div>
<form action="" method="post" enctype="multipart/form-data" id="basket">
<table class="table table-items">
    <thead>
        <tr>
            <th colspan="2">Товар</th>
            <th><div class="align-right">Цена</div></th>
            <th><div class="align-center">Количество</div></th>
            <th><div class="align-right">Сумма</div></th>
        </tr>
    </thead>
    <tbody>
        <?php $i='0'; foreach(Yii::app()->cart->getItems() as $position): ?>
        <tr data-index="<?=$position['index'];?>">
            <td class="image"><?=CHtml::link("<img src='/images/thumbs_160/".($position['options']['pic']?$position['options']['pic']:$position['pic'])."' title='".$position['title']."' alt='".$position['title']."'>", array('products/view', 'id'=>$position['product_id'], 'name'=>$position['url'])); ?></td>
            <td class="desc"><?=$position['title'].($position['options']['color_title']?" - ".$position['options']['color_title']:'');?></td>
            <td class="price">
                <?=$position['price'];?>
            </td>
            <td class="qty">
                <input type="hidden" name="position[<?=$i;?>][index]" value="<?=$position['index'];?>"/>
                <input type="text" class="tiny-size" name="position[<?=$i;?>][qty]" value="<?=$position['quantity'];?>" size="1">
                <a class="icon-remove-sign" href="/as/"></a>
            </td>
            <td class="price">
                <?=($position['price']*$position['quantity']);?>
            </td>
        </tr>
        <?php $i++; endforeach; ?>
        <tr>
            <td colspan="3" rowspan="3">
                <div class="alert alert-info">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    Доставка расходы рассчитываются в зависимости от местоположения. <a href="#">Правила доставки</a>
                </div>
            </td>
            <td class="stronger">Общая цена:</td>
            <td class="stronger"><div class="size-16 align-right">17500 р</div></td>
        </tr>
        <tr>
            <td class="stronger">Доставка:</td>
            <td class="stronger"><div class="align-right">300 р</div></td>        
        </tr>
        <tr>
            <td class="stronger">Итого:</td>
            <td class="stronger"><div class="align-right">17800 р</div></td>        
        </tr>
    </tbody>
</table>
<hr />
<p class="pull-left">
    <?=CHtml::submitButton('Обновить корзину', array('class'=>'btn btn-primary higher bold')); ?>
</p>
<p class="pull-right">
    <?=CHtml::link('Продолжить', array('/cart/checkout'), array('class'=>'btn btn-success higher bold')); ?>
</p>
<?php else: ?>
    <div class="text-center">
        <p>Ваша корзина пуста</p>
        <p><?=CHtml::link('Вернуться на главную', '/', array('class'=>'btn higher bold')); ?></p>
    </div>
</form>
<?php endif; ?>