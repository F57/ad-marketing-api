<?php
/**
 * 查询建议出价
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Tool\QueryTool;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ToolsBidSuggest extends RpcRequest
{
    protected $url = '/2/tools/bid/suggest/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var string $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 出价类型，查看【附录-出价类型】
     * @var string $pricing
     */
    protected $pricing;

    /**
     * 定向人群包类型,详见【附录-定向人群包类型】
     * 允许值: "RETARGETING_INCLUDE", "RETARGETING_EXCLUDE","RETARGETING_NONE"
     * @var string $retargeting_type
     */
    protected $retargeting_type;

    /**
     * 当选择使用人群包定向时填写，内容为人群包id
     * @var array $retargeting_tags
     */
    protected $retargeting_tags;

    /**
     * 受众性别, 详见【附录-受众性别】
     * 允许值: "GENDER_FEMALE", "GENDER_MALE"
     * @var string $gender
     */
    protected $gender;

    /**
     * 受众年龄区间, 详见【附录-受众年龄区间】
     * 允许值: "AGE_BELOW_18", "AGE_BETWEEN_18_23", "AGE_BETWEEN_24_30","AGE_BETWEEN_31_40", "AGE_BETWEEN_41_49", "AGE_ABOVE_50"
     * @var array $age
     */
    protected $age;

    /**
     * 受众最低ios版本(当推广应用下载iOS时选填,其余情况不填), 详见【附录-受众ios版本】
     * 允许值: "0.0", "4.0", "4.1", "4.2", "4.3", "5.0", "5.1", "6.0", "7.0","7.1", "8.0", "8.1", "8.2", "9.0"
     * @var string $ios_osv
     */
    protected $ios_osv;

    /**
     * 受众网络类型, 详见【附录-受众网络类型】
     * 允许值: "WIFI", "2G", "3G", "4G"
     * @var array $ac
     */
    protected $ac;

    /**
     * 受众平台(当推广目的landing_type=APP时,不填,且为保证投放效果,平台类型定向PC与移动端互斥), 详见【附录-受众平台类型】
     * 允许值: "ANDROID", "IOS", "PC"
     * @var array $platform
     */
    protected $platform;

    /**
     * 地域定向城市列表(当传递省份ID时,旗下市县ID可省略不传), 详见【附件-city.json】
     * @var array $city
     */
    protected $city;

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
        RequestCheckUtil::checkNotNull($this->pricing, 'pricing');
    }
}
