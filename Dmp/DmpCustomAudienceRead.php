<?php
/**
 * 人群包详细信息
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Dmp;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class DmpCustomAudienceRead extends RpcRequest
{
    protected $url = '/2/dmp/custom_audience/read/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var  int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 人群包ID列表 长度取值范围: 1-100
     * @var array $custom_audience_ids
     */
    protected $custom_audience_ids;
    
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
        RequestCheckUtil::checkNotNull($this->custom_audience_ids, 'custom_audience_ids');
    }
}
