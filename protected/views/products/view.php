<?php

$this->title = $model->meta_title?$model->meta_title:$model->title;

$this->keywords = $model->meta_keywords;

$this->description = $model->meta_description;

// А вот и гавнокодец
if($b = $model->categoryList)
{
		$parent = array();
		foreach($b as $item)
		{
			if($item)
				$array[$item->title] = array('/category/view', 'id'=>$item->id, 'name'=>$item->url, 'parent_id'=>$item->parent_id);
		}
		foreach ($array as $key => $value) {
			if($array[$key]['parent_id'] == '0')
			{
				$parent[$key] = $array[$key]; unset($array[$key]);
			}
			break;
		}
		$array = array_merge($parent, $array);
}

$array[] = $model->title;

$this->breadcrumbs=$array;
?>

<div class="row blocks-spacer">
    <div class="span5">
        <div class="product-preview">
            <div class="picture">
                <a class="fancybox" href="/images/<?=$model->pic;?>" data-fancybox-group="gallery" title="<?=$model->title;?>"><img src="/images/<?=$model->pic;?>" alt="" /></a>
            </div>
<!--             <div class="thumbs clearfix">
                <div class="thumb active">
                    <a href="#mainPreviewImg"><img src="images/dummy/products/shirt-1.jpg" alt="" width="940" height="940"></a>
                </div>
                <div class="thumb">
                    <a href="#mainPreviewImg"><img src="images/dummy/products/shirt-2.jpg" alt="" width="940" height="940"></a>
                </div>
                <div class="thumb">
                    <a href="#mainPreviewImg"><img src="images/dummy/products/shirt-3.jpg" alt="" width="940" height="940"></a>
                </div>
            </div> -->
        </div>
    </div>
    <div class="span7">
        <div class="product-title">
            <h1 class="name"><span class="light"><?=$model->title;?></span></h1>
            <div class="meta">
                <span class="tag"><?=$model->price;?> Р.</span>
<!--            <span class="stock">
                    <span class="btn btn-success">In Stock</span> 
                    <span class="btn btn-danger">Out of Stock</span>
                    <span class="btn btn-warning">Ask for availability</span>
                </span> -->
            </div>
        </div>
        <div class="product-description">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dolor tellus, tempor ut ultrices ferme ntum, aliquam consequat metus. In vel turpis dolorin dapibus dui. Aenean at auctor neque. Lorem ipsum dolor sit , consectetur elit. Fusce dolor tellus, tempor ut ultrices fermentum, aliquam consequat metus. In vel turpis dolor, in dapibus dui. Aenean at auctor neque.</p>
            <hr>
            <form action="#" class="form form-inline clearfix">
                <div class="numbered">
                  <input type="text" name="num" value="1" id="productQuanity" class="tiny-size">
                  <span class="clickable add-one icon-plus-sign-alt"></span>
                  <span class="clickable remove-one icon-minus-sign-alt"></span>
                </div>
                <a class="btn btn-danger btn-cart" data-product-id="<?=$model->id;?>"><i class="icon-shopping-cart"></i> &nbsp; Положить в корзину</a>
            </form>
            <hr>
            <div class="share-item">
                Еще предложения:
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="span12">
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#colorsAndPrice" data-toggle="tab">Цены и цвета</a></li>
            <li><a href="#tab-1" data-toggle="tab">Описание</a></li>
            <li><a href="#tab-2" data-toggle="tab">Характеристики</a></li>
            <li><a href="#tab-3" data-toggle="tab">Отзывы</a></li>
        </ul>
        <div class="tab-content">
            <div class="fade in tab-pane active" id="colorsAndPrice">
                <?php if($model->pics): ?>
                <p>
                    <table class="table table-striped">
                           <thead>
                               <tr>
                                <th>Цвет</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Купить</th>
                               </tr>
                           </thead>
                           <tbody>
                            <?php foreach($model->pics as $item): ?>
                               <tr>
                                   <td><a class="fancybox" href="/images/<?=$item->pic;?>" data-fancybox-group="gallery" title="<?=$item->title;?>"><img src="/images/thumbs_160/<?=$item->pic;?>" alt="<?=$item->title;?>" width="60px" /></a></td>
                                   <td><?=$item['title'];?></td>
                                   <td><?=$item['price'];?></td>
                                   <td><a class="btn btn-danger btn-cart" data-product-id="<?=$model->id;?>" data-color-id="<?=$item->id;?>"><i class="icon-shopping-cart"></i> &nbsp; Положить в корзину</a></td>
                               </tr>
                            <?php endforeach; ?>
                           </tbody>
                       </table>     
                        </p>  
                <?php endif; ?> 
            </div>
            <div class="fade  tab-pane" id="tab-1">
                <?=$model->description;?>
            </div>
            <div class="fade tab-pane" id="tab-2">
                <p>
                    характеристики
                </p>
            </div>
            <div class="fade tab-pane" id="tab-3">
                <p>
                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.
                </p>
            </div>
        </div>
    </div>
</div>