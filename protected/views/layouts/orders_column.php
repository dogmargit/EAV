<?php $this->beginContent('/layouts/no_layouts'); ?>
<div class="checkout-container">
    <div class="row">
        <div class="span10 offset1">
            <header>
                <div class="row">
                    <div class="span2">
                        <?=CHtml::link('<img src="/resourses/frontend/images//logo-bw.png" alt="Webmarket Logo" width="48" height="48" />', '/'); ?>
                    </div>
                    <div class="span6">
                        <div class="center-align">
                            <h1><span class="light">Коляски.рф</span> Корзина</h1>
                        </div>
                    </div>
                    <div class="span2">
                        <div class="right-align">
                            <img src="/resourses/frontend/images/buttons/security.jpg" alt="Security Sign" width="92" height="65" />
                        </div>
                    </div>
                </div>
            </header>
            <?=$content;?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>