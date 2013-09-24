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
 * @property string $role
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property integer $checked
 */
class Users extends CActiveRecord
{
	public $pic_del;
	
	public $confirmpassword;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
			array('checked', 'numerical', 'integerOnly'=>true),
			array('password, confirmpassword', 'length', 'max'=>1000),
			array('email, username, phone, pic', 'length', 'max'=>255),
			array('address, password', 'safe'),
			array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('password', 'length', 'min'=>6),
        	array('password', 'compare', 'compareAttribute' => 'confirmpassword'),
		);
	}

   public function behaviors(){
        return array(
            'UploadBehavior' => array(
                'class' => 'application.components.behaviors.UploadBehavior.UploadBehavior',
                'uploadNew' => true,
            ),
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
			'confirmpassword' => 'Подтверждение пароля',
			'email' => 'Электронный адрес',
			'username' => 'Имя',
			'phone' => 'Телефон',
			'address' => 'Адрес',
			'pic' => 'Изображение',
			'role' => 'Роль',
			'created_at' => 'Дата создания',
			'position' => 'Дата изменения',
			'checked' => 'Активен',
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
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('checked',$this->checked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		if (!$this->confirmpassword)
		{
			unset($this->password);
		}

		return parent::beforeSave();
	}

}