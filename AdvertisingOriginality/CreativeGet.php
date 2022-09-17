<?php
/**
 * 获取创意列表
 * 通过新版的创意列表接口较老版creative/select接口增加创意的视频ID、创意拒绝理由的返回，
 * 除此之外新版接口支持多维度的fields过滤，能给你带来更好的使用体验。
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */
namespace AdvertisingOriginality;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class CreativeGet extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'GET';
    protected $url = '/2/creative/get/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * 页数(可选)
     */
    protected $page;

    /**
     * 页面大小(可选)
     */
    protected $page_size;

    /**
     * 过滤条件 (可选)
     * 若此字段不传，或传空则视为无限制条件，查看账号总创意。
     */
    protected $filtering;

    /**
     * (可选)
     * 【过滤条件】按照campaign_id过滤
     */
    protected $campaign_id;

    /**
     * (可选)
     * 【过滤条件】按照ad_id过滤
     */
    protected $ad_id;

    /**
     * (可选)
     * 【过滤条件】按照creative_id过滤
     */
    protected $creative_ids;

    /**
     * (可选)
     * 【过滤条件】按照creative_title过滤，支持模糊搜索
     */
    protected $creative_title;

    /**
     * (可选)
     * 【过滤条件】按照广告组推广目的过滤
     */
    protected $landing_type;

    /**
     * (可选)
     * 【过滤条件】按照ad出价方式过滤
     */
    protected $pricing;

    /**
     * (可选)
     * 【过滤条件】按照创意状态过滤，默认为返回“所有不包含已删除”，如果要返回所有包含已删除有对应枚举表示，详见【附录-广告创意状态】
     */
    protected $status;

    /**
     * (可选)
     * 【过滤条件】按照创意素材类型过滤
     */
    protected $image_mode;

    /**
     * (可选)
     * 查询字段集合, 如果指定, 则返回结果数组中, 每个元素是包含所查询字段的字典，默认全部指定
     * 允许值: "creative_id", "ad_id", "advertiser_id", "status","opt_status",
     * "image_mode", "title", "creative_word_ids","third_party_id", "image_ids",
     * "image_id", "video_id","audit_reject_reason", "materials"
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
