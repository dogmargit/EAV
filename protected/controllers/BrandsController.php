<?php

class BrandsController extends FrontendController
{
	public $_model = 'Brands';

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
}
