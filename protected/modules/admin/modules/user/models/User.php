<?php

class User extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_user':
	 * @var integer $id
	 * @var string $nick
	 * @var string $pass
	 * @var string $email
	 */

    public $password2;
    public $captcha;
    public $rememberMe;

    private $_identity;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className
     * @return CActiveRecord the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('nick, pass', 'required'),
            array('nick', 'unique', 'on' => 'reg'),
            array('password2, captcha', 'required', 'on' => 'reg'),
            array('captcha', 'captcha', 'on' => 'reg'),
            array('password2', 'compare', 'message' => 'Пароли не совпадают', 'compareAttribute' => 'pass', 'on' => 'reg'),
            array('rememberMe', 'boolean', 'on' => 'login'),
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
			'id' => 'Id',
			'nick' => 'Nick',
            'email' => 'Email',
            'pass' => 'Пароль'
		);
	}

    /**
     * Logs in the user using the given username and password in the model.
     * @return boolean whether login is successful
     */
    public function login()
    {
        if($this->_identity===null) {
            $this->_identity=new UserIdentity($this->nick,$this->pass);
            $this->_identity->authenticate();
        }
        if($this->_identity->errorCode===UserIdentity::ERROR_NONE) {
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            Yii::app()->user->login($this->_identity, $duration);
            return true;
        } else {
            $this->addError('pass', 'Пара пароль/логин не верна');
            return false;
        }
    }
}