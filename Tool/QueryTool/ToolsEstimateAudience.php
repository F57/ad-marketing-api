<?php
/**
 * 查询受众预估结果
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Tool\QueryTool;

use core\Profile\RpcRequest;

class ToolsEstimateAudience extends RpcRequest
{
    protected $url = '/2/tools/estimate_audience/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

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
     * 受众运营商, 详见【附录-受众运营商类型】
     * 允许值: "MOBILE", "UNICOM", "TELCOM"
     * @var array $carrier
     */
    protected $carrier;

    /**
     * 受众网络类型, 详见【附录-受众网络类型】
     * 允许值: "WIFI", "2G", "3G", "4G"
     * @var array $ac
     */
    protected $ac;

    /**
     * 受众手机品牌, 详见【附录-手机品牌】
     * 允许值: "APPLE", "HUAWEI", "XIAOMI", "SAMSUNG", "OPPO", "VIVO","MEIZU",
     * "GIONEE", "COOLPAD", "LENOVO", "LETV", "ZTE","CHINAMOBILE", "HTC", "PEPPER",
     * "NUBIA", "HISENSE", "QIKU", "TCL","SONY", "SMARTISAN", "360", "ONEPLUS", "LG",
     * "MOTO", "NOKIA","GOOGLE"
     * @var array $device_brand
     */
    protected $device_brand;

    /**
     * 用户首次激活时间, 详见【附录-用户首次激活时间】
     * 允许值: "WITH_IN_A_MONTH", "ONE_MONTH_2_THREE_MONTH","THREE_MONTH_EAILIER"
     * @var array $activate_type
     */
    protected $activate_type;

    /**
     *
     * 受众平台(当推广目的landing_type=APP时,不填,且为保证投放效果,平台类型定向PC与移动端互斥), 详见【附录-受众平台类型】
     * 允许值: "ANDROID", "IOS", "PC"
     * @var array $platform
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
}


