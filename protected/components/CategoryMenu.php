<?php

class CategoryMenu extends CWidget
{
    public function run()
    {
        if(!$category = Yii::app()->cache->get('Category'))
        {
            $category = Category::model()->tree_array();
            Yii::app()->cache->set('Category', $category);
        } 

        $this->render('CategoryMenu', array(
            'category'=>$category
            ));
    }
}