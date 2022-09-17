<?php
/**
 * 创建转化ID
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Tool\AdConvert;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;
use Report\ReportAdGet;

class ToolsAdConvertCreate extends RpcRequest
{
    protected $url = '/2/tools/ad_convert/create/';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 操作的广告主id
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 转化名称
     * @var string $name
     */
    protected $name;

    /**
     * 转化来源，详见【附录-转化工具来源】，默认为AD_CONVERT_SOURCE_TYPE_APP_DOWNLOAD
     * @var string $convert_source_type
     */
    protected $convert_source_type;

    /**
     * 下载链接
     * @var string $download_url
     */
    protected $download_url;

    /**
     * 应用类型
     * 允许值: "APP_ANDROID", "APP_IOS"
     * @var string $app_type
     */
    protected $app_type;

    /**
     * 转化监测链接
     * @var string $action_track_url
     */
    protected $action_track_url;

    /**
     * 包名
     * @var string $package_name
     */
    protected $package_name;

    /**
     * 转化类型，详见【附录-转化类型】
     * @var string $convert_type
     */
    protected $convert_type;

    /**
     * XPath转化路径
     * @var string $convert_xpath_value
     */
    protected $convert_xpath_value;

    /**
     * XPath转化页面地址
     * @var string $convert_xpath_url
     */
    protected $convert_xpath_url;

    /**
     * 落地页地址
     * @var string $external_url
     */
    protected $external_url;

    /**
     * APP ID
     * @var string $app_id
     */
    protected $app_id;

    /**
     * 直达链接
     * @var string $open_url
     */
    protected $open_url;

    /**
     *
     * 深度转化目标，详见【附录-深度转化类型】
     * "AD_CONVERT_TYPE_ACTIVE_REGISTER"
     * "AD_CONVERT_TYPE_PAY"
     * "AD_CONVERT_TYPE_NEXT_DAY_OPEN"
     * @var string
     */
    protected $deep_external_action;
    
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
        RequestCheckUtil::checkNotNull($this->advertiser_id, 'advertiser_id');
        RequestCheckUtil::checkNotNull($this->name, 'name');
    }
}
