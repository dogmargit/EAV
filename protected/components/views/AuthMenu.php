<div class="register">
  	<?php if (Yii::app()->user->isGuest) 
  	{
		echo CHtml::link('Вход', array('#loginModal'), array('data-toggle'=>'modal', 'role'=>'button'));
		echo " или ";
		echo CHtml::link('Регистрация', array('#registerModal'), array('data-toggle'=>'modal', 'role'=>'button'));
	}
	elseif (Yii::app()->user->checkAccess('administrator')) 
	{
		echo CHtml::link('Панель управления', array('/admin'));
	} 
	if (isset(Yii::app()->user->role))
	{	
		echo " ";
		echo CHtml::link('Выход', array('/logout'));
	} ?>
</div>