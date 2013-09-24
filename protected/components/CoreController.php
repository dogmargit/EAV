<?php

/**
 * Base class for all admin controllers.
 */

class CoreController extends Controller
{
    /**
     * @var string название модели
     */
	public $_model;

    /**
     * @return array Возвращает конфигурацию фильтров, которые должны применяться к действиям.
     */
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    /**
     * Устанавливает правила управления доступом.
     * Этот метод используется фильтром 'accessControl'.
     * @return array правила управления доступом
     */
    public function accessRules()
    {
		return array(
		    array('deny',
		        'actions'=>array('delete', 'admin', 'update'),
		        'expression'=>"\$user->isGuest",
		    ),
		);
	}

    /**
     * Метод создания модели
     * @return если успешно то переадресовывает на изменение модели
     */
	public function actionCreate()
	{
		$this->layout = 'backend.layouts.column2';

		$model=new $this->_model;

		if(isset($_POST[$this->_model]))
		{
			$model->attributes=$_POST[$this->_model];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('backend.'.strtolower($this->_model).'.create',array(
			'model'=>$model,
		));
	}

    /**
     * Метод изменения модели
     * если успешно то переадресовывает обратно
     */
	public function actionUpdate($id)
	{
		$this->layout = 'backend.layouts.column2';

		$model=$this->loadModel($id);

		if(isset($_POST[$this->_model]))
		{
			$model->attributes=$_POST[$this->_model];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('backend.'.strtolower($this->_model).'.update',array(
			'model'=>$model,
		));
	}

    /**
     * Метод удаления модели
     * если успешно то переадресовывает на изменение модели
     */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

    /**
     * Метод выводит список модели
     */
	public function actionAdmin()
	{
		$this->layout = 'backend.layouts.column2';
		
		$model=new $this->_model('search');
		$model->unsetAttributes();  
		if(isset($_GET[$this->_model]))
			$model->attributes=$_GET[$this->_model];

		$this->render('backend.'.strtolower($this->_model).'.admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{	
		$model = $this->_model;
		$models=$model::model()->findByPk($id);

		if($models===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $models;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']===$this->_model.'-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

?>
