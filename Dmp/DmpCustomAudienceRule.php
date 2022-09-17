<?php
/**
 * 规则人群包
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Dmp;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class DmpCustomAudienceRule extends RpcRequest
{
    protected $url = '/2/dmp/custom_audience/rule/';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 人群包标签 字符串长度取值范围: 1..20
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
     * DMP规则类型，详见【附录-DMP规则类型】
     * @var string $profile_type
     */
    protected $profile_type;

    /**
     * DMP规则描述，数组
     * @var array $profiles
     */
    protected $profiles;
    
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
        RequestCheckUtil::checkNotNull($this->tag, 'tag');
        RequestCheckUtil::checkNotNull($this->name, 'name');
        RequestCheckUtil::checkNotNull($this->profile_type, 'profile_type');
        RequestCheckUtil::checkNotNull($this->profiles, 'profiles');
    }
}
