<?php

/**
 * This is the model class for table "banners_object".
 *
 * The followings are the available columns in table 'banners_object':
 * @property integer $id
 * @property integer $data_x
 * @property integer $data_y
 * @property integer $data_speed
 * @property integer $data_start
 * @property string $data_easing
 * @property string $pic
 * @property string $text
 * @property string $class
 * @property string $link
 * @property string $btn
 * @property integer $banner_id
 */
class BannersObject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'banners_object';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data_x, data_y, data_speed, data_start, banner_id', 'numerical', 'integerOnly'=>true),
			array('data_easing, pic, class, link, btn', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('text', 'safe'),
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
			'data_x' => 'Data X',
			'data_y' => 'Data Y',
			'data_speed' => 'Data Speed',
			'data_start' => 'Data Start',
			'data_easing' => 'Data Easing',
			'pic' => 'Pic',
			'text' => 'Text',
			'class' => 'Class',
			'link' => 'Link',
			'btn' => 'Btn',
			'banner_id' => 'Banner',
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
		$criteria->compare('data_x',$this->data_x);
		$criteria->compare('data_y',$this->data_y);
		$criteria->compare('data_speed',$this->data_speed);
		$criteria->compare('data_start',$this->data_start);
		$criteria->compare('data_easing',$this->data_easing,true);
		$criteria->compare('pic',$this->pic,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('class',$this->class,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('btn',$this->btn,true);
		$criteria->compare('banner_id',$this->banner_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BannersObject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
