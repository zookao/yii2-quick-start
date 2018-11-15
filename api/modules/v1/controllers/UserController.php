<?php

namespace api\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use api\models\LoginForm;

class UserController extends BaseController
{
    public $modelClass = 'common\models\User';

    //登录
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->setAttributes(Yii::$app->request->post());
        if ($user = $model->login()) {
            return ['code' => 200,'data' => $user->api_token];
        } else {
            // return ['code' => 500,'data' => $model->errors];
            return ['code' => 500,'data' => '用户名或密码不正确'];
        }
    }

    public function actionIndex()
    {
        throw new BadRequestHttpException('无权限');
    }

    public function actionCreate()
    {
        throw new BadRequestHttpException('无权限');
    }

    public function actionUpdate($id)
    {
        throw new BadRequestHttpException('无权限');
    }

    public function actionDelete($id)
    {
        throw new BadRequestHttpException('无权限');
    }

    public function actionView($id)
    {
        throw new BadRequestHttpException('无权限');
    }

    //获取用户信息
    public function actionInfo()
    {
        $user = $this->authenticate(Yii::$app->user, Yii::$app->request, Yii::$app->response);
        return $user;
    }
}
