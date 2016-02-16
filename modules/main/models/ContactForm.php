<?php

namespace app\modules\main\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'USER_USERNAME'),
            'email' =>  Yii::t('app', 'USER_EMAIL'),
            'subject' => Yii::t('app', 'USER_SUBJECT'),
            'body' => Yii::t('app', 'USER_BODY'),
            'verifyCode' => Yii::t('app', 'VERIFY_CODE'),
           
        ];
    }
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha', 'captchaAction' => '/main/contact/captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
}
