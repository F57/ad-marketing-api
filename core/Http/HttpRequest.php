<?php

/**
 * Created by PhpStorm.
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace core\Http;

use core\Exception\TouTiaoException;

class HttpRequest
{
    /**
     * @var int
     */
    public static $connectTimeout = 30;//30 second
    /**
     * @var int
     */
    public static $readTimeout = 80;//80 second

    /**
     *
     * @param $url
     * @param string $httpMethod
     * @param null $postFields
     * @param null $headers
     * @return HttpResponse
     * @throws TouTiaoException
     */
    public static function curl($url, $httpMethod = 'GET', $postFields = null, $headers = null)
    {

        $ch = curl_init();
        if (defined("ENABLE_HTTP_PROXY") && defined("HTTP_PROXY_IP") && defined("HTTP_PROXY_PORT") && ENABLE_HTTP_PROXY) {
            curl_setopt($ch, CURLOPT_PROXYAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_PROXY, HTTP_PROXY_IP);
            curl_setopt($ch, CURLOPT_PROXYPORT, HTTP_PROXY_PORT);
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
        }
        if (strtolower($httpMethod) === 'get') {
            $url .= ('?' . (is_array($postFields) ? http_build_query($postFields) : $postFields));
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ('post' === strtolower($httpMethod)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            $postFields = $headers['Content-Type'] === 'application/json' ? json_encode($postFields) : $postFields;
            curl_setopt($ch, CURLOPT_POSTFIELDS, is_array($postFields) ? self::getPostHttpBody($postFields) : $postFields);
        }

        if (self::$readTimeout) {
            curl_setopt($ch, CURLOPT_TIMEOUT, self::$readTimeout);
        }
        if (self::$connectTimeout) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::$connectTimeout);
        }

        //https request
        if (strlen($url) > 5 && stripos($url, 'https') === 0) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        if (is_array($headers) && 0 < count($headers)) {
            $httpHeaders = self::getHttpHearders($headers);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeaders);
        }

        if (class_exists('\CURLFile')) {
            curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
        } else {
            if (defined('CURLOPT_SAFE_UPLOAD')) {
                curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
            }
        }

        $httpResponse = new HttpResponse();
        $httpResponse->setBody(curl_exec($ch));
        $httpResponse->setStatus(curl_getinfo($ch, CURLINFO_HTTP_CODE));
        if (curl_errno($ch)) {
            throw new TouTiaoException('Server unreachable: Errno: ' . curl_errno($ch) . ' ' . curl_error($ch),
                'SDK.ServerUnreachable');
        }
        curl_close($ch);

        return $httpResponse;
    }

    /**
     * @param $postFildes
     *
     * @return bool|string
     */
    public static function getPostHttpBody($postFildes)
    {
        $isMultipart = false;
        foreach ($postFildes as $apiParamKey => $apiParamValue) {
            if ("@" == substr($apiParamValue, 0, 1)) {
                $isMultipart = true;
                if (class_exists('\CURLFile')) {
                    $postFildes[$apiParamKey] = new \CURLFile(substr($apiParamValue, 1));
                }
            }
        }
        return $isMultipart ? $postFildes : http_build_query($postFildes);
    }

    /**
     * @param $headers
     *
     * @return array
     */
    public static function getHttpHearders($headers)
    {
        $httpHeader = array();
        foreach ($headers as $key => $value) {
            $httpHeader[] = $key . ':' . $value;
        }
        return $httpHeader;
    }

    public static function renderJSON($data = [], $msg = "ok", $code = 200)
    {
        return json_encode([
            'code' => $code,
            'msg' => $msg,
            'data' => $data
        ]);
    }
}
