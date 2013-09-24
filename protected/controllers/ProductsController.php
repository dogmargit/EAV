<?php

class ProductsController extends FrontendController
{
	public $_model = 'Products';

	public function actionView($id)
	{
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function ActionAddToCart()
	{

		$color = $_POST['color_name']?$_POST['color_name']:'';

		$item = Products::model()->findByPk($_POST['id']);
		Yii::app()->shoppingCart->put($item,'1',$color); 
	}
}
