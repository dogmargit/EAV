<?php

class ProductsController extends BackendController
{
	public $_model = 'Products';

	public function actionUpdate($id)
	{
		$this->layout = 'backend.layouts.column2';
		
		$model=$this->loadModel($id);
 		
		$related = ProductsRelated::model()->findAllByAttributes(array('products_id'=>$model->id));

		foreach($model->related as $item)
			$related_select[$item['link_id']] = array('selected'=>'selected');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Products']))
		{
			$model->attributes=$_POST['Products'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', 'Модель успешно изменена');
				$this->redirect(array('update','id'=>$model->id));
			}
				
		}

		$this->render('backend.products.update',array(
			'model'=>$model,
			'related_select'=>$related_select,
		));
	}

    /**
     * Метод выводит список модели
     */
	public function actionIndex()
	{
		$this->layout = 'backend.layouts.column2';
		$pinc = new ProductsInCategories('search');

        $pinc->unsetAttributes();

        if (isset($_GET['ProductsInCategories'])) {
            $pinc->attributes = $_GET['ProductsInCategories'];
        }

        $searchPinc = $pinc;

		$model=new $this->_model('search');
		$model->unsetAttributes();  
		if(isset($_GET[$this->_model]))
			$model->attributes=$_GET[$this->_model];

		$this->render('backend.'.strtolower($this->_model).'.index',array(
			'model'=>$model,
			'searchPinc'=>$searchPinc,
		));
	}
}
