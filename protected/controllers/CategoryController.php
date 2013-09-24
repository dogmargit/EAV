<?php

class CategoryController extends FrontendController
{
	public $_model = 'Category';

	public function actionView($id)
	{

		$products = New Products;
		$products->categoryId = $id;
		$dataProvider = $products->get_dataProvider();

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'dataProvider'=>$dataProvider,
		));
	}
}
