<?php
$this->breadcrumbs=array(
    'Регистрация',
);
?>
<div id="content">
    <div class="block-white">
        <div class="block-content">
            <h1>Регистрация аккаунта</h1>
        </div>
        <div class="separator"></div>
        <div class="block-content">
            <p>Если вы зарегистрированны то воспользуйтесь <a href="/login">страницей входа</a>.</p>
                        <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'registration-form',
                        'enableClientValidation'=>true,
                        'htmlOptions'=>array(
                            'class'=>'std',
                            'id'=>'registration_form',
                        ),
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                        ),
                    )); ?>
                <h2>Ваши личные данные</h2>
                <div class="content">
                    <table class="form">
                        <tbody>
                            <tr>
                                <td><span class="required">*</span> <?php echo $form->label($model,'email'); ?>:</td>
                                <td><?php echo $form->textField($model,'email'); ?></td> <td> <?php echo $form->error($model,'email'); ?></td>
                            </tr>
                            <tr>
                                <td><span class="required">*</span> <?php echo $form->label($model,'username'); ?></td>
                                <td><?php echo $form->textField($model,'username'); ?></td> <td><?php echo $form->error($model,'username'); ?></td>
                            </tr>
                            <tr>
                                <td><span class="required">*</span> <?php echo $form->label($model,'password'); ?></td>
                                <td><?php echo $form->passwordField($model,'password'); ?></td> <td> <?php echo $form->error($model,'password'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="buttons">
                    <input type="submit"name="SubmitLogin" class="button" value="Отправить">
                </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>