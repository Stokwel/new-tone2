<?php

class RegistrationForm extends CFormModel
{
	public $nick;
	public $password;
    public $password2;
    public $captcha;

	public function rules()
	{
		return array(
			array('nick, password, password2, captcha', 'required'),
			array('captcha', 'captcha'),
            array('nick', 'unique', 'className' => 'User'),
            array('password2', 'compare', 'message' => 'Пароли не совпадают', 'compareAttribute' => 'password')
		);
	}

	public function attributeLabels()
	{
		return array(
		);
	}
}
