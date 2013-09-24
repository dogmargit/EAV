<?php
$this->breadcrumbs=array(
    'Новости'=>array('admin/news'),
    'Создание новости',
);
?>
<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>