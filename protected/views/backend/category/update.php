<?php
$this->breadcrumbs=array( // array is label=>url
    'Категории'=>array('admin/category/'),
    $model->title,
);
?>
<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>