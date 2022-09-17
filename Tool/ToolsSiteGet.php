<?php
/**
 * 获取建站列表
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Tool;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ToolsSiteGet extends RpcRequest
{
    protected $url = '/2/tools/site/get/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 广告主id
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 页码 默认值: 1
     * @var int $page
     */
    protected $page;

    /**
     * 页面数据量 默认值: 20
     * @var int $page_size
     */
    protected $page_size;

    /**
     * @param mixed $args
     * @return $this
     */
    public function setArgs($args)
    {
        foreach ($args as $key => $value) {
            $this->params[$key] = $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @throws \core\Exception\InvalidParamException
     */
    public function check()
    {
        RequestCheckUtil::checkNotNull($this->advertiser_id, 'advertiser_id');
    }
}
