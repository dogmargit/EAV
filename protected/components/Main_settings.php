<?php

class Main_settings
{
	public function init()
	{
		$settings = CHtml::listData(Settings::model()->cache('50000')->findAll(),'key', 'value');

		Yii::app()->params = $settings;
	}
}