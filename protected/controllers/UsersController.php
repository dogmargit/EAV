<?php

class UsersController extends FrontendController
{
	public $_model = 'Users';

	public function actionLogin()
	{
		$this->layout = '//layouts/column1';

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
		// display the login form
		$this->render('login', array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionRegistration()
	{
		$this->layout = '//layouts/column3';

        // Создать модель и указать ей, что используется сценарий регистрации
        $user = new Registration();

        // Если пришли данные для сохранения
        if(isset($_POST['Registration']))
        {
            // Безопасное присваивание значений атрибутам
            $user->attributes = $_POST['Registration'];

            // Проверка данных
            if($user->validate())
            {
            	if(!Registration::model()->email_check($_POST['Registration']['email']))
            	{
            		// Присваеваем роль
            		$user->role = 'user';

	                // Сохранить полученные данные
	                // false нужен для того, чтобы не производить повторную проверку
	                $user->save(false);

	                // Перенаправить на список зарегестрированных пользователей
	                $this->redirect(array('login'));

            	} else {
            		 $user->addError('email','Данный email уже занят.');
            	}
            }
        }

		$this->render('registration', array('model'=>$user));
	}

	public function actionForgotten()
	{
		$this->layout = '//layouts/column3';

		$user = new Users();

        // Если пришли данные для сохранения
        if(isset($_POST['Users']))
        {
            // Безопасное присваивание значений атрибутам
            $user->attributes = $_POST['Users'];

            // Проверка данных
            if($user->validate())
            {
            	// Если нашли пользователя
            	if($user = Users::model()->FindByAttributes(array('email'=>$_POST['Users']['email'])))
            	{
            		// Генерируем пароль
            		$pwd = substr(md5(time()), 1, 8);

            		$user->password = $pwd;

            		$user->save(false);

            		// Высылаем на почту
	   				$mail = new YiiMailer('forgotten', array('model'=>$user));
					$mail->setFrom(Yii::app()->params['email'], Yii::app()->params['site_title']);
					$mail->setTo($user->email);
					$mail->setSubject('Восстоновление пароля');
					if($mail->send())
					{
						Yii::app()->request->redirect($this->createUrl('/login'));
					}

            	} else {

            		 $user->addError('email','Данный email не найден.');
            	}
            } 
        }
		
		$this->render('forgotten', array('model'=>$user));
	}
}
