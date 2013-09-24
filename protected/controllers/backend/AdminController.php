<?php

class AdminController extends BackendController
{
	public $_model = 'admin';

	public function actionIndex()
	{
		Yii::app()->clientScript->registerScriptFile(
			'/resourses/backend/js/plugins/jquery/jquery-1.9.1.min.js',
			CClientScript::POS_HEAD
		);	
		
		$this->layout = 'backend.layouts.column2';
		
		$this->render('backend.admin.index',array(
			'model'=>$model,
		));
	}

	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}

		$this->renderPartial('backend.admin.login', array(
			'model' => $model,
			));
	}

	public function actionProfile()
	{
		$this->layout = 'backend.layouts.column2';

		$model = Users::model()->findByPk(Yii::app()->user->id);

		

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
			{
				Yii::app()->user->setFlash('success', 'Профиль успешно изменен');
				$this->redirect('/admin/profile');
			}
		}

		$model->unsetAttributes(array('password', 'confirmpassword'));

		$this->render('backend.'.strtolower($this->_model).'.profile',array(
			'model'=>$model,
		));
	}
}
