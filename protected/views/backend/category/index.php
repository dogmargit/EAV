<?php
$this->breadcrumbs=array(
    'Категории',
);
?>
<div class="widget">
    <div class="head dark">
        <div class="icon"><i class="icos-list"></i></div>
        <h2>Список категорий</h2>
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
                'name'=>'title',
                'htmlOptions'=>array('class'=>'center'),
                'headerHtmlOptions' => array('class'=>'center'),
            ),
            array(
                'name'=>'checked',
                'value'=>'$data->checked ? "Да" : "Нет"',
                'filter'=>array('0'=>'Нет','1'=>'Да'),
            ),
            array( 
                'class' => 'CButtonColumn',
                'htmlOptions' => array('style'=>'text-align: center; width:32px'),
                'template'=>'{btnDefault} {btnEdit} {delete}',
                'buttons' => array(
                    'btnDefault' => array(
                        'label' => '<span class="icon-eye-open tip" data-original-title="Открыть"></span>',
                        'url'   => 'array("category/view", "id" => $data -> id, "name" => $data -> url)',
                        'imageUrl'  => false,
                        'options' => array('onclick'=>'window.open($(this).attr("href")); return false;', 'title'=>''),
                    ),
                    'btnEdit' => array(
                        'label' => '<span class="icon-pencil tip" data-original-title="Изменить"></span>',
                        'url' => 'array("/admin/category/update/$data->id")',
                        'imageIcon' => false,
                        'options' => array('class'=>'', 'title'=>''),
                    ),
                    'delete' => array(
                        'label' => '<span class="icon-remove tip" data-original-title="Удалить"></span>',
                        'url' => 'array("/admin/category/delete/$data->id")',
                        'imageUrl' => false,
                        'options' => array('title'=>''),
                    ),
                ),
                'htmlOptions'=>array('class'=>'span2'),
                ),
            ),
        ));
        ?>        
    </div> 
</div>   