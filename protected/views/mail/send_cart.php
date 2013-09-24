<p>Здравствуйте <b><?=$order->user_name;?></b>, 
вы оставили заказ на сайте 
<?php echo CHtml::link(Yii::app()->params['site_title'], Yii::app()->params['site_link'], '', array('target'=>'_blank')); ?></p>
<table cellspacing="0" style="width: 100%;text-align: center;">
	<tbody>
		<tr style="vertical-align: middle;font-size: 14px;" bgcolor="#f1f1f1">
			<th>Товар</th>
			<th></th>
			<th>Цена</th>
			<th>Кол-во</th>
			<th>Стоимость</th>
		</tr>
	<?php foreach($shoppingCart as $position): ?>
		<tr>
			<td><a href="" target="_blank"><img src="<?=Yii::app()->params['site_link'];?>assets/images/thumbs_160/<?=$position['pic'];?>"></a></td>
			<td valign="top" align="left"><a href="<?=Yii::app()->params['site_link'];?>item/<?=$position['url'].'_'.$position['products_id'];?>.html" target="_blank"><?=$position['title'];?></a>
			<p></p>
			</td>
			<td><?=$position['price'];?> Р</td>
			<td><?=$position['quantity']?></td>
			<td><?=$position['price']*$position['quantity'];;?></td>
		</tr>
		<?php endforeach; ?>
		<tr style="vertical-align: middle;font-size: 14px;" bgcolor="#f1f1f1">
			<th></th>
			<th></th>
			<th></th>
			<th>Сумма заказа</th>
			<th><?=$order->subtotal;?></th>
		</tr>
	</tbody>
</table>

Номер заказа: <strong>№ <?=$order->id;?></strong>