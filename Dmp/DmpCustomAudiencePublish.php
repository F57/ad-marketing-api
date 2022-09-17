<?php
/**
 * 发布人群包（新版）
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Dmp;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class DmpCustomAudiencePublish extends RpcRequest
{
    protected $url = '/2/dmp/custom_audience/publish/';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 人群包所属广告主ID
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 人群包ID
     * @var int $custom_audience_id
     */
    protected $custom_audience_id;
    
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
        RequestCheckUtil::checkNotNull($this->custom_audience_id, 'custom_audience_id');
    }
}
