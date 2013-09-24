<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
<div class="nav-collapse collapse">
    <ul class="nav" id="mainNavigation">
        <li class="dropdown">
            <?=CHtml::link('Главная', '/', array('class'=>'dropdown-toggle')); ?>
        </li>
        <? foreach($category as $item): ?>
        <li class="dropdown">
            <?=CHtml::link($item['title'].($item['childs']?' <b class="caret"></b> ':''), array('category/view', 'id'=>$item['id'], 'name'=>$item['url']), array('class'=>'dropdown-toggle')); ?>
            <?php if($item['childs']): ?>
            <ul class="dropdown-menu">
            <? foreach($item['childs'] as $items): ?>
                <li><?=CHtml::link($items['title'], array('category/view', 'id'=>$items['id'], 'name'=>$items['url'])); ?></li>
            <? endforeach;?>
            </ul>
            <? endif;?>
        </li>
        <? endforeach;?>
    </ul>
    <form class="navbar-form pull-right" action="#" method="get">
        <button type="submit"><span class="icon-search"></span></button>
        <input type="text" class="span1" name="search" id="navSearchInput">
    </form>
</div>