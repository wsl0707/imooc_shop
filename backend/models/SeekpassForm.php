<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Admin;

/**
 * Login form
 */
class SeekpassForm extends Model
{
    public $username;
    public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            ['username', 'required'],  //*也可以这样来区分场景验证
            [['username', 'email'], 'trim'],
            [['username', 'email'], 'string', 'max' => 128],
            ['email', 'required', 'message' => '电子邮箱不能为空'],
            ['email', 'email', 'message' => '电子邮箱格式不正确'],
            ['email', 'validateEmail'],
        ];
    }

    /**
     * 映射可以把前台field显示成中文
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
        ];
    }

    /**
     * 自定义邮箱验证方法
     */
    public function validateEmail(){
        //判断上面验证有没有错误
        if(!$this->hasErrors()){
            $data = Admin::find()
                ->where('username = :user and email = :email', [
                    ':user' => $this->username,
                    ':email' => $this->email
                ])
                ->one();
//            var_dump($data);exit;
                if(is_null($data)){
                    //添加页面现实的错误信息
                    $this->addError('email', '管理员电子邮箱不匹配');
                }
        }
    }

    public function seekPass($data){

        if($this->load($data) && $this->validate()){

//            var_dump($data);exit;
            $mailer = Yii::$app->mailer->compose(); //可设置两参数 1.发送的模板如 contact/html 2.要传的参数
            $mailer->setFrom('13580454164@163.com');
            $mailer->setTo($data['SeekpassForm']['email']);
            $mailer->setSubject('找回密码'); //设置主题
            if($mailer->send()){

                return true;
            }
        }

        return false;
    }
}
