<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $rePassword; //确认密码
    public $verifyCode; //验证码

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            //targetClass 表示要校验表的所在类
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('common', 'This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 16],
            //正则校验
            ['username', 'match','pattern'=>'/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})a-zA-Z_\d]*$/u','message'=>'用户名由字母，汉字，数字，下划线组成，且不能以数字和下划线开头。'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('common', 'This email has already been taken.')],

            [['password','rePassword'], 'required'],
            [['password','rePassword'], 'string', 'min' => 6],
            ['rePassword', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('common', 'Two times the password is not consitent.')],

            ['verifyCode', 'captcha']
        ];
    }

    /**
     * 映射可以把前台field显示成中文
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'Email'),
            'password' => Yii::t('common', 'Password'),
            'rePassword' => Yii::t('common', 'Repassword'),
            'verifyCode' => Yii::t('common', 'Verifycode')
        ];
    }

    /**
     * 验证成功自动执行 signup()系统已经写好的
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey(); //生成随机的auth_key，用于cookie登陆
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
