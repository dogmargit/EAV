<?php
$this->breadcrumbs=array(
    'Пользователи'=>array('admin/users'),
    $model->username,
);
?>
<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>