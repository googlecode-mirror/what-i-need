<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $user_id
 * @property string $level
 * @property string $username
 * @property string $password
 * @property string $email
 */
class User extends CActiveRecord {

     
    // ��� �����
    public $verifyCode;
    // ��� ���� "������ ������"
    public $passwd2;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('level', 'length', 'max' => 5),
			array('username, password, email', 'length', 'max' => 255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, level, username, password, email', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'activities' => array(self::HAS_MANY, 'ActivityUser', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'user_id' => '№',
			'level' => 'Уровень',
			'username' => 'Логин',
			'password' => 'Пароль',
			'email' => 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('level', $this->level, true);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email', $this->email, true);

		return new CActiveDataProvider($this, array(
					'criteria' => $criteria,
				));
	}

	public function validatePassword($password) {
		return $password === $this->password;
	}

	public function isAdmin() {
		return $this->level == 'admin';
	}

	public function isFriendWith($friend_id) {
		$attrs=array('from_id' => $friend_id, 'to_id' => $this->user_id);
		$friends=Friend::model()->findByAttributes($attrs);
		if ($friends==null)
		{
			return false;
		}
		return true;
	}
}