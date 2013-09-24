<?php
$this->breadcrumbs=array( // array is label=>url
    'Баннеры'=>array('admin/banners/'),
    $model->title,
);
?>
<?php echo $this->renderPartial('backend.'.strtolower($this->_model).'._form', array('model'=>$model)); ?>