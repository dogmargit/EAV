<div id="content">
	<div class="block-content">
		<h1><?=$model->title;?></h1>
	</div>
	<?php $this->widget('zii.widgets.CListView',array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'/products/item',
			'itemsCssClass' => 'product-grid',
			'template'=>'{sorter} {items} {pager} <br />',
			'pager'=>array(
				'class'=>'CLinkPager',
				'header'=>false,
				'firstPageLabel' => '      <<', 
				'prevPageLabel' => '<',
				'nextPageLabel' => '>',
				'lastPageLabel' => '>>',
				'cssFile'=> false, // устанавливаем свой .css файл
				'htmlOptions'=>array('class'=>'pagination'),
			),
			'sortableAttributes'=>array(
				'title'=>'Название',
				'price'=>'Цена',
				'id'=>'Актуальности',
			)
		)
	); ?>
	<div class="clearfix"></div>
	<div class="pagination"><div><div class="results">Showing 1 to 5 of 5 (1 Pages)</div><div class="clearfix"></div></div></div>
</div>
<script type="text/javascript"><!--
function display(view) {
	if (view == 'list') {
		$('.product-grid').attr('class', 'product-list');
		$('.display').html('<b>Display:</b> <div class="combo-button"><a class="first"><div class="icon icon-a-list"></div></a><a class="last" onclick="display(\'grid\');"><div class="icon icon-grid"></div></a></div>');
		$.cookie('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		$('.display').html('<b>Display:</b> <div class="combo-button"><a class="first" onclick="display(\'list\');"><div class="icon icon-list"></div></a><a class="last"><div class="icon icon-a-grid"></div></a></div>');	
		$.cookie('display', 'grid');
	}
}
view = $.cookie('display');
if (view) {
	display(view);
} else {
	display('grid');
}
//--></script> 
<div class="clearfix"></div> 
