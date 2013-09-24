<?php
$this->breadcrumbs=array(
    'Пользователи'=>array('admin/users'),
    'Создание пользователя',
);
?>
<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>