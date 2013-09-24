<?php

class PagesController extends FrontendController
{
	public $_model = 'Pages';

	public function actionView($name)
	{
		Pages::model()->tableSchema->primaryKey = 'url';
		
		if($form = $_POST)
		{
			$mail = new YiiMailer();
			$mail->setBody($form['comment']);
			$mail->setFrom($form['email'], $form['title']);
			$mail->setTo(Yii::app()->params['email']);
			$mail->setSubject('Сообщение с сайта № '.Yii::app()->params['site_title']);
			if($mail->send())
			{
				Yii::app()->user->setFlash('message','Спасибо, ваше сообщение отправлено.');
			}
		}
		$this->render('view',array(
			'model'=>$this->loadModel($name),
		));
	}
}
