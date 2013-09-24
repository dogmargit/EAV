<?php

/**
 * This is the model class for table "products".
 *
 * The followings are the available columns in table 'products':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $price
 * @property string $pic
 * @property string $url
 * @property integer $brands_id
 * @property integer $recomended
 * @property integer $special
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $checked
 */
class Products extends CActiveRecord
{
	public $categoryId;

	public $pic_del;

	public $ProductsInCategories;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Products the static model class
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
		return 'products';
	}

    public function scopes()
    {
        return array(
            'checked'=>array(
                'condition'=>'checked=1',
            ),
            'recomended'=>array(
                'limit'=>'4',
            ),
            'new'=>array(
                'limit'=>'8',
                'order'=>'id DESC'
            ),
        );
    }

    public function get_id_categories($arr)
    {
    	$array = array();

    	foreach($arr as $item)
    	{
    		$array[$item['id']] = $item['categories_id'];
    	}

    	return $array;
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, price', 'required'),
			array('price, brands_id, recomended, special, checked, pic_del', 'numerical', 'integerOnly'=>true),
			array('title, pic, url', 'length', 'max'=>255),
			array('meta_title, meta_keywords, description, meta_description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, price, brands_id, recomended, special, checked', 'safe', 'on'=>'search'),
			array('categoryId', 'safe'),
		);
	}

   public function behaviors(){
        return array(
        	// Создание URL
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
			'brands'=>array(self::BELONGS_TO, 'Brands', 'brands_id', 'joinType' => 'LEFT JOIN'),
			'pics'=>array(self::HAS_MANY, 'ProductsImages', 'products_id'),
			'related'=>array(self::HAS_MANY, 'ProductsRelated', 'products_id'),
			'categories' => array(self::HAS_MANY, 'ProductsInCategories', 'products_id'),
   			'productsInCategory'=>array(self::BELONGS_TO, 'ProductsInCategories', array('id'=>'products_id')),
    		'category'=>array(self::HAS_ONE, 'Category', array('categories_id'=>'id'), 'through'=>'productsInCategory'),
   			'productsInCategoryList'=>array(self::BELONGS_TO, 'ProductsInCategories', array('id'=>'products_id')),
    		'categoryList'=>array(self::HAS_MANY, 'Category', array('categories_id'=>'id'), 'through'=>'productsInCategoryList'),
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
			'price' => 'Цена',
			'pic' => 'Изображение',
			'url' => 'Ссылка',
			'brands_id' => 'Бренд',
			'recomended' => 'Рекомендуем',
			'special' => 'Спец. Предложение',
			'created_at' => 'Дата создания',
			'position' => 'Дата изменения',
			'meta_title' => 'Мета заголовок',
			'meta_description' => 'Мета описание',
			'meta_keywords' => 'Кючевые слова',
			'checked' => 'Активен',
			'category' => 'Категория',
			'pic_del' => 'Удаление картинки',
		);
	}

	public function get_dataProvider()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('category.id', $this->categoryId);
		$criteria->with = array('category');
		return new CActiveDataProvider('Products',array(
		  'criteria'=>$criteria,

		));
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
		$criteria->with = array('category', 'productsInCategory');
		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('t.price',$this->price);
		$criteria->compare('t.brands_id',$this->brands_id);
		$criteria->compare('t.checked',$this->checked);
		$criteria->compare('productsInCategory.categories_id', $_GET['ProductsInCategories']['categories_id']);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort' => array(
				'defaultOrder'=>array(
					'id'=>CSort::SORT_ASC,
				),
				'attributes'=>array(
					'category'=>array(
						'asc'=>'category.title',
						'desc'=>'category.title DESC',
					),
					'*',
				),
			),
		));
	}

	public function beforeSave()
	{
		return parent::beforeSave();
	}

	public function beforeDelete()
	{
		// Удаление сопутствующих товаров
		$this->clearProductsRelated();

		// Удаление категорий
		$this->clearPInC();

		// Удаление отзывов
		$this->clearReviews();

		// Удаление картинок
		$this->clearPicutre();

		return parent::beforeDelete();
	}

	public function afterSave()
	{
		// Загрузка изображений
        if(strlen($_FILES['pics']['name'][0]) > '3')
        { 
    		for($i=0; count($_FILES['pics']['name']) > $i; $i++) 
    		{
				$images_name = Upload::upload_files($_FILES['pics'], $i);

				//Загрузка миниатюр изображений
				$image = new EasyImage(Yii::app()->params['pic_path'].$images_name);
				$image->resize(Yii::app()->params['pic_small_size']);
				$image->save(Yii::app()->params['pic_small_path'].$images_name);

				$images = New ProductsImages;

	            $images->products_id = $this->id;
	            $images->pic = $images_name;
	            $images->save();
	        }
		}

		// Добавление Сопутсвующих
		if($related = $_POST['Related'])
		{
			$this->clearProductsRelated();

			foreach($related as $key => $value)
			{
				$relateds = New ProductsRelated;

	            $relateds->products_id = $this->id;
	            $relateds->link_id = $value;
	            $relateds->save();
			}
		}

		// Добавление Категорий
		if($Categories = $_POST['Categories'])
		{
			$this->clearPInC();

			foreach($Categories as $key => $value)
			{
				$relateds = New ProductsInCategories;

	            $relateds->products_id = $this->id;
	            $relateds->categories_id = $value;
	            $relateds->save();
			}
		}

		// Изменение изображений
		if($img = $_POST['pics'])
		{
            foreach($img as $item)
            {
                $images = ProductsImages::model()->findByPk($item['id']);
            	$images->title = $item['title'];
            	$images->price = $item['price'];
            	$images->url = $item['url'];
                if(!empty($item['imgs_del'])) 
                {
                	//Удаление картинки
                    $images->delete();
                    @unlink(Yii::app()->params['pic_path'].$item['imgs_del']);

					//Удаление миниатюр
					@unlink(Yii::app()->params['pic_small_path'].$item['imgs_del']);
                } 
                else 
                {
                	$images->save();
                }
            }
		}

		return parent::afterSave();
	}

	private function clearProductsRelated()
	{
		ProductsRelated::model()->deleteAll('products_id=:id', array('id'=>$this->id));
	}

	private function clearPInC()
	{
		ProductsInCategories::model()->deleteAll('products_id=:id', array('id'=>$this->id));
	}

	private function clearReviews()
	{
		ProductsReviews::model()->deleteAll('products_id=:id', array('id'=>$this->id));
	}

	private function clearPicutre()
	{
		foreach($this->pics as $item)
		{
			@unlink(Yii::app()->params['pic_path'].$item['pic']);
			@unlink(Yii::app()->params['pic_small_path'].$item['pic']);
		}

		ProductsImages::model()->deleteAll('products_id=:id', array('id'=>$this->id));
	}

}