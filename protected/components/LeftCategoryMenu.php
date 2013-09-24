<?php

Yii::import('zii.widgets.CPortlet');

 
class LeftCategoryMenu extends CPortlet
{
    public function init()
    {
        $this->title='';
        parent::init();
    }
 

    protected function renderContent()
    {
         if(!$category = Yii::app()->cache->get('LeftCategory'))
        {
            $category = Category::model()->tree_array();
            Yii::app()->cache->set('LeftCategory', $category);
        } 

        $this->render('LeftCategoryMenu', array(
            'category'=>$category
            ));
    }

}