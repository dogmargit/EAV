<?php

class SiteController extends FrontendController
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'+
				',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionCatalog()
	{
/*		$b = array('1', '2');
		foreach($b as $Item) {
			echo $this->actionIndex();
		}
		exit();*/
		$link ='http://www.divial.ru/'; 
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,'http://www.divial.ru/katalog/products/radionjani');
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		$out = curl_exec($curl);
		curl_close($curl);

		// Получаем название товара
		preg_match_all('#\<a href\=\"(.*)\"\>\<img src\=\"_mod_files/ce_images/eshop/buttonpodrobnee.jpg\"\>\<\/a\>#U', $out, $title);
		$title = $title['1'];

		foreach($title as $item)
		{
			echo $item;
			$this->actionIndex($link.$item);
		}

	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionProducts($link)
	{
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL, $link);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		$out = curl_exec($curl);
		curl_close($curl);

		// Получаем название товара
		preg_match('#\<h1 class\=\"oldh2\"\>(.*)\<\/h1\>#sU', $out, $title);
		$title = $title['1'];

		// Получаем цену товара
		preg_match('#\<span class\=\"price_details itemD_price\"\>(.*)\&nbsp\;руб\.\<\/span\>#sU', $out, $price);
		$price = str_replace(',', '', $price['1']);

		// Получаем картинку товара
		preg_match('#image: \'(.*)\'\,#sU', $out, $pic);
		$pic = $pic['1'];

		echo $title;
		echo "<br />";
		echo $price;
		echo "<br />";
		echo $pic;
		echo "<br />";
		return;
		exit();
	}
	
	public function actionIndex()
	{
	
		$this->layout = '/layouts/no_column';

		$banners = Banners::model()->checked()->findAll();

		$brands = Brands::model()->checked()->findAll();

		$recomended = Products::model()->recomended()->checked()->findAll();

		$new = Products::model()->new()->checked()->findAll();

		$news = News::model()->checked()->findAll();

		$this->render('index', array(
			'banners'=>$banners,
			'recomended'=>$recomended,
			'brands'=>$brands,
			'new'=>$new,
			'news'=>$news,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
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
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}