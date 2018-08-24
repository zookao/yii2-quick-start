<?php

namespace backend\models;

use Yii;
use common\models\Admin;
use yii\base\Model;

class ChangePasswordForm extends Model
{
    public $oldPassword;
    public $newPassword;
    public $retypePassword;

    public function rules()
    {
        return [
            [['oldPassword', 'newPassword', 'retypePassword'], 'required'],
            [['oldPassword'], 'validatePassword'],
            [['newPassword'], 'string', 'min' => 6],
            [['retypePassword'], 'compare', 'compareAttribute' => 'newPassword','message' => '两次密码输入不一致'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'oldPassword' => '原密码',
            'newPassword' => '新密码',
            'retypePassword' => '新密码确认',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        /* @var $user User */
        $user = Yii::$app->user->identity;
        if (!$user || !$user->validatePassword($this->oldPassword)) {
            $this->addError('oldPassword', '原密码不正确');
        }
    }

    /**
     * Change password.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function change()
    {
        if ($this->validate()) {
            /* @var $user User */
            $user = Yii::$app->user->identity;
            $user->setPassword($this->newPassword);
            $user->generateAuthKey();
            if ($user->save()) {
                return true;
            }
        }

        return false;
    }
}
