<?php

class Upload {

	public function upload_file($model, $file, $field)
	{
		//die($file); exit();
		// Загрузка Картинки
		if($pic=CUploadedFile::getInstance($model, $field))
		{
			$type=array_pop(explode('.', $file));
			$name = md5(microtime('1')).'.'.$type;
			$pic->saveAs(Yii::app()->params['pic_path'].$name);

			//Загрузка миниатюр изображений
			$image = new EasyImage(Yii::app()->params['pic_path'].$name);
			$image->resize(Yii::app()->params['pic_small_size']);
			$image->save(Yii::app()->params['pic_small_path'].$name);

			return $name;
		}
	}

	public function upload_files($files, $i)
	{
		if(!count($files))
			return false;
		if(strlen($files['name'][$i])>'3')
		{ 
			$type=array_pop(explode('.',$files['name'][$i]));
			$image_name = md5(microtime('1')).'.'.$type;
    		move_uploaded_file($files['tmp_name'][$i], Yii::app()->params['pic_path'].$image_name);
			return $image_name;
		}
	}
}

?>