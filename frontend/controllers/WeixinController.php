<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use common\helpers\WeixinHelper;

class WeixinController extends Controller
{
    public function init()
    {
        $this->enableCsrfValidation = false;
    }

    public function actionIndex()
    {
        if (isset($_GET['echostr'])) {
            if (Yii::$app->wechat->checkSignature()) {
                exit($_GET['echostr']);
            }else exit();
        }

        $array = WeixinHelper::wxXml2Array();
        if (!empty($array)) {
            $openid = $array['FromUserName'];
            $RX_TYPE = $array['MsgType'];
            switch ($RX_TYPE){
                case 'event':
                    $result = WeixinHelper::receiveEvent($array);
                    break;
                case 'text':
                    $result = WeixinHelper::receiveText($array);
                    break;
                case 'image':
                    $result = WeixinHelper::receiveImage($array);
                    break;
                case 'location':
                    $result = WeixinHelper::receiveLocation($array);
                    break;
                case 'voice':
                    $result = WeixinHelper::receiveVoice($array);
                    break;
                case 'video':
                    $result = WeixinHelper::receiveVideo($array);
                    break;
                case 'link':
                    $result = WeixinHelper::receiveLink($array);
                    break;
                default:
                    $result = 'unknown msg type: '.$RX_TYPE;
                    break;
            }
            echo $result;
        }
    }

    public function actionMenu()
    {
        $menus = [
            [
                'type' => 'click',
                'name' => '点击',
                'key'  => 'click',
            ],
            [
                'name'=>'帮助中心',
                'sub_button'=>[
                    ['type' => 'view','name' => '个人中心','url'  => Url::toRoute('site/index',true),],
                ]
            ],
        ];
        $status = Yii::$app->wechat->createMenu($menus);
        var_dump($status);
    }

    public function actionUpload()
    {
        $status = Yii::$app->wechat->uploadMaterial(Yii::getAlias('@api/web/statics/img/1.png'),'image');
        var_dump($status);
    }
}