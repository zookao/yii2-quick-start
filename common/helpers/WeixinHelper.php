<?php

namespace common\helpers;

use Yii;
use yii\helpers\FileHelper;

class WeixinHelper
{
    /**
     * 解析微信post过来的xml数据，返回array格式数据
     */
    public static function wxXml2Array()
    {
        return Yii::$app->wechat->parseRequestData();
    }

    //接收事件消息
    public static function receiveEvent($array)
    {
        $content = '';
        switch ($array['Event']){
            case "subscribe":
                $content = "欢迎关注";
                break;
            case "SCAN":
                $content = '扫码事件';
                break;
            case "scancode_waitmsg":
                $content = '扫码事件';
                break;
            case "CLICK":
                $content = '功能陆续放出，请耐心等待';
                break;
            default:
                $content = "receive a new event: ".$array['Event'];
                break;
        }
        return $result = self::transmitText($array, $content);
    }

    //接收文本消息
    public static function receiveText($array)
    {
        $keyword = trim($array['Content']);

        //自动回复模式
        if (strstr($keyword, "您好") || strstr($keyword, "你好") || strstr($keyword, "在吗")){
            $content = "您好";
        }else{
            $content = date("Y-m-d H:i:s",time());
        }

        return self::transmitText($array, $content);;
    }

    //接收图片消息
    public static function receiveImage($array)
    {
        $content = array("MediaId"=>$array['MediaId']);
        $result = self::transmitImage($array, $content);
        return $result;
    }

    //接收位置消息
    public static function receiveLocation($array)
    {
        $content = "你发送的是位置，纬度为：".$array['Location_X']."；经度为：".$array['Location_Y']."；缩放级别为：".$array['Scale']."；位置为：".$array['Label'];
        $result = self::transmitText($array, $content);
        return $result;
    }

    //接收语音消息
    public static function receiveVoice($array)
    {
        if (isset($array['Recognition']) && !empty($array['Recognition'])){
            $content = "你刚才说的是：".$array['Recognition'];
            $result = self::transmitText($object, $content);
        }else{
            $content = array("MediaId"=>$array['MediaId']);
            $result = self::transmitVoice($array, $content);
        }
        return $result;
    }

    //接收视频消息
    public static function receiveVideo($array)
    {
        $content = array("MediaId"=>$array['MediaId'], "ThumbMediaId"=>$array['ThumbMediaId'], "Title"=>"", "Description"=>"");
        $result = self::transmitVideo($array, $content);
        return $result;
    }

    //接收链接消息
    public static function receiveLink($object)
    {
        $content = "你发送的是链接，标题为：".$object->Title."；内容为：".$object->Description."；链接地址为：".$object->Url;
        $result = self::transmitText($object, $content);
        return $result;
    }

    //回复文本消息
    public static function transmitText($array, $content)
    {
        $xmlTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
        $result = sprintf($xmlTpl, $array['FromUserName'], $array['ToUserName'], time(), $content);
        return $result;
    }

    //回复图片消息
    public static function transmitImage($array, $imageArray)
    {
        $itemTpl = "<Image>
    <MediaId><![CDATA[%s]]></MediaId>
</Image>";
        $item_str = sprintf($itemTpl, $imageArray['MediaId']);
        $xmlTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
$item_str
</xml>";
        $result = sprintf($xmlTpl, $array['FromUserName'], $array['ToUserName'], time());
        return $result;
    }

    //回复语音消息
    public static function transmitVoice($array, $voiceArray)
    {
        $itemTpl = "<Voice>
    <MediaId><![CDATA[%s]]></MediaId>
</Voice>";
        $item_str = sprintf($itemTpl, $voiceArray['MediaId']);
        $xmlTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[voice]]></MsgType>
$item_str
</xml>";
        $result = sprintf($xmlTpl, $array['FromUserName'], $array['ToUserName'], time());
        return $result;
    }

    //回复视频消息
    public static function transmitVideo($array, $videoArray)
    {
        $itemTpl = "<Video>
    <MediaId><![CDATA[%s]]></MediaId>
    <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
    <Title><![CDATA[%s]]></Title>
    <Description><![CDATA[%s]]></Description>
</Video>";
        $item_str = sprintf($itemTpl, $videoArray['MediaId'], $videoArray['ThumbMediaId'], $videoArray['Title'], $videoArray['Description']);
        $xmlTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[video]]></MsgType>
$item_str
</xml>";
        $result = sprintf($xmlTpl, $array['FromUserName'], $array['ToUserName'], time());
        return $result;
    }

    //回复图文消息
    public static function transmitNews($array, $newsArray)
    {
        if(!is_array($newsArray)){
            return;
        }
        $itemTpl = "    <item>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
        <PicUrl><![CDATA[%s]]></PicUrl>
        <Url><![CDATA[%s]]></Url>
    </item>
";
        $item_str = "";
        foreach ($newsArray as $item){
            $item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['PicUrl'], $item['Url']);
        }
        $xmlTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>%s</ArticleCount>
<Articles>
$item_str</Articles>
</xml>";
        $result = sprintf($xmlTpl, $array['FromUserName'], $array['ToUserName'], time(), count($newsArray));
        return $result;
    }

    //回复音乐消息
    public static function transmitMusic($array, $musicArray)
    {
        $itemTpl = "<Music>
    <Title><![CDATA[%s]]></Title>
    <Description><![CDATA[%s]]></Description>
    <MusicUrl><![CDATA[%s]]></MusicUrl>
    <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
</Music>";
        $item_str = sprintf($itemTpl, $musicArray['Title'], $musicArray['Description'], $musicArray['MusicUrl'], $musicArray['HQMusicUrl']);
        $xmlTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[music]]></MsgType>
$item_str
</xml>";
        $result = sprintf($xmlTpl, $array['FromUserName'], $array['ToUserName'], time());
        return $result;
    }

    //回复多客服消息
    public static function transmitService($array)
    {
        $xmlTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[transfer_customer_service]]></MsgType>
</xml>";
        $result = sprintf($xmlTpl, $array['FromUserName'], $array['ToUserName'], time());
        return $result;
    }
}