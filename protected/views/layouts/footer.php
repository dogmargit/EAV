    <footer>
        <div class="foot-light">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <h2 class="pacifico">Магазин &nbsp; <img src="/resourses/frontend/images/webmarket.png" alt="Webmarket Cart" class="align-baseline" /></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam tincidunt vestibulum risus et gravida. Etiam vel augue ligula, blandit malesuada nisi. Quisque a augue nisi. Nullam interdum convallis </p>
                    </div>
                    <div class="span4">
                        <div class="main-titles lined">
                            <h3 class="title">Facebook</h3>
                        </div>
                        <div class="bordered">
                            <div class="fill-iframe">
                                <div class="fb-like-box" data-href="https://www.facebook.com/ProteusNet" data-width="292" data-height="200" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="main-titles lined">
                            <h3 class="title"><span class="light">Новости</span> Подпишись</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
						Aliquam tincidunt vestibulum risus et gravida.</p>
                        <div id="mc_embed_signup">
                        <form action="http://proteusthemes.us4.list-manage1.com/subscribe/post?u=ea0786485977f5ec8c9283d5c&amp;id=5dad3f35e9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form form-inline" target="_blank" novalidate>
                            <div class="mc-field-group">
                                <input type="email" value="" placeholder="Enter your e-mail address" name="EMAIL" class="required email" id="mce-EMAIL">
                                <input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary">
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot-dark">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="main-titles lined">
                            <h3 class="title"><span class="light">Главная</span> Навигация</h3>
                        </div>
                        <ul class="nav bold">
                            <?php $this->widget('PagesMenu'); ?>
                        </ul>
                    </div>
                    <div class="span3">
                        <div class="main-titles lined">
                            <h3 class="title">Каталог</h3>
                        </div>
                        <ul class="nav">
                            <li><a href="#">Lorem Ipsum Dolor Sit</a></li>
                            <li><a href="#">Amet Webmarket Signup</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Latest Tweets Sometging</a></li>
                            <li><a href="#">Ipsum Sit Lorem Amet</a></li>
                        </ul>
                    </div>
                    <div class="span3">
                        <div class="main-titles lined">
                            <h3 class="title">Интернет магазин</h3>
                        </div>
                        <ul class="nav">
                            <li><a href="#">Lorem Ipsum Dolor Sit</a></li>
                            <li><a href="#">Amet Webmarket Signup</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Latest Tweets Sometging</a></li>
                            <li><a href="#">Ipsum Sit Lorem Amet</a></li>
                        </ul>
                    </div>
                    <div class="span3">
                        <div class="main-titles lined">
                            <h3 class="title">Следите за нами</h3>
                        </div>
                        <ul class="nav">
                            <li><a href="#">Lorem Ipsum Dolor Sit</a></li>
                            <li><a href="#">Amet Webmarket Signup</a></li>
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Latest Tweets Sometging</a></li>
                            <li><a href="#">Ipsum Sit Lorem Amet</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> 
        <div class="foot-last">
            <a href="#" id="toTheTop">
                <span class="icon-chevron-up"></span>
            </a>
            <div class="container">
                <div class="row">
                    <div class="span6">
                        &copy; Copyright 2013
                    </div>
                </div>
            </div>
        </div> 
    </footer> 
    <div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="loginModalLabel"><span class="light">Вход</span> в Коляски.рф</h3>
        </div>
        <div class="modal-body">
            <form method="post" action="/login">
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputEmail">Логин</label>
                    <div class="controls">
                        <input type="text" class="input-block-level" name="LoginForm[email]" id="inputEmail" placeholder="Почта">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputPassword">Пароль</label>
                    <div class="controls">
                        <input type="password" class="input-block-level" name="LoginForm[password]" id="inputPassword" placeholder="Пароль">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox">
                            Запомнить меня 
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary input-block-level bold higher">
                    Войти
                </button>
            </form>
            <p class="center-align push-down-0">
                <a href="#" data-dismiss="modal">Восстановить пароль?</a>
            </p>
        </div>
    </div>
    <div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="registerModalLabel"><span class="light">Регистрация</span> на Коляски.рф</h3>
        </div>
        <div class="modal-body">
            <form method="post" action="#">
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputUsernameRegister">Логин</label>
                    <div class="controls">
                        <input type="text" class="input-block-level" id="inputUsernameRegister" placeholder="Логин">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputEmailRegister">Электронный адрес</label>
                    <div class="controls">
                        <input type="email" class="input-block-level" id="inputEmailRegister" placeholder="Электронный адрес">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputPasswordRegister">Пароль</label>
                    <div class="controls">
                        <input type="password" class="input-block-level" id="inputPasswordRegister" placeholder="Пароль">
                    </div>
                </div>
                <button type="submit" class="btn btn-danger input-block-level bold higher">
                    Зарегистрировать
                </button>
            </form>
            <p class="center-align push-down-0">
                <a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">уже зарегистрированы?</a>
            </p>
        </div>
    </div>
    <div id="fb-root"></div>
    <script src="/resourses/frontend/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/resourses/frontend/js/rs-plugin/pluginsources/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
    <script src="/resourses/frontend/js/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
    <script src="/resourses/frontend/js/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>
    <script src="/resourses/frontend/js/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="/resourses/frontend/js/jquery-ui-1.10.3/touch-fix.min.js" type="text/javascript"></script>
   <!-- <script src="/resourses/frontend/js/isotope/jquery.isotope.min.js" type="text/javascript"></script> -->
    <script src="/resourses/frontend/js/bootstrap-tour/build/js/bootstrap-tour.min.js" type="text/javascript"></script>
   <!-- <script src="/resourses/frontend/js/prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDvMjN1g49P1MA2Onsj-GulDkmDuuH6aoU&amp;sensor=false"></script> 
    <script type="text/javascript"src="/resourses/frontend/js/goMap/js/jquery.gomap-1.3.2.min.js"></script>-->
    <script type="text/javascript" src="/resourses/frontend/fancy/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type='text/javascript' src="/resourses/frontend/fancy/jquery.fancybox.js"></script>
    <script src="/resourses/frontend/js/custom.js" type="text/javascript"></script>
  </body>
</html>