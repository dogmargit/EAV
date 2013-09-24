<div id="megamenu-responsive">
    <ul id="megamenu-responsive-root">
        <li class="menu-toggle"><p></p>Навигация</li>
        <li class="root">
        <ul>
            <li class="">
                <a href="index.html"><span>Главная</span></a>
            <ul>
                <? foreach($category as $item): ?>
                <li class="parent ">
                    <a href="/"><span><?=$item['title'];?></span></a>
                    <?php if($item['childs']): ?>
                    <ul>
                        <? foreach($item['childs'] as $items): ?>
                            <li class=""><a href="/category/<?=$items['url']."_".$items['id'];?>.html"><span><?=$items['title'];?></span></a></li>
                        <? endforeach;?>
                    </ul>
                    <? endif;?>
                </li>
                <? endforeach;?>
            </ul>
            </li>
        </ul>
</div>