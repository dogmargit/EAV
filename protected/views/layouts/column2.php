<?php $this->beginContent('/layouts/main'); ?>
<div class="container_16 main2 padding50">
	<div class="grid_4 lefthome">
		<?php $this->widget('LeftCategoryMenu'); ?>  
	</div>

	<div class="grid_11">
		<?=$content;?>
	</div>
</div>
<?php $this->endContent(); ?>