<?php

$this->title = $model->meta_title?$model->meta_title:$model->title;

$this->keywords = $model->meta_keywords;

$this->description = $model->meta_description;

$this->breadcrumbs=$model->get_parent($model->parent);
?>

<div class="underlined push-down-20">
    <div class="row">
        <div class="span6">
            <h3><?=$model->title;?></h3>
        </div>
    </div>
</div>
<?php $this->widget('zii.widgets.CListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'/products/item',
    'itemsCssClass' => 'row popup-products',
    'template'=>'{sorter} {items} {pager} <br />',
    'pager'=>array(
        'class'=>'CLinkPager',
        'header'=>false,
        'firstPageLabel' => '      <<', 
        'prevPageLabel' => '<',
        'nextPageLabel' => '>',
        'lastPageLabel' => '>>',
        'cssFile'=> false, 
        'htmlOptions'=>array('class'=>'pagination'),
    ),
    'sortableAttributes'=>array(
        'title'=>'Название',
        'price'=>'Цена',
        'id'=>'Актуальности',
    )
    )
); ?>
<hr>
<div class="pagination pagination-centered">
    <ul>
        <li><a href="#" class="btn btn-primary"><span class="icon-chevron-left"></span></a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#" class="btn btn-primary"><span class="icon-chevron-right"></span></a></li>
    </ul>
</div>