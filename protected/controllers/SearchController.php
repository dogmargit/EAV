<?php

class SearchController extends FrontendController
{
	public $search;

	public function actionIndex()
	{
		if($_GET)
		{
	        $DataProvider = new CActiveDataProvider('Products', array(
	           'criteria'=>array(
	               'condition' => "checked = 1 AND title LIKE '%".$_GET['s']."%'",
	           ),
	            'pagination'=>array('pageSize'=>15),
	        ));
		}

		$this->render('index', array(
			'dataProvider' => $DataProvider,
			));
	}
}