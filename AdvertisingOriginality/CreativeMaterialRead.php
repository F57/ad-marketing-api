<?php
/**
 * 创意素材信息
 * 披露广告创意素材信息(支持查询图片、标题、素材类型、对应计划ID等)。
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */
namespace AdvertisingOriginality;

use core\Profile\RpcRequest;

class CreativeMaterialRead extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'GET';
    protected $url = '/2/creative/material/read/';
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
     * 查询字段集合, 默认查询所有字段。详见下方response字段定义
     * 允许值: "id", "ad_id", "advertiser_id", "title", "image_info","image_mode", "opt_status"
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
