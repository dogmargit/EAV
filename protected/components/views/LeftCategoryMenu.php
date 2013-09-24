<h2 class="title">Категории</h2><div class="shizzley shizzley3"></div>
<div class="categorybox">
    <ul>
        <? foreach($category as $item): ?>
        <li><?=CHtml::link($item['title'], array('category/view', 'id'=>$item['id'], 'name'=>$item['url']));?>
        <?php if($item['childs']): ?>
        <ul>
            <? foreach($item['childs'] as $items): ?>
            <li><?=CHtml::link($items['title'], array('category/view', 'id'=>$items['id'], 'name'=>$items['url'])); ?></li>
            <? endforeach;?>
        </ul>
        <? endif;?>
        </li>
        <? endforeach;?>
    </ul>
</div>