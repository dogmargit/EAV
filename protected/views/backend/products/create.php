<?php
$this->breadcrumbs=array(
    'Товары'=>array('admin/products'),
    'Создание товара',
);
?>
<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>