<?php
$this->breadcrumbs=array( // array is label=>url
'Заказы',
);
?>
<div class="widget">
    <div class="head dark">
        <div class="icon"><i class="icos-list"></i></div>
        <h2>Список заказов</h2>
        <ul class="buttons">
            <li><?=CHtml::link('<span class="icos-plus1"></span>', array('admin/'.strtolower($this->_model).'/create'), array('class'=>'tip', 'data-original-title'=>'Создать'));?></li>
        </ul>                      
    </div>                
    <div class="block-fluid">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=>$model->search(),
            'ajaxUpdate'=>true,
            'itemsCssClass'=>'table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs',
            'ajaxUpdate'=>true,
            'filter'=>$model,  
            'pager'=>array(
                'firstPageLabel'=>'<<',
                'prevPageLabel'=>'<',
                'nextPageLabel'=>'>',
                'lastPageLabel'=>'>>',
                'maxButtonCount'=>'10',
                'hiddenPageCssClass'=>'disabled',
                'selectedPageCssClass'=>'active',
                'header'=>'',
                'cssFile'=>false,
                'htmlOptions'=>array('class'=>''),
            ), 
            'pagerCssClass' => 'pagination pagination-small pull-right zero',
            'template'=>'{pager} {items} <div class="separator top form-inline small"> {pager} </div>',
            'columns'=>array(
                array(
                    'name'=>'id',
                    'htmlOptions'=>array('class'=>'center'),
                    'headerHtmlOptions' => array('class'=>'center span1'),
                ),
                array(
                    'name'=>'user_email',
                    'htmlOptions'=>array('class'=>'center'),
                    'headerHtmlOptions' => array('class'=>'center'),
                ),
                array(
                    'name'=>'status_id',
                    'value'  => '$data->status_id ? CHtml::encode($data->status->title) : ""',
                    'filter' => CHtml::listData(OrdersStatus::model()->findAll(), 'id', 'title'),
                ),
                array( 
                    'class' => 'CButtonColumn',
                    'htmlOptions' => array('style'=>'text-align: center; width:32px'),
                    'template'=>'{btnEdit} {delete}',
                    'buttons' => array(
                        'btnEdit' => array(
                            'label' => '<span class="icon-pencil tip" data-original-title="Открыть"></span>',
                            'url' => 'array("/admin/orders/update/$data->id")',
                            'imageIcon' => false,
                            'options' => array('class'=>'', 'title'=>''),
                        ),
                        'delete' => array(
                            'label' => '<span class="icon-remove tip" data-original-title="Удалить"></span>',
                            'url' => 'array("/admin/orders/delete/$data->id")',
                            'imageUrl' => false,
                            'options' => array('title'=>'Удалить'),
                        ),
                    ),
                    'htmlOptions'=>array('class'=>'span2'),
                ),
            ),
        ));
        ?>        
    </div> 
</div>   