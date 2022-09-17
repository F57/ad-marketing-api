<?php
/**
 * 拓展人群包
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Dmp;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class DmpCustomAudienceLookalike extends RpcRequest
{
    protected $url = '/2/dmp/custom_audience/lookalike/';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 目标人群包ID（从哪个人群包进行扩展，目标人群包不能是扩展人群包）
     * @var int $custom_audience_id
     */
    protected $custom_audience_id;

    /**
     * 人群包标签，即人群分组，您可以自定义，用于给拓展后的人群包打标签便于您分类管理。
     * 字符串长度取值范围: 1..20
     * @var string $tag
     */
    protected $tag;

    /**
     * 人群包名称
     * 字符串长度取值范围: 1..20
     * @var string $name
     */
    protected $name;

    /**
     * 扩展数量
     * 取值范围: 1-10000000
     * @var int $lookalike_num
     */
    protected $lookalike_num;

    /**
     * 扩展设备，NONE为不限
     * 默认值: NONE
     * 允许值: "NONE", "IOS", "ANDROID"
     * @var string $platform
     */
    protected $platform;
    
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
        RequestCheckUtil::checkNotNull($this->custom_audience_id, 'custom_audience_id');
        RequestCheckUtil::checkNotNull($this->tag, 'tag');
        RequestCheckUtil::checkNotNull($this->name, 'name');
        RequestCheckUtil::checkNotNull($this->lookalike_num, 'lookalike_num');
    }
}
