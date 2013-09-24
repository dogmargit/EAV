<?php $this->beginContent('/layouts/main'); ?>
<div id="column-left">
    <div class="block-white">
        <div class="block-content">
            <h1>Профиль</h1>
        </div>
        <div class="separator"></div>
        <div class="block-content">
        <?php
        $this->widget('zii.widgets.CMenu', array(
                'htmlOptions'=>array('class'=>'list;'),
                'activeCssClass'=>false,
                'items'=>array(
                    array('label'=>'Вход', 'url'=>array('/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'Регистрация', 'url'=>array('/registration'),'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'Восстановление пароля', 'url'=>array('/forgotten'),'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'Мой профиль', 'url'=>array('/profile'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'Корзина', 'url'=>array('/cart')),
                    array('label'=>'Выход', 'url'=>array('/logout'),'visible'=>!Yii::app()->user->isGuest),
                ),
            )
        );
        ?>
         </div>
    </div>
</div>
<?=$content;?>
<?php $this->endContent(); ?>

