<?php
/**
 * 创建广告组
 * 通过此接口可用于创建广告组, 当前只支持创建推广目的为落地页或者应用下载的广告组。
 * 每个账号下最多可允许创建500个广告组，如超出需要先删除一部分广告组后才可继续创建。
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace AdvertisingDelivery;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class CampaignCreate extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/campaign/create/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * 广告组名称  长度为1-100个字符，其中1个中文字符算2位
     */
    protected $campaign_name;

    /**
     * 广告组预算类型  允许值: "BUDGET_MODE_INFINITE","BUDGET_MODE_DAY"
     */
    protected $budget_mode;

    /**
     * 可选
     * 广告组预算(当budget_mode=BUDGET_MODE_DAY时,必填,且日预算不少于1000元)
     * 取值范围: ≥ 0
     */
    protected $budget;

    /**
     * 广告组推广目的
     * 允许值: "LINK", "APP","DPA","GOODS"
     */
    protected $landing_type;


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
        RequestCheckUtil::checkNotNull($this->advertiser_id, 'advertiser_id');
        RequestCheckUtil::checkNotNull($this->campaign_name, 'campaign_name');
        RequestCheckUtil::checkNotNull($this->budget_mode, 'budget_mode');
        RequestCheckUtil::checkNotNull($this->landing_type, 'landing_type');
        RequestCheckUtil::checkMaxLength($this->campaign_name, 100, 'campaign_name');
    }


}

