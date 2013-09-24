<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $pic
 * @property string $url
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property string $text
 * @property integer $checked
 */
class News extends CActiveRecord
{
	public $pic_del;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'news';
	}
	
    public function scopes()
    {
        return array(
            'checked'=>array(
                'condition'=>'checked=1',
            )
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, text', 'required'),
			array('checked, pic_del', 'numerical', 'integerOnly'=>true),
			array('title, pic, url', 'length', 'max'=>255),
			array('text', 'safe',),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, checked', 'safe', 'on'=>'search'),
		);
	}

   public function behaviors(){
        return array(
            'SlugBehavior' => array(
                'class' => 'application.components.behaviors.SlugBehavior.SlugBehavior',
            ),
            'UploadBehavior' => array(
                'class' => 'application.components.behaviors.UploadBehavior.UploadBehavior',
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
			'title' => 'Заголовок',
			'pic' => 'Картинка',
			'url' => 'Ссылка',
			'created_at' => 'Дата создания',
			'position' => 'Дата изменения',
			'created_at' => 'Дата создания',
			'text' => 'Контент',
			'checked' => 'Активна',
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
		$criteria->compare('checked',$this->checked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		return parent::beforeSave();
	}
}