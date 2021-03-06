<?php

/**
 * This is the model class for table "manufacturer".
 *
 * The followings are the available columns in table 'manufacturer':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $url
 * @property string $pic
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $checked
 */
class Brands extends CActiveRecord
{
	public $pic_del;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Manufacturer the static model class
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
		return 'manufacturer';
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
			array('title', 'required'),
			array('checked, pic_del', 'numerical', 'integerOnly'=>true),
			array('title, url, pic', 'length', 'max'=>255),
			array('meta_title, meta_keywords', 'length', 'max'=>1000),
			array('description', 'safe'),
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
			'description' => 'Описание',
			'url' => 'Ссылка',
			'pic' => 'Изображение',
			'created_at' => 'Дата создания',
			'position' => 'Дата изменения',
			'meta_title' => 'Мета заголовок',
			'meta_description' => 'Мета описание',
			'meta_keywords' => 'Кючевые слова',
			'checked' => 'Активен',
			'pic_del' => 'Удаление картинки',
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

	public function beforeDelete()
	{
		return parent::beforeDelete();
	}

	public function beforeSave()
	{
		return parent::beforeSave();
	}
}