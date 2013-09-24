<?php

class FrontendController extends Controller
{
	public $title;

	public $keywords;

	public $description;

	public function init()
	{
		Yii::app()->getClientScript()->registerCoreScript('jquery');
	}

	public function loadModel($id)
	{	
		$this->layout = '/layouts/column1';

		$model = $this->_model;
		$models=$model::model()->findByPk($id);

		if($models===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $models;
	}
}