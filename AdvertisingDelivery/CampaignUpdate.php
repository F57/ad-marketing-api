<?php
/**
 * 修改广告组
 * 修改广告组信息，可更改内容包括广告组名称、预算类型及预算，除此之外其他内容不允许修改。
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace AdvertisingDelivery;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class CampaignUpdate extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/campaign/update/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * 广告组ID
     */
    protected $campaign_id;

    /**
     * (可选)
     * 广告组名称  长度为1-100个字符，其中1个中文字符算2位
     */
    protected $campaign_name;

    /**
     * 时间戳,从read接口得到,用于判断是否基于最新信息修改
     */
    protected $modify_time;

    /**
     * (可选)
     * 广告组预算类型  允许值: "BUDGET_MODE_INFINITE","BUDGET_MODE_DAY"
     */
    protected $budget_mode;

    /**
     * (可选)
     * 广告组预算(当budget_mode=BUDGET_MODE_DAY时,必填,且日预算不少于1000元)
     * 取值范围: ≥ 0
     */
    protected $budget;

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

