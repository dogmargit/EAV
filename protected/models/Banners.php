<?php

/**
 * This is the model class for table "banners".
 *
 * The followings are the available columns in table 'banners':
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $pic
 * @property integer $position
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property integer $checked
 */
class Banners extends CActiveRecord
{
	public $pic_del;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Banners the static model class
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
		return 'banners';
	}

    public function scopes()
    {
        return array(
            'checked'=>array(
                'condition'=>'checked=1',
                'order' => 'position',
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
			array('position, checked, pic_del', 'numerical', 'integerOnly'=>true),
			array('title, url, pic', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title', 'safe', 'on'=>'search'),
		);
	}

   public function behaviors(){
        return array(
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

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'objects'=>array(self::HAS_MANY, 'BannersObject', 'banner_id'),
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
			'url' => 'Ссылка',
			'pic' => 'Изображение',
			'position' => 'Позиция',
			'created_at' => 'Дата создания',
			'updated_at' => 'Дата изменения',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('checked',$this->checked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeDelete()
	{
    	// Удаление картинки
        @unlink(Yii::app()->params['pic_path'].$this->pic);

		// Удаление миниатюры
		@unlink(Yii::app()->params['pic_small_path'].$this->pic);

		return parent::beforeDelete();
	}
	public function afterSave()
	{
		// Изменение изображений
		if($img = $_POST['objects'])
		{
            foreach($img as $item)
            {
                $images = BannersObject::model()->findByPk($item['id']);
            	$images->data_x = $item['data_x'];
        		$images->data_y = $item['data_y'];
        		$images->data_speed = $item['data_speed'];
        		$images->data_start = $item['data_start'];
        		$images->data_easing = $item['data_easing'];
        		$images->class = $item['class'];
        		$images->text = $item['text'];
        		$images->link = $item['link'];
        		$images->btn = $item['btn'];

                if(!empty($item['pic_del'])) 
                {
                	//Удаление картинки
                    $images->pic = 0;
                    @unlink(Yii::app()->params['pic_path'].$item['pic_del']);

					//Удаление миниатюр
					@unlink(Yii::app()->params['pic_path'].$item['pic_del']);
                }
		        if(strlen($_FILES['objects_pics']['name'][$item['id']]) > '3')
		        { 
		        	$type = array_pop(explode('.', $_FILES['objects_pics']['name'][$item['id']]));
					$images_name = md5(time(1)).'.'.array_pop(explode('.', $_FILES['objects_pics']['name'][$item['id']]));
					//Загрузка миниатюр изображений
					$image = new EasyImage($_FILES['objects_pics']['tmp_name'][$item['id']]);
					$image->save(Yii::app()->params['pic_path'].$images_name);

		            $images->banner_id = $this->id;
		            $images->pic = $images_name;
				}
				$images->save();

            }
		}

		return parent::afterSave();
	}

	public function beforeSave()
	{
		if($_POST['add_object'])
		{
			$i = 0;
			while($i <= $_POST['add_object'])
			{
				$object = New BannersObject;

				$object->banner_id = $this->id;

				$object->save();
				$i++;
			}
		}
		return parent::beforeSave();
	}
}