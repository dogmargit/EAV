<html>
<head>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<table cellspacing="0" cellpadding="10" style="color:#666;font:13px Arial;line-height:1.4em;width:100%;">
	<tbody>
		<tr>
            <td style="color:#4D90FE;font-size:22px;border-bottom: 2px solid #4D90FE;">
            	<?php echo CHtml::link(Yii::app()->params['site_title'], Yii::app()->params['site_link']); ?>
            </td>
		</tr>
		<tr>
            <td style="color:#777;font-size:16px;padding-top:5px;">
            	<?php if(isset($data['description'])) echo $data['description'];  ?>
            </td>
		</tr>
		<tr>
            <td>
				<?php echo $content ?>
            </td>
		</tr>
		<tr>
            <td style="padding:15px 20px;padding-top:5px;border-top:solid 1px #dfdfdf">
				<b>По всем вопросам обращайтесь по телефону:</b>
				<?=Yii::app()->params['phone'];?>

				<b>E-mail:</b> <?=Yii::app()->params['email'];?>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>