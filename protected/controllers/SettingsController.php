<?php

class SettingsController extends FrontendController
{

	public $_model = 'Settings';

	public function actionUpdate()
	{
		$this->layout = 'backend.layouts.column2';

		if(isset($_POST['Settings']))
		{
			foreach($_POST['Settings'] as $item)
			{
				$update=Settings::model()->findByPk($item['id']);

				$update->attributes=$_POST['Settings'][$item['id']];
				$update->save(false);
			}
		}

		$model=Settings::model()->findAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$this->render('backend.settings.update',array(
			'model'=>$model,
		));
	}
}
