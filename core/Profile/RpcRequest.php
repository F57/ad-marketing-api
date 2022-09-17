<?php
/**
 * Created by PhpStorm.
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace core\Profile;

use core\Exception\TouTiaoException;
use ToutiaoSdk\TouTiaoClient;

class RpcRequest implements RequestInteface
{
    /**
     * @var TouTiaoClient
     */
    protected $client;

    /**
     * request url
     */
    protected $url = '';

    /**
     * request method
     */
    protected $method = 'GET';

    /**
     * request timeout
     */
    protected $timeout = 60;

    /**
     * request query params or raw body
     */
    protected $params = [];

    /**
     * request header Content-Type
     */
    protected $content_type = 'application/json';

    /**
     * RpcRequest constructor.
     * @param null $client
     */
    public function __construct($client = null)
    {
        $this->client = $client;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function addParam($key, $value)
    {
        $this->params[$key] = $value;
        $this->$key = $value;
        return $this;
    }

    public function setParams($array)
    {
        foreach ($array as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
            $this->params[$key] = $value;
        }
        return $this;
    }

    public function getContentType()
    {
        return $this->content_type;
    }

    public function check()
    {
        // TODO: Implement check() method.
    }

    /**
     * @return \core\Http\HttpResponse
     * @throws TouTiaoException
     */
    public function send()
    {
        if (!$this->client instanceof TouTiaoClient) {
            throw new TouTiaoException('Request can not be send by null, TouTiaoClent`s instance should be set before send', 500);
        }
        return $this->client->excute($this);
    }
}
