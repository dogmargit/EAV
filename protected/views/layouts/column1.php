<?php $this->beginContent('/layouts/main'); ?>
<div class="darker-stripe">
        <div class="container">
        	<div class="row">
        		<div class="span12">
                <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                        'separator'=> ' » ',
                        'htmlOptions'=>array ('class'=>'breadcrumb'),
                    )); ?>
                <?php endif?>
        		</div>   
        	</div>
        </div>
    </div>
    <div class="container">
        <div class="push-up blocks-spacer">
            <div class="row">
                <section class="span12">
                 <?=$content;?>
                </section> 
            </div>
        </div>
    </div>
    <?php $this->endContent(); ?>