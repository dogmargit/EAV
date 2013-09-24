<?php
$this->breadcrumbs=array(
    'Статичные страницы'=>array('admin/pages'),
    $model->title,
);
?>
<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>