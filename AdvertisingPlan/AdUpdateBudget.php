<?php
/**
 * 更新计划预算
 * 广告更新预算(也可使用update接口指定budget修改预算)
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace AdvertisingPlan;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class AdUpdateBudget extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/ad/update/budget/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * 计划ID
     */
    protected $ad_id;

    /**
     * 预算
     */
    protected $budget;

    /**
     * 批量修改预算，包含计划ID和预算
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
     //   RequestCheckUtil::checkNotNull($this->advertiser_id, 'advertiser_id');
      //  RequestCheckUtil::checkNotNull($this->ad_id, 'ad_id');
    }


}
