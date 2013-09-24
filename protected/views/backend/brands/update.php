<?php
$this->breadcrumbs=array(
    'Бренды'=>array('admin/brands'),
    $model->title,
);
?>
<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>