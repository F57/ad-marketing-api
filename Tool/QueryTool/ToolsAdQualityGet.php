<?php
/**
 * 查询广告质量度
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Tool\QueryTool;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ToolsAdQualityGet extends RpcRequest
{
    protected $url = '/2/tools/ad_quality/get/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 广告主id
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 查询广告质量度
     * @var array $ad_ids
     */
    protected $ad_ids;

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
        RequestCheckUtil::checkNotNull($this->advertiser_id,'advertiser_id');
        RequestCheckUtil::checkNotNull($this->ad_ids, 'ad_ids');
    }
}
