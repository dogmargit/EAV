<?php
$this->breadcrumbs=array(
    'Категории'=>array('admin/category'),
    'Создание категории',
);
?>

<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>