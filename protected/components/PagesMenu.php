<?php

Yii::import('zii.widgets.CPortlet');

 
class PagesMenu extends CPortlet
{
    public function init()
    {
        $this->title='';
        parent::init();
    }
 
    protected function renderContent()
    {
        $pages = Pages::model()->cache('5000')->checked()->findAll();

        $this->render('PagesMenu', array(
            'pages'=>$pages
            ));
    }

}