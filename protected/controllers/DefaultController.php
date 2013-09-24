<?php

class DefaultController extends FrontendController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}