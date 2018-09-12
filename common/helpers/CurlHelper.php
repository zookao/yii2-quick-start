<?php
namespace common\helpers;

use Yii;

class CurlHelper
{
    public static function curlGet($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_TIMEOUT,10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    /**
     * [curlPost curl的post请求]
     * @param  $url  [url地址]
     * @param  $data [$data = array ("username" => "aaa","key" => "bbb")]
     * @return       [curl请求返回的内容]
     */
    public static function curlPost($url,$data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_TIMEOUT,10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    /**
     * [curlPostJson curl的post请求，参数为json]
     * @param  $url  [url地址]
     * @param  $data [json]
     * @return       [curl请求返回的内容]
     */
    public static function curlPostJson($url,$data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER,[
            'Content-Type: application/json; charset=utf-8',
        ]);
        curl_setopt($curl, CURLOPT_TIMEOUT,10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

}