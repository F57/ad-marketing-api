<?php
/**
 * 广告组更新状态
 * 通过此接口可对广告组做启用/暂停/删除操作。
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace AdvertisingDelivery;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class CampaignUpdateStatus extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/campaign/update/status/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * 广告组ID集合
     */
    protected $campaign_ids;

    /**
     * 操作, "enable"表示启用, "delete"表示删除, "disable"表示暂停
     * 允许值: "enable", "delete", "disable"
     */
    protected $opt_status;

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
     *
     * @throws InvalidParamException
     */
    public function check()
    {
        RequestCheckUtil::checkAllowField($this->opt_status, ['enable', 'delete', 'disable'], 'opt_status');
    }


}

