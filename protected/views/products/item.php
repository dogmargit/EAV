<div class="span3">
    <div class="product">
        <div class="product-img">
            <div class="picture">
                <img width="240" alt="" src="/images/thumbs_160/<?=$data->pic;?>">
                <div class="img-overlay">
                    <?=CHtml::link('Подробнее', array('products/view', 'id'=>$data->id, 'name'=>$data->url), array('class'=>'btn more btn-primary')); ?>
                    <?=CHtml::link('В корзину', '#', array('class'=>'btn buy btn-danger btn-cart', 'data-product-id'=>$data->id)); ?>
                </div>
            </div>
        </div>
        <div class="main-titles no-margin">
            <h4 class="title"><?=$data->price;?> Р.</h4>
            <?=CHtml::link($data->title, array('products/view', 'id'=>$data->id, 'name'=>$data->url)); ?>
        </div>
        <p class="center-align stars">
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>
            <span class="icon-star stars-clr"></span>
            <span class="icon-star"></span>
        </p>
    </div> 
</div> 