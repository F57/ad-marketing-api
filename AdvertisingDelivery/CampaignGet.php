<?php
/**
 * 获取广告组
 * 获取广告组列表，可指定fields获取每个广告组的基本元素。
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace AdvertisingDelivery;

use core\Profile\RpcRequest;

class CampaignGet extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'GET';
    protected $url = '/2/campaign/get/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * 页数，默认值为1
     */
    protected $page;

    /**
     * 页面大小， 默认值为10
     */
    protected $page_size;

    /**
     * 过滤条件，若此字段不传，或传空则视为无限制条件(传json字符串)
     */
    protected $filtering;

    /**
     * 【过滤条件】广告组ID过滤，数组
     */
    protected $ids;

    /**
     * 【过滤条件】广告组名称过滤，支持模糊搜索
     */
    protected $campaign_name;

    /**
     * 【过滤条件】广告组推广目的过滤，详见【附录-推广目的类型】
     */
    protected $landing_type;

    /**
     * 【过滤条件】广告组状态过滤，默认为返回“所有不包含已删除”，如果要返回所有包含已删除有对应枚举表示，详见【附录-广告组状态】
     */
    protected $status;

    /**
     * 查询字段集合, 如果指定, 则返回结果数组中, 每个元素是包含所查询字段的字典允许值:
     * "id", "name", "budget", "budget_mode", "landing_type","status","modify_time"
     */
    protected $fields;

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
