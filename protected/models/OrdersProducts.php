<?php

/**
 * This is the model class for table "orders_products".
 *
 * The followings are the available columns in table 'orders_products':
 * @property integer $id
 * @property integer $orders_id
 * @property integer $products_id
 * @property string $products_name
 * @property string $options
 * @property integer $quantity
 * @property integer $price
 * @property integer $subtotal
 */
class OrdersProducts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders_products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('quantity, price, subtotal', 'required'),
			array('orders_id, products_id, quantity, price, subtotal', 'numerical', 'integerOnly'=>true),
			array('products_name, options', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, orders_id, products_id, products_name, options, quantity, price, subtotal', 'safe', 'on'=>'search'),
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
			'orders_id' => 'Orders',
			'products_id' => 'Products',
			'products_name' => 'Products Name',
			'options' => 'Options',
			'quantity' => 'Quantity',
			'price' => 'Price',
			'subtotal' => 'Subtotal',
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
		$criteria->compare('orders_id',$this->orders_id);
		$criteria->compare('products_id',$this->products_id);
		$criteria->compare('products_name',$this->products_name,true);
		$criteria->compare('options',$this->options,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('price',$this->price);
		$criteria->compare('subtotal',$this->subtotal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrdersProducts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
