<?php $this->beginContent('backend.layouts.main'); ?>
    <div class="navigation">
        <ul class="main">
            <li><a href="/admin" <?php if($this->_model == 'admin') { echo 'class="active"';} ?>><span class="icom-screen"></span><span class="text">Главная</span></a></li>
            <li><a href="#shop" <?php if($this->_model=='Category' or $this->_model=='Products' or $this->_model=='Brands' or $this->_model=='Orders') { echo "class='active'"; } ?>><span class="icom-pencil3"></span><span class="text">Магазин</span></a></li>
            <li><a href="#blog" <?php if($this->_model=='Pages' or $this->_model=='Users' or $this->_model=='News' or $this->_model=='Banners') { echo "class='active'"; } ?>><span class="icom-clipboard1"></span><span class="text">Блог</span></a></li>
            <li><a href="#functions" <?php if($this->_model=='Functions') { echo "class='active'"; } ?> ><span class="icom-clipboard1"></span><span class="text">Функции</span></a></li>
            <li><a href="/admin/settings/update" <?php if($this->_model=='Settings') { echo "class='active'"; } ?> ><span class="icom-clipboard1"></span><span class="text">Настройки</span></a></li>
        </ul>
        <div class="control"></div>        
        <div class="submain">                                 
            <div id="shop">
                <div class="menu">
                    <a href="/admin/category/"><span class="icon-align-justify"></span> Категории</a>
                    <a href="/admin/products/"><span class="icon-ok-sign"></span> Товары</a>
                    <a href="/admin/brands/"><span class="icon-share"></span> Бренды</a>  
                    <a href="/admin/orders/"><span class="icon-th"></span> Заказы</a>
                </div>                                                
                <div class="dr"><span></span></div>
            </div> 
            <div id="default" <?php if($this->_model == 'admin') { echo 'style="display:block;"';} ?>>
                <div class="widget-fluid userInfo clearfix">
                    <div class="image">
                        <img src="/resourses/backend/img/examples/users/dmitry.jpg" class="img-polaroid">
                    </div>              
                    <div class="name">Здравствуйте, <?=Yii::app()->user->username;?></div>
                    <ul class="menuList">
                        <li><a href="/admin/profile"><span class="icon-cog"></span> Профиль</a></li>
                        <li><a href="/logout"><span class="icon-share-alt"></span> Выход</a></li>                        
                    </ul>
                    <div class="text">
                        Ваш последний визит: 24.10.2012 в 19:55
                    </div>
                </div>
            </div>
            <div id="blog">  
                <div class="menu">
                    <a href="/admin/pages/"><span class="icon-align-justify"></span> Статичные страницы</a>
                    <a href="/admin/news/"><span class="icon-align-justify"></span> Новости</a>
                    <a href="/admin/banners/"><span class="icon-align-justify"></span> Баннеры</a>
                    <a href="/admin/users/"><span class="icon-align-justify"></span> Пользователи</a>
                </div> 
                <div class="dr"><span></span></div>
            </div>   
            <div id="functions">  
                <div class="menu">
                    <a href="/admin/functions/"><span class="icon-align-justify"></span> Массовое копирование</a>
                </div> 
                <div class="dr"><span></span></div>
            </div>                 
        </div>
    </div>
    <div class="breadCrumb clearfix">  
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'separator'=> false,
            'tagName'=>'ul', // will change the container to ul
            'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>', 
            'inactiveLinkTemplate'=>'<li>{label}</li>', 
            'homeLink'=>'<li><a href="/admin/"></a></li>'
        )); ?>
    <?php endif?>
    </div>
    <div class="content">
        <?php echo $content; ?>
    </div> 
<?php $this->endContent(); ?>