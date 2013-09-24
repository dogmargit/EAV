<?php
$this->breadcrumbs=array(
    'Баннеры'=>array('admin/banners'),
    'Создание баннера',
);
?>
<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>