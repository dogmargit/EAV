<?php

/**
 * Base class for all admin controllers.
 */

class BackendController extends Controller
{
	public $tpl = '<div class="alert alert-%s"><strong>%s</strong> %s </div>';

	public $error = 'Ошибка';

	public $success = 'Ура';

    /**
     * @return array Возвращает конфигурацию фильтров, которые должны применяться к действиям.
     */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('delete', 'create', 'edit', 'update', 'admin', 'index', 'profile'),
                'roles'=>array('administrator'),
            ),
            array('deny',
                'actions'=>array('delete', 'create', 'edit', 'update', 'admin', 'index', 'profile'),
            ),
        );
    }

    public function init()
    {	
    	Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');
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
			{
				Yii::app()->user->setFlash('success', 'Модель успешно создана');
				$this->redirect(array('update','id'=>$model->id));
			}
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
			{
				Yii::app()->user->setFlash('success', 'Модель успешно изменена');
				$this->redirect(array('update','id'=>$model->id));
			}		
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
	public function actionIndex()
	{
		$this->layout = 'backend.layouts.column2';

		$model=new $this->_model('search');
		$model->unsetAttributes();  
		if(isset($_GET[$this->_model]))
			$model->attributes=$_GET[$this->_model];

		$this->render('backend.'.strtolower($this->_model).'.index',array(
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
