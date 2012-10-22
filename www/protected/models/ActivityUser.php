<?php

/**
 * This is the model class for table "activity_user".
 *
 * The followings are the available columns in table 'activity_user':
 * @property integer $rec_id
 * @property integer $user_id
 * @property integer $activity_id
 * @property string $create_time
 */
class ActivityUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ActivityUser the static model class
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
		return 'activity_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, activity_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rec_id, user_id, activity_id, create_time', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'activity' => array(self::BELONGS_TO, 'Activity', 'activity_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rec_id' => 'Rec',
			'user_id' => 'User',
			'activity_id' => 'Activity',
			'create_time' => 'Create Time',
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

		$criteria->compare('rec_id',$this->rec_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('activity_id',$this->activity_id);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

public function beforeSave() {
    if ($this->isNewRecord)
        $this->create_time = new CDbExpression('NOW()');
/*    else
        $this->modified = new CDbExpression('NOW()');
 */
    return parent::beforeSave();
}
}