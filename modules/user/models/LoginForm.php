<?php

namespace app\modules\user\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;
 
    private $_user = false;
 
    /**
     * @return array the validation rules.
     */
     public function attributeLabels()
    {
        return [
            'email' => Yii::t('app', 'USER_EMAIL'),
            'password' => Yii::t('app', 'USER_PASSWORD'),
            'rememberMe' => Yii::t('app', 'USER_REMEMBER_ME'),
        ];
    }
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }
 
    /**
     * Validates the username and password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
 
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', Yii::t('app', 'ERROR_WRONG_USERNAME_OR_PASSWORD'));
            } elseif ($user && $user->status == User::STATUS_BLOCKED) {
                $this->addError('email', Yii::t('app', 'ERROR_PROFILE_BLOCKED'));
            } elseif ($user && $user->status == User::STATUS_WAIT) {
                $this->addError('email', Yii::t('app', 'ERROR_PROFILE_BLOCKED'));
            }
        }
    }
 
    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        } else {
            return false;
        }
    }
 
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmail($this->email);
        }
 
        return $this->_user;
    }
}
