<? foreach($pages as $item): ?>
<li><?=CHtml::link($item['title'], array('pages/view', 'name'=>$item['url'])); ?></li>
<? endforeach;?>