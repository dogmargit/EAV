<?php

class FunctionsController extends BackendController
{
	public $_model = "Functions";

	public function init()
	{
		Yii::app()->clientScript->registerScriptFile(
			'/resourses/backend/js/plugins/jquery/jquery-1.9.1.min.js',
			CClientScript::POS_HEAD
		);	
	}

	public function actionIndex()
	{
		$this->layout = 'backend.layouts.column2';

		$this->render('backend.functions.index');
	}

	public function actionDivial()
	{
		if($_POST)
		{
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
				$this->actionProductsDivial($link.$item);
			}
		} 
		
	}

	public function actionProductsDivial($link)
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
}
