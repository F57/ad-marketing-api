<?php
/**
 * 更新创意状态
 * 通过此接口可对创意做启用/暂停操作。
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */
namespace AdvertisingOriginality;

use core\Profile\RpcRequest;

class CreativeUpdateStatus extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/creative/update/status/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * 创意ID集合
     */
    protected $creative_ids;

    /**
     * 操作, "enable"表示启用, "disable"表示暂停
     * 允许值: "enable", "disable"
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

}
