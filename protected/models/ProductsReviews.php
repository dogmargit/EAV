<?php

/**
 * This is the model class for table "products_reviews".
 *
 * The followings are the available columns in table 'products_reviews':
 * @property integer $id
 * @property string $user_name
 * @property string $user_email
 * @property string $review
 * @property string $created_at
 * @property integer $products_id
 * @property integer $checked
 */
class ProductsReviews extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'products_reviews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, user_email, review, created_at, products_id, checked', 'required'),
			array('products_id, checked', 'numerical', 'integerOnly'=>true),
			array('user_name, user_email', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_name, user_email, review, created_at, products_id, checked', 'safe', 'on'=>'search'),
		);
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
			'user_name' => 'User Name',
			'user_email' => 'User Email',
			'review' => 'Review',
			'created_at' => 'Created At',
			'products_id' => 'Products',
			'checked' => 'Checked',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('review',$this->review,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('checked',$this->checked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductsReviews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
