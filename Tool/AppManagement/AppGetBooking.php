<?php
/**
 * 查询游戏信息
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Tool\AppManagement;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class AppGetBooking extends RpcRequest
{
    protected $url = '/2/tools/app_management/booking/get/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 操作的广告主id
     * @var int $advertiser_id
     */
    protected $advertiser_id;

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

    }
}
