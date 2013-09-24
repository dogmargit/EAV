<?php
$this->breadcrumbs=array(
	'Страницы'=>array('pages'),
	$model->title,
);
if($flash = Yii::app()->user->getFlashes())
    echo '<div class="alert in fade"><button type="button" class="close" data-dismiss="alert">×</button>'.$flash['message'].'</div>';
?>

<div class="row">
<div class="span12">
    <div class="title-area">
        <h1 class="inline"><span class="light"><?=$model->title;?></span></h1>
    </div>
</div>
<section class="span8 single single-page">
    <?php if($model->url == 'kontakti'): ?>
    <article class="post">
        <div class="post-inner">
            <p>Пишите и мы вам ответим.</p>
        </div>
    </article>
    <hr>
    <section class="contact-form-container">
        <h3 class="push-down-25"><span class="light">Ваше</span> сообщение</h3>
        <form id="commentform" method="post" action="#" class="form form-inline form-contact">
            <p class="push-down-20">
                <input type="text" aria-required="true" tabindex="1" size="30" value="" id="author" name="author" required="">
                <label for="author">Имя<span class="red-clr bold">*</span></label>
            </p>
            <p class="push-down-20">
                <input type="email" aria-required="true" tabindex="2" size="30" value="" id="email" name="email" required="">
                <label for="email">Электронный адрес<span class="red-clr bold">*</span></label>
            </p>
            <p class="push-down-20">
                <textarea class="input-block-level" tabindex="4" rows="7" cols="70" id="comment" name="comment" required=""></textarea>
            </p>
            <p>
                <button class="btn btn-primary bold" type="submit" tabindex="5" id="submit">Отправить письмо</button>
            </p>
        </form>
    </section>
    <hr>
    <?php else: ?>
    <p><?=$model->description;?></p>
    <?php endif; ?>
</section>
</div>
