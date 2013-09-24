<?php
$this->breadcrumbs=array(
    'Товары'=>array('admin/products'),
    $model->title,
);
?>
<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>