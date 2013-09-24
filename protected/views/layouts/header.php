<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <title>Интернет магазин</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <link href='http://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,700,400italic,700italic&amp;subset=latin,latin-ext,greek' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/resourses/frontend/stylesheets/bootstrap.css">
    <link rel="stylesheet" href="/resourses/frontend/stylesheets/responsive.css">
    <link rel="stylesheet" href="/resourses/frontend/js/rs-plugin/css/settings.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/resourses/frontend/fancy/jquery.fancybox.css">
    <link rel="stylesheet" href="/resourses/frontend/js/jquery-ui-1.10.3/css/smoothness/jquery-ui-1.10.3.custom.min.css" type="text/css"/>
    <!--<link rel="stylesheet" href="/resourses/frontend/js/prettyphoto/css/prettyPhoto.css" type="text/css"/> -->
    <link rel="stylesheet" href="/resourses/frontend/stylesheets/oil-green.css">
 
    <script src="/resourses/frontend/js/modernizr.custom.56918.js"></script>    

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/resourses/frontend/images/apple-touch/144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/resourses/frontend/images/apple-touch/114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/resourses/frontend/images/apple-touch/72.png">
    <link rel="apple-touch-icon-precomposed" href="/resourses/frontend/images/apple-touch/57.png">
    <link rel="shortcut icon" href="/resourses/frontend/images/apple-touch/57.png">
  </head>
  <body>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <?=CHtml::link('<img src="/resourses/frontend/images/logo.png" alt="Webmarket Logo" width="48" height="48" /> <span class="pacifico">Магазин</span> <span class="tagline">+7 (495) 777-66-55 </span>', '/', array('class'=>'brand')); ?>
                </div>
                <div class="span5">
                    <div class="top-right">
                        <div class="icons">
                            <a href="#"><span class="zocial-vk"></span></a>
                            <a href="#"><span class="zocial-twitter"></span></a>
                        </div>
                        <?php $this->widget('AuthMenu'); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="navbar navbar-static-top" id="stickyNavbar">
      <div class="navbar-inner">
        <div class="container">
          <div class="row">
            <div class="span9">
               <?php $this->widget('CategoryMenu'); ?>
            </div>
            <div class="span3">
                <div class="cart-container<?php if(Yii::app()->cart->getItemsCount() == 0) { echo " dn"; } ?>" id="cartContainer">
                    <div class="cart">
                        <p class="items">Корзина <span class="dark-clr">(<span id="cart_qty"><?=Yii::app()->cart->getAllItemsCount();?></span>)</span></p>
                        <p class="dark-clr hidden-tablet"><span class="cart_price"><?=Yii::app()->cart->getAllTotalPrice();?></span> Р.</p>
                        <?=CHtml::link('<i class="icon-shopping-cart"></i>', array('/cart'), array('class'=>'btn btn-danger')); ?>
                    </div>
                    <div class="open-panel">
                        <div class="summary">
                            <div class="line">
                                <div class="row-fluid">
                                    <div class="span6">Доставка:</div>
                                    <div class="span6 align-right">300 Р</div>
                                </div>
                            </div>
                            <div class="line">
                                <div class="row-fluid">
                                    <div class="span6">Общая сумма:</div>
                                    <div class="span6 align-right size-16"><span class="cart_price"><?=(Yii::app()->cart->getAllTotalPrice()+'300');?></span> Р</div>
                                </div>
                            </div>
                        </div>
                        <div class="proceed">
                            <?=CHtml::link('Оформить <i class="icon-shopping-cart"></i>', array('/cart/checkout'), array('class'=>'btn btn-danger pull-right bold higher')); ?>
                            <small>Правила доставки можно прочесть <a href="#">здесь</a></small>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>