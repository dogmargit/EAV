<?php
$this->breadcrumbs=array(
    'Восстановиление пароля',
);
?>
<div id="content">
    <div class="block-white">
        <div class="block-content">
            <h1>Восстановить пароль?</h1>
        </div>
        <div class="separator"></div>
        <div class="block-content">
                    <?php
                    $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'forgottent-form',
                        'enableClientValidation'=>true,
                        'htmlOptions'=>array(
                            'class'=>'std',
                            'id'=>'forgottent_form',
                        ),
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                    )); ?>
            <p>Введите адрес электронной почты, связанный с вашей учетной зписью. К вам придет письмо с дальнейшей инструкцией.</p>
            <?php echo $form->error($model,'email'); ?>
            <div class="content">
                <table class="form">
                <tbody><tr>
                    <td><?php echo $form->label($model,'email'); ?>:</td>
                    <td><?php echo $form->textField($model,'email'); ?></td>
                </tr>
                </tbody></table>
            </div>
            <div class="buttons">
                <input type="submit" id="SubmitLogin" name="SubmitLogin" class="button" value="Восстановить">
            </div>
            <?php $this->endWidget(); ?>
		</div>
    </div>
</div>