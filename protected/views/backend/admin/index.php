<?php
$this->breadcrumbs=array( 
    'Главная',
);
?>
<div class="row-fluid">
    <div class="span8">
        <div class="widget">
            <div class="head dark">
                <div class="icon"><span class="icos-calendar"></span></div>
                <h2>Посещаемость</h2>
                <ul class="buttons">                            
                    <li><a href="#"><span class="icos-refresh"></span></a></li>
                    <li><a href="#"><span class="icos-history"></span></a></li>
                    <li><a href="#"><span class="icos-flag1"></span></a></li>
                </ul>                         
            </div>
            <div class="toolbar">
                <div class="left TAL">                                                        
                    <div class="input-prepend input-append">
                        <span class="add-on"><i class="icon-calendar"></i></span>
                        <input type="text" id="datepicker" value="2013-01-31"/>                                
                        <button class="btn">Показать</button>                                    
                    </div>                            
                </div>
                <div class="right TAR">
                    <button class="btn">Сегодня</button>     
                    <div class="btn-group" data-toggle="buttons-radio">
                        <button type="button" class="btn">Неделя</button>
                        <button type="button" class="btn">Месяц</button>
                        <button type="button" class="btn active">Год</button>                            
                    </div>           
                </div>
            </div>
            <div class="block white">
                <div id="main_chart" style="height: 300px;"></div>
            </div>
            <div class="toolbar-fluid">
                <div class="information">
                    <div class="item">
                        <div class="rates">
                            <div class="title">2,145</div>
                            <div class="description">посещаемость</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="rates">
                            <div class="title">648</div>
                            <div class="description">уникалы</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="rates">
                            <div class="title">143</div>
                            <div class="description">покупатели</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="rates">
                            <div class="title">$14,329</div>
                            <div class="description">деньги</div>
                        </div>
                    </div>                            
                </div>
            </div>
        </div>
        <div class="widget">
            <div class="head dark">
                <div class="icon"><i class="icos-stats-up"></i></div>
                <h2>Последние заказы</h2>
                <ul class="buttons">                            
                    <li><a href="#"><span class="icos-pencil2"></span></a></li>
                    <li><a href="#"><span class="icos-cog"></span></a></li>
                </ul>                         
            </div>                
                <div class="block-fluid">
                    <table class="table table-hover" cellpadding="0" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="checkall"/></th>
                                <th width="25%">Заголовок</th>
                                <th width="20%">Товар</th>
                                <th width="20%">Статус</th>
                                <th width="20%">Дата</th>
                                <th width="15%" class="TAC">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="order[]" value="528"/></td>
                                <td><a href="#">Dmitry Ivaniuk</a></td>
                                <td>Product #212</td>
                                <td><span class="label label-important">New</span></td>
                                <td>24/11/2012</td>
                                <td class="TAC">
                                    <a href="#"><span class="icon-ok"></span></a> 
                                    <a href="#"><span class="icon-pencil"></span></a> 
                                    <a href="#"><span class="icon-trash"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="order[]" value="527"/></td>
                                <td><a href="#">John Doe</a></td>
                                <td>Product #132</td>
                                <td><span class="label label-important">New</span></td>
                                <td>24/11/2012</td>
                                <td class="TAC">
                                    <a href="#"><span class="icon-ok"></span></a> 
                                    <a href="#"><span class="icon-pencil"></span></a> 
                                    <a href="#"><span class="icon-trash"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="order[]" value="526"/></td>
                                <td><a href="#">Alex Fruz</a></td>
                                <td>Product #53</td>
                                <td><span class="label label-important">New</span></td>
                                <td>23/11/2012</td>
                                <td class="TAC">
                                    <a href="#"><span class="icon-ok"></span></a> 
                                    <a href="#"><span class="icon-pencil"></span></a> 
                                    <a href="#"><span class="icon-trash"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="order[]" value="525"/></td>
                                <td><a href="#">Olga Yukhimchuk</a></td>
                                <td>Product #874</td>
                                <td><span class="label label-info">Pending</span></td>
                                <td>23/11/2012</td>
                                <td class="TAC">
                                    <a href="#"><span class="icon-ok"></span></a> 
                                    <a href="#"><span class="icon-pencil"></span></a> 
                                    <a href="#"><span class="icon-trash"></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="order[]" value="524"/></td>
                                <td><a href="#">Angelina Rose</a></td>
                                <td>Product #533</td>
                                <td><span class="label label-info">Pending</span></td>
                                <td>23/11/2012</td>
                                <td class="TAC">
                                    <a href="#"><span class="icon-ok"></span></a> 
                                    <a href="#"><span class="icon-pencil"></span></a> 
                                    <a href="#"><span class="icon-trash"></span></a>
                                </td>
                            </tr>                            
                        </tbody>
                    </table>                    
                </div> 
            </div>                
        </div>
        <div class="span4">
           <div class="middle">
                <div class="button">
                    <a href="#">
                        <span class="icomg-earth"></span>
                        <span class="text">Навигация</span>
                    </a>
                    <ul class="sub">
                        <li><a href="http://aqvatarius.com/" class="tip" title="Dashborad"><span class="icon-home"></span></a></li>
                        <li><a href="ui.html" class="tip" title="UI"><span class="icon-user"></span></a></li>
                        <li><a href="grid.html" class="tip" title="Grid"><span class="icon-th"></span></a></li>
                        <li><a href="widgets.html" class="tip" title="Widgets"><span class="icon-th-large"></span></a></li>
                        <li><a href="buttons.html" class="tip" title="Buttons"><span class="icon-chevron-right"></span></a></li>
                        <li><a href="icons.html" class="tip" title="Icons"><span class="icon-fire"></span></a></li>
                        <li><a href="http://google.com/" class="tip" title="Google" target="_blank"><span class="icon-globe"></span></a></li>
                        <li><a href="http://youtube.com/" class="tip" title="Youtube" target="_blank"><span class="icon-globe"></span></a></li>
                    </ul>
                </div>
                <div class="button">
                    <a href="#">
                        <span class="icomg-user2"></span>
                        <span class="text">Пользователи</span>
                    </a>
                    <ul class="sub">
                        <li><a href="users.html" class="tip" title="Show list"><span class="icon-th-list"></span></a></li>
                        <li><a href="ui.html" class="tip" title="Add new"><span class="icon-plus"></span></a></li>                        
                        <li><a href="#" class="tip" title="Registrations"><span class="icon-ok"></span></a></li>
                        <li><a href="#" class="tip" title="Send mail"><span class="icon-envelope"></span></a></li>
                        <li><a href="#" class="tip" title="Top users"><span class="icon-star"></span></a></li>
                        <li><a href="#" class="tip" title="Users activity"><span class="icon-signal"></span></a></li>
                        <li><a href="#" class="tip" title="Last comments"><span class="icon-comment"></span></a></li>
                    </ul>
                </div>                
            </div>                
            <div class="middle">
                <div class="informer">
                    <a href="#">
                        <span class="title">2/1,981</span>
                        <div class="progress small progress-striped">
                            <div class="bar tip" style="width: 58%;" title="Used 58%"></div>
                        </div>   
                    </a>
                    <span class="caption tip" title="Spam">341</span>
                </div>                                        
                <div class="informer">
                    <a href="#">
                        <span class="title">$2,534</span>
                        <span class="text">Баланс</span>
                    </a>
                    <span class="caption red">-$135</span>
                </div>                                                                            
            </div>                                  
            <div class="widget"> 
                <div class="head dark">
                    <div class="icon"><i class="icos-star3"></i></div>
                    <h2>Задачи</h2>
                    <ul class="buttons">                                                        
                        <li>
                            <a href="#"><span class="icos-plus1"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Создать</a></li>
                                <li><a href="#">Загрузить</a></li>
                                <li><a href="#">Искать</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Очистить</a></li>
                            </ul>                                
                        </li>
                    </ul>                          
                </div>                    
                <div class="toolbar">
                    <div class="left">
                        <div class="btn-group">
                            <button class="btn btn-mini dropdown-toggle" data-toggle="dropdown">Действия</button>                            
                            <ul class="dropdown-menu">
                                <li><a href="#">Новый</a></li>
                                <li><a href="#">Отменить</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Создать</a></li>
                                <li><a href="#">Удалить</a></li>                                                                                                
                            </ul>
                        </div>                            
                    </div>
                    <div class="right TAR">
                        <div class="btn-group" data-toggle="buttons-radio">
                            <button type="button" class="btn btn-mini active">Все</button>
                            <button type="button" class="btn btn-mini">Новые</button>
                            <button type="button" class="btn btn-mini">Удаленые</button>                                
                        </div>           
                    </div>
                </div>
                <div class="block-fluid tasks">
                    <div class="item new">
                        <input type="checkbox" name="task[]"/> <span class="label label-success">new</span> Buy on themeforest this great template! <span class="added">Added by Dmitry Ivaniuk</span>
                    </div>
                    <div class="item new">
                        <input type="checkbox" name="task[]"/> <span class="label label-success">new</span> Go to shop and buy beer! <span class="added">Added by Dmitry Ivaniuk</span>
                    </div>                        
                    <div class="item done">
                        <input type="checkbox" name="task[]" checked="checked"/> <span class="label label-warning">done</span> Don't forget to update this template! <span class="added">Added by Dmitry Ivaniuk</span>
                    </div>                                                
                    <div class="item done">
                        <input type="checkbox" name="task[]" checked="checked"/> <span class="label label-warning">done</span> No time to explain, get on the horse! <span class="added">Added by Dmitry Ivaniuk</span>
                    </div>
                    <div class="item">
                        <input type="checkbox" name="task[]"/> <span class="label label-info">archive</span> Buy something for my dog! <span class="added">Added by Dmitry Ivaniuk</span>
                    </div>                        
                </div>  
                <div class="toolbar">
                    <div class="left">
                        <div class="btn-group">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">Action with selected</button>                            
                            <ul class="dropdown-menu">
                                <li><a href="#">New</a></li>
                                <li><a href="#">Done</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Add to archive</a></li>
                                <li><a href="#">Remove</a></li>                                                                                                
                            </ul>
                        </div>                         
                    </div>
                    <div class="right TAR">
                        <div class="pagination pagination-mini">
                            <ul>                                    
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>                                                        
                            </ul>
                        </div>
                    </div>
                </div>                    
            </div>                               
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><i class="icos-tag"></i></div>
                    <h2>Тикеты</h2>
                    <ul class="buttons">                                                        
                        <li><a href="#"><span class="icos-cog"></span></a></li>
                    </ul>                          
                </div>
                <div class="block-fluid">
                    <ul class="list tickets">
                        <li class="new clearfix" id="T212">
                            <div class="title">
                                <a href="#">Product info</a>
                                <p>Promble with order of pictures...</p>
                            </div>
                            <div class="actions">
                                <a href="#" class="tip" title="Edit"><span class="icon-pencil"></span></a> 
                                <a href="#" class="remove tip" title="Remove"><span class="icon-remove"></span></a>
                            </div>
                        </li>
                        <li class="accept clearfix" id="T213">
                            <div class="title">
                                <a href="#">Request backup</a>
                                <p>Plese send me backup from 24/11/2012...</p>
                            </div>
                            <div class="actions">
                                <a href="#" class="tip" title="Edit"><span class="icon-pencil"></span></a> 
                                <a href="#" class="remove tip" title="Remove"><span class="icon-remove"></span></a>
                            </div>
                        </li>
                        <li class="accept clearfix" id="T214">
                            <div class="title">
                                <a href="#">Sign in button</a>
                                <p>Doesnt send post requset to server...</p>
                            </div>
                            <div class="actions">
                                <a href="#" class="tip" title="Edit"><span class="icon-pencil"></span></a> 
                                <a href="#" class="remove tip" title="Remove"><span class="icon-remove"></span></a>
                            </div>
                        </li>
                        <li class="done clearfix" id="T215">
                            <div class="title">
                                <a href="#">Send email using HTML</a>
                                <p>Some characters are deleted from the template...</p>
                            </div>
                            <div class="actions">
                                <a href="#" class="tip" title="Edit"><span class="icon-pencil"></span></a> 
                                <a href="#" class="remove tip" title="Remove"><span class="icon-remove"></span></a>
                            </div>
                        </li>                        
                        <li class="done clearfix" id="T216">
                            <div class="title">
                                <a href="#">Print form</a>
                                <p>When you click on "print form" it displays an error...</p>
                            </div>
                            <div class="actions">
                                <a href="#" class="tip" title="Edit"><span class="icon-pencil"></span></a> 
                                <a href="#" class="remove tip" title="Remove"><span class="icon-remove"></span></a>
                            </div>
                        </li>                                                    
                    </ul>                        
                </div>                    
            </div>                               
            <div class="widget">
                <div class="head dark">
                    <div class="icon"><i class="icos-comments2"></i></div>
                    <h2>Сообщения</h2>      
                    <ul class="buttons">                                                        
                        <li><a href="#"><span class="icos-plus1"></span></a></li>
                    </ul>                                                  
                </div>
                <div class="toolbar">
                    <div class="user">
                        <img src="/resourses/backend/img/examples/users/dmitry_m.jpg" class="img-polaroid"/> <a href="#">Dmitry</a>
                    </div>
                    <div class="user">
                        <img src="/resourses/backend/img/examples/users/alexey_m.jpg" class="img-polaroid"/> <a href="#">Alex</a>
                    </div>                            
                </div>
                <div class="block messaging">                        
                    
                    <div class="item">
                        <div class="image">                                
                            <img src="/resourses/backend/img/examples/users/dmitry.jpg" class="img-polaroid"/>
                        </div>           
                        <div class="date">20:43</div>
                        <div class="text">
                            <a href="#">Dmitry</a>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>                            
                    </div>                         
                    <div class="item out">
                        <div class="image">
                            <img src="/resourses/backend/img/examples/users/alexey.jpg" class="img-polaroid"/>
                        </div>                            
                        <div class="date">20:30</div>
                        <div class="text">
                            <a href="#">Alex</a>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>                            
                    </div>
                    <div class="item">
                        <div class="image">
                            <img src="/resourses/backend/img/examples/users/dmitry.jpg" class="img-polaroid"/>
                        </div>                            
                        <div class="date">20:10</div>
                        <div class="text">
                            <a href="#">Dmitry</a>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>                            
                    </div>                        
                </div>
                <div class="toolbar bottom">
                    <div class="input-append input-prepend">
                        <button class="btn tip" title="Add photo" type="button"><span class="icon-picture"></span></button>
                        <button class="btn tip" title="Add video" type="button"><span class="icon-film"></span></button>
                        <input type="text"/>
                        <button class="btn btn-primary" type="button">Send</button>
                    </div>
                </div>
            </div>                
    </div>            
</div>
