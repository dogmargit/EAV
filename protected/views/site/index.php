    <?php if($banners):?>
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <ul>
                <?php foreach($banners as $item): ?>
                <li data-transition="premium-random" data-slotamount="3">
                    <img src="/images/<?=$item['pic'];?>" alt="slider img" width="1400" height="377" />
                    <?php if($item->objects): ?>
                    <?php foreach($item->objects as $items): ?>
                    <?php if($items['link']):?>
                    <a href="features.html" class="caption lfl btn <?=$items['btn'];?> btn_theme"
                    <?php else: ?>
                    <div class="caption <?=$items['class'];?>"
                    <?php endif;?>
                        data-x="<?=$items['data_x'];?>" 
                        data-y="<?=$items['data_y'];?>"
                        data-speed="<?=$items['data_speed'];?>" 
                        data-start="<?=$items['data_start'];?>" 
                        data-easing="<?=$items['data_easing'];?>">
                        <?php if($items['class'] == 'lft ltt' or $items['class'] == 'lfl str'): ?>
                        <img src="/images/<?=$items['pic'];?>"  />
                        <?php else: ?>
                        <?=$items['text'];?>
                        <?php endif;?>
                    <?php if($items['link']):?>
                    </a>
                    <?php else: ?>
                    </div>
                    <?php endif;?>
                    <?php endforeach;?>
                    <?php endif;?>
                </li>
                <?php endforeach;?>
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
        <div id="sliderRevLeft"><i class="icon-chevron-left"></i></div>
        <div id="sliderRevRight"><i class="icon-chevron-right"></i></div>
    </div>
    <?php endif;?>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="push-up over-slider blocks-spacer">
                    <div class="row">
                        <div class="span4">
                            <a href="#" class="btn btn-block banner">
                                <span class="title"><span class="light">Летние</span> скидки</span>
                                <em>Скидки на 60%</em>
                            </a>
                        </div>
                        <div class="span4">
                            <a href="#" class="btn btn-block colored banner">
                                <span class="title"><span class="light">Быстрые</span> Покупки</span>
                                <em>Заказывай и получай</em>
                            </a>
                        </div>
                        <div class="span4">
                            <a href="#" class="btn btn-block banner">
                                <span class="title"><span class="light">Новинки</span> Товаров</span>
                                <em>Проверяй новинки товаров</em>
                            </a>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="row featured-items blocks-spacer">
            <div class="span12">
                <div class="main-titles lined">
                    <h2 class="title"><span class="light">Рекомендуемые</span> Товары</h2>
                    <div class="arrows">
                        <a href="#" class="icon-chevron-left" id="featuredItemsLeft"></a>
                        <a href="#" class="icon-chevron-right" id="featuredItemsRight"></a>
                    </div>
                </div>
            </div>
            <div class="span12">
                <div class="carouFredSel" data-autoplay="false" data-nav="featuredItems">
                        <?php 
                        $i='1'; 
                        foreach($recomended as $item) 
                        {
                            $inf = '9999';
                            if(($i % 5) == 0 or $i=='1') echo '<div class="slide"><div class="row">';  
                            $this->renderPartial('/products/recomendedItem', array('data'=>$item, 'i'=>$i)); 
                            if(($i % 4) == 0) echo '</div></div>'; 
                            $i++;
                        }
                        if(($i % 4) != 1) echo '</div></div>'; 
                        ?>
                </div> 
            </div>
        </div>
    </div>
    <div class="boxed-area blocks-spacer">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="main-titles lined">
                        <h2 class="title"><span class="light">Новинки</span> Интернет магазина</h2>
                    </div>
                </div>
            </div>
            <div class="row popup-products blocks-spacer">
                <?php 
                foreach($new as $item) 
                {
                    $this->renderPartial('/products/recomendedItem', array('data'=>$item, 'i'=>$i)); 
                }
                ?>
            </div>
        </div>
    </div>
    <div class="most-popular blocks-spacer">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="main-titles lined">
                        <h2 class="title"><span class="light">Наиболее</span> популярные товары</h2>
                    </div>
                </div>
            </div>
            <div class="row popup-products">
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="/resourses/frontend/images/dummy/most-popular-products/popular-1.jpg" alt="" width="540" height="412" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">More</a>
                                    <a href="#" class="btn buy btn-danger">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">Horsefeathers 336</h5>
                        </div>
                        <p class="desc">59% Cotton Lorem Ipsum Dolor Sit Amet esed ultrices sapien nunc nam frignila</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                             
                        </p>
                    </div>
                </div>
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="/resourses/frontend/images/dummy/most-popular-products/popular-2.jpg" alt="" width="540" height="412" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">More</a>
                                    <a href="#" class="btn buy btn-danger">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">Horsefeathers 363</h5>
                        </div>
                        <p class="desc">59% Cotton Lorem Ipsum Dolor Sit Amet esed ultrices sapien nunc nam frignila</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                             
                        </p>
                    </div>
                </div> 
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="/resourses/frontend/images/dummy/most-popular-products/popular-3.jpg" alt="" width="540" height="412" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">More</a>
                                    <a href="#" class="btn buy btn-danger">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">Horsefeathers 382</h5>
                        </div>
                        <p class="desc">59% Cotton Lorem Ipsum Dolor Sit Amet esed ultrices sapien nunc nam frignila</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                             
                        </p>
                    </div>
                </div>
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="/resourses/frontend/images/dummy/most-popular-products/popular-4.jpg" alt="" width="540" height="412" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">More</a>
                                    <a href="#" class="btn buy btn-danger">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">Horsefeathers 208</h5>
                        </div>
                        <p class="desc">59% Cotton Lorem Ipsum Dolor Sit Amet esed ultrices sapien nunc nam frignila</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                             
                        </p>
                    </div>
                </div> 
               </div>
        </div>
    </div>
    <div class="darker-stripe blocks-spacer more-space latest-news with-shadows">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="main-titles center-align">
                        <h2 class="title">
                            <span class="clickable icon-chevron-left" id="tweetsLeft"></span> &nbsp;&nbsp;&nbsp;
                            <span class="light">Последние </span> Новости &nbsp;&nbsp;&nbsp;
                            <span class="clickable icon-chevron-right" id="tweetsRight"></span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <div class="carouFredSel" data-nav="tweets" data-autoplay="false">
                        <?php $i = '0'; 
                        foreach($news as $item) 
                        { 
                            if(($i%'2') == 0 or $i == '0') 
                            {
                                echo '<div class="slide" style="width: 1170px; margin-right: 0px;"><div class="row">';
                            }
                            $this->renderPartial('/news/item', array('data'=>$item, 'i'=>$i)); 

                            if((($i+1)%'2') == 0) 
                            {
                                echo '</div></div>';
                            }
                            $i++; 
                        } 
                        if((($i+1)%'2') == 0) 
                        {
                            echo '</div></div>';
                        } ?>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="container blocks-spacer-last">
        <div class="row">
            <div class="span12">
                <div class="main-titles lined">
                    <h2 class="title">Производители</h2>
                    <div class="arrows">
                        <a href="#" class="icon-chevron-left" id="brandsLeft"></a>
                        <a href="#" class="icon-chevron-right" id="brandsRight"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <div class="brands carouFredSel" data-nav="brands" data-autoplay="true">
                    <img src="/resourses/frontend/images/dummy/brands/brands_01.jpg" alt="" width="386" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_02.jpg" alt="" width="203" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_03.jpg" alt="" width="242" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_04.jpg" alt="" width="175" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_05.jpg" alt="" width="196" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_06.jpg" alt="" width="175" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_02.jpg" alt="" width="203" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_04.jpg" alt="" width="175" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_06.jpg" alt="" width="175" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_01.jpg" alt="" width="386" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_03.jpg" alt="" width="242" height="104" />
                    <img src="/resourses/frontend/images/dummy/brands/brands_05.jpg" alt="" width="196" height="104" />
                </div>
            </div>
        </div> 
    </div> 