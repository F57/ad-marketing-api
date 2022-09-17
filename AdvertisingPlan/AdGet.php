<?php
/**
 * 获取广告计划
 * 获取广告计划列表，可指定fields获取每个计划的基本元素
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace AdvertisingPlan;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class AdGet extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'GET';
    protected $url = '/2/ad/get/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * (可选)
     * 页数 默认值: 1
     */
    protected $page;

    /**
     * (可选)
     * 页面大小 默认值: 10
     */
    protected $page_size;

    /**
     * (可选)
     * 过滤条件，若此字段不传，或传空则视为无限制条件
     * json
     */
    protected $filtering = [];

    /**
     * (可选)
     * 【过滤条件】
     * 按广告计划ID过滤
     * 数组
     */
    protected $ids;

    /**
     * (可选)
     * 【过滤条件】
     * 按广告计划名称过滤
     * 支持模糊搜索
     */
    protected $ad_name;

    /**
     * (可选)
     * 【过滤条件】
     * 按出价方式过滤
     * 数组
     */
    protected $pricing_list;

    /**
     * (可选)
     * 【过滤条件】
     * 按计划状态过滤
     * 默认为返回“所有不包含已删除”，如果要返回所有包含已删除有对应枚举表示
     */
    protected $status;

    /**
     * (可选)
     * 【过滤条件】
     * 按广告组id过滤
     */
    protected $campaign_id;

    /**
     * (可选)
     * 查询字段集合, 如果指定, 则返回结果数组中, 每个元素是包含所查询字段的字典
     * 允许值: "id", "name", "budget", "budget_mode", "status", "opt_status",
     * "open_url", "modify_time", "start_time", "end_time", "bid","advertiser_id",
     * "pricing", "flow_control_mode", "download_url","inventory_type", "schedule_type",
     * "app_type", "cpa_bid","cpa_skip_first_phrase", "audience", "external_url", "package",
     * "campaign_id", "ad_modify_time", "ad_create_time","audit_reject_reason", "retargeting_type",
     * "retargeting_tags","convert_id", "interest_tags", "hide_if_converted"
     *
     */
    protected $fields = [];
    
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
      /*  RequestCheckUtil::checkAllowField($this->fields, [
            "id", "name", "budget", "budget_mode", "status", "opt_status", "open_url",
            "modify_time", "start_time", "end_time", "bid", "advertiser_id", "pricing",
            "flow_control_mode", "download_url", "inventory_type", "schedule_type",
            "app_type", "cpa_bid", "cpa_skip_first_phrase", "audience", "external_url",
            "package", "campaign_id", "ad_modify_time", "ad_create_time", "audit_reject_reason",
            "retargeting_type", "retargeting_tags", "convert_id", "interest_tags", "hide_if_converted"
        ], 'fields');*/
    }


}
