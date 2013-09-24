<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $password
 * @property string $email
 * @property string $username
 * @property string $phone
 * @property string $address
 * @property string $pic
 * @property integer $group_id
 * @property string $role
 * @property integer $checked
 */
class Registration extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password, email, username', 'required'),
			array('group_id, checked', 'numerical', 'integerOnly'=>true),
			array('password', 'length', 'max'=>1000),
			array('email, username, phone, pic, role', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, password, email, username, phone, address, pic, group_id, role, checked', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'password' => 'Пароль',
			'email' => 'Электронный адрес',
			'username' => 'Имя',
			'phone' => 'Телефон',
			'address' => 'Адрес',
			'pic' => 'Изображение',
			'group_id' => 'Роль',
			'role' => 'Роль',
			'checked' => 'Активен',
		);
	}


	public function email_check($email)
	{
		$result = $this->findByAttributes(array('email'=>$email));

		if($result->email)
			return true;

		return false;
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
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('checked',$this->checked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		// Выдаем роль
		$this->role = 'user';
		$this->checked = '1';


		return parent::beforeSave();
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return registration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
