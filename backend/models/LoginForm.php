<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Admin;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],  //*也可以这样来区分场景验证
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * 映射可以把前台field显示成中文
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'password' => Yii::t('common', 'Password'),
            'rememberMe' => Yii::t('common', 'Rememberme'),
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('common', 'Incorrect username or password.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {

        if ($this->validate()) {

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {

            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function seekPass($data){

//        if($this->load($data) && $this->validate()){
//
//            $mailer = Yii::$app->mailer->compose(); //可设置两参数 1.发送的模板如 contact/html 2.要传的参数
//            $mailer->setFrom('13580454164@163.com');
//            $mailer->setTo($data['LoginForm']['email']);
//            $mailer->setSubject('找回密码'); //设置主题
//            if($mailer->send()){
//
//                return true;
//            }
//
//        }

        return false;
    }
}
