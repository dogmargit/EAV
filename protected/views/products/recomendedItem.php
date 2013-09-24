<div class="span3">
    <div class="product">
        <div class="product-img">
            <div class="picture">
                <img src="/images/thumbs_160/<?=$data->pic;?>" alt="<?=$data->title;?>" title="<?=$data->title;?>" width="518" height="358" />
                <div class="img-overlay">
                    <?=CHtml::link('Подробнее', array('products/view', 'id'=>$data->id, 'name'=>$data->url), array('class'=>'btn more btn-primary')); ?>
                    <a class="btn buy btn-danger" href="#">В корзину</a>
                </div>
            </div>
        </div>
        <div class="main-titles no-margin">
            <h4 class="title"><?=$data->price;?> Р.</h4>
            <?=CHtml::link($data->title, array('products/view', 'id'=>$data->id, 'name'=>$data->url)); ?>
        </div>
    </div>
  </div>