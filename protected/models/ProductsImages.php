<?php

/**
 * This is the model class for table "products_images".
 *
 * The followings are the available columns in table 'products_images':
 * @property integer $id
 * @property string $title
 * @property string $pic
 * @property integer $price
 * @property string $url
 * @property integer $products_id
 */
class ProductsImages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductsImages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products_images';
	}


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'pic' => 'Pic',
			'price' => 'Price',
			'url' => 'Url',
			'products_id' => 'Products',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('products_id',$this->products_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		// Создание урл картинки
		if (empty($this->url))
		{
			Yii::import('ext.SlugHelper.SlugHelper');
			$this->url = SlugHelper::run(preg_replace('/\s{2,}/', ' ', $this->title));
		}

		return parent::beforeSave();
	}
}