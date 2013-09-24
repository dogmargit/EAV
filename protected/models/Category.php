<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $url
 * @property integer $parent_id
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $checked
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return 'category';
	}

    public function scopes()
    {
        return array(
            'childs'=>array(
                'condition'=>'parent_id>0',
            ),
            'parents'=>array(
                'condition'=>'parent_id=0',
            ),
            'checked'=>array(
                'condition'=>'checked=1',
            )
        );
    }

	public function get_menu()
	{
		$category = $this->checked()->findAll();
		
        $i = 0;
        foreach ($category as $item) {
   			$list[$i]['id'] = $item->id;
   			$list[$i]['title'] = $item->title;
   			$list[$i]['parent_id'] = $item->parent_id;
   			$list[$i]['url'] = $item->url;

   			$i++;
         }

		return $list;
	}

	function get_html_select($arr, $count = 0, $active = false)
	{
		  $html = "";
		  $count += 2;
		  $spacers = "";
		  if($active)
		  	$arrs = array_flip($active);

		  for ($i = 0; $i < $count - 2; $i++)
		  {
		    $spacers .= '-';
		  }
		   
		  if (!empty($spacers))
		  {
		    $spacers .= '';
		  }
		   
		  foreach ($arr as $k => $v)
		  {
		  	if($arrs[$v['id']]) $select = ' selected '; else $select = ' ';
		    $html .= '<option'.$select.'value="'.$v['id'].'">' . $spacers .' ' . $v['title'];

		    if (array_key_exists('childs', $v))
		    {
		      $html .= $this->get_html_select($v['childs'], $count, $active);
		    }
		    $html .= '</option>'.PHP_EOL;
		  }
		 
		  return $html;
	}

	public function get_parent($parent, $array = array())
	{
		$array[$parent->title] = array('/category/view', 'id'=>$parent->id, 'name'=>$parent->url);

		if($parent = $parent->parent)
			return $this->get_parent($parent, $array);
		$array = array_reverse($array);
		$array[] = $this->title;
		return $array;
	}

    public function tree_array() 
    {
		$arr = $this->get_menu();
        $l = count($arr);
        for($i = 0; $i < $l; $i++) 
        {
            $mas[$arr[$i]['id']] = &$arr[$i];
        }
        foreach($mas as $k => $v) 
        {
            $mas[$v['parent_id']]['childs'][] = &$mas[$k];
        }
        $res = array();
        foreach($arr as $v) 
        {
            if(isset($v['parent_id']) && $v['parent_id'] == 0) 
            {
               $res[] = $v;
            }
        }
        return $res;
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
			array('checked, parent_id', 'numerical', 'integerOnly'=>true),
			array('title, url', 'length', 'max'=>255),
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
	         'products' => array(self::MANY_MANY, 'Products', 'products_in_categories(categories_id, products_id)'),
			 'parent' => array(self::BELONGS_TO, 'Category', 'parent_id',), 
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
			'meta_title' => 'Мета заголовок',
			'meta_description' => 'Мета описание',
			'meta_keywords' => 'Кючевые слова',
			'checked' => 'Активна',
			'parent_id' => 'Родитель',
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