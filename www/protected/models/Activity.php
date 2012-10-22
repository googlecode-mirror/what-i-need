<?php

/**
 * This is the model class for table "activities".
 *
 * The followings are the available columns in table 'activities':
 * @property integer $activity_id
 * @property integer $author_id
 * @property string $make
 * @property string $what
 * @property string $where
 */
class Activity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Activity the static model class
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
		return 'activities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author_id', 'numerical', 'integerOnly'=>true),
			array('make, what, where', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('activity_id, author_id, make, what, where', 'safe', 'on'=>'search'),
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
			'activity_id' => 'Выбрать активность',
			'author_id' => 'Автор',
			'make' => 'Делаю',
			'what' => 'Что/На чём/О чём и т.д.',
			'where' => 'Где',
			'begin' => 'Начало',
			'end' => 'Окончание',
			'additionalinfo' => 'Дополнительная информация',

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

		$criteria->compare('activity_id',$this->activity_id);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('make',$this->make,true);
		$criteria->compare('what',$this->what,true);
		$criteria->compare('where',$this->where,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getactivityDesc() {
		return $this->make.' '.$this->what.' '.$this->where;
	}
}