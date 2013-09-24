<?php

class SettingsController extends BackendController
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
			Yii::app()->user->setFlash('success', 'Настройки успешно изменены');
		}

		$model=Settings::model()->findAll();

		$this->render('backend.settings.update',array(
			'model'=>$model,
		));
	}
}
