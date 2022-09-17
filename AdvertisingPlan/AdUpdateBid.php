<?php
/**
 * 更新计划出价
 * 更新计划出价(也可使用update接口指定bid修改出价)
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace AdvertisingPlan;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class AdUpdateBid extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/ad/update/bid/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * 计划ID集合
     */
    protected $ad_ids;

    /**
     * 出价
     */
    protected $bid;

    /**
     * 批量修改，包含计划id和出价
     */
    protected $data;
    
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
        //RequestCheckUtil::checkNotNull($this->advertiser_id, 'advertiser_id');
        //RequestCheckUtil::checkNotNull($this->ad_ids, 'ad_ids');
    }


}
