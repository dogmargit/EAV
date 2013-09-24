<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property string $user_name
 * @property string $user_email
 * @property integer $user_id
 * @property string $user_phone
 * @property string $user_address
 * @property string $user_ip
 * @property string $user_comment
 * @property integer $status_id
 * @property string $note
 * @property integer $subtotal
 * @property datetime $created_at
 * @property datetime $updated_at
 */
class Orders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Orders the static model class
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
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, user_email, user_phone', 'required'),
			array('user_id, status_id, subtotal', 'numerical', 'integerOnly'=>true),
			array('user_name, user_email, user_phone, user_ip', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_name, user_email, created_at', 'safe', 'on'=>'search'),
		);
	}

   public function behaviors(){
        return array(
            'CTimestampBehavior' => array(
	  			'class' => 'zii.behaviors.CTimestampBehavior',
	  			'createAttribute' => 'created_at',
	  			'updateAttribute' => 'updated_at',
	  		),
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
			'status'=>array(self::BELONGS_TO, 'OrdersStatus', 'status_id', 'joinType' => 'LEFT JOIN'),
			'products'=>array(self::HAS_MANY, 'OrdersProducts', 'orders_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_name' => 'Имя и фамилия',
			'user_email' => 'Электронный адрес',
			'user_id' => 'ID покупателя',
			'user_phone' => 'Телефон',
			'user_address' => 'Адрес',
			'user_ip' => 'IP адрес',
			'user_comment' => 'Комментарий',
			'status_id' => 'Статус',
			'note' => 'Заметка',
			'subtotal' => 'Общая сумма',
			'created_at' => 'Дата создания',
			'position' => 'Дата изменения',
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
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_phone',$this->user_phone,true);
		$criteria->compare('user_address',$this->user_address,true);
		$criteria->compare('user_ip',$this->user_ip,true);
		$criteria->compare('user_comment',$this->user_comment,true);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('subtotal',$this->subtotal);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}