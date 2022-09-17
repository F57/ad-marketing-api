<?php
/**
 * 修改广告计划
 * 创建和更新广告计划接口支持同时选择包含和排除人群包
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace AdvertisingPlan;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class AdUpdate extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/2/ad/update/';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     */
    protected $advertiser_id;

    /**
     * 计划ID
     */
    protected $ad_id;

    /**
     * 时间戳
     */
    protected $modify_time;

    /**
     * （不可修改）投放范围
     * 默认值: DEFAULT
     * 允许值: "DEFAULT", "UNION"
     */
    protected $delivery_range;

    /**
     * （不可修改）广告预算类型
     * 允许值: "BUDGET_MODE_DAY", "BUDGET_MODE_TOTAL"
     */
    protected $budget_mode;

    /**
     * 广告预算
     */
    protected $budget;

    /**
     * 广告投放起始时间，形式如：2017-01-01 00:00
     */
    protected $start_time;

    /**
     * 广告投放结束时间，形式如：2017-01-01 00:00
     */
    protected $end_time;

    /**
     * 广告出价
     */
    protected $bid;

    /**
     * （不可修改）广告出价类型
     */
    protected $pricing;

    /**
     * 广告投放时间类型
     * 允许值: "SCHEDULE_FROM_NOW", "SCHEDULE_START_END"
     */
    protected $schedule_type;

    /**
     * 广告投放时段
     */
    protected $schedule_time;

    /**
     * 广告投放速度类型
     */
    protected $flow_control_mode;

    /**
     * 应用直达链接
     */
    protected $open_url;

    /**
     * （创建后不可修改）应用下载方式
     */
    protected $download_type;

    /**
     * 对于转化为目标的计划如OCPM、CPA计划进入审核后将不允许更改，
     * 即计划下创建创意后不可更改，非转化为目标的计划如CPC、CPM计划可用更改无此限制）
     * 广告落地页链接（当推广目的landing_type=LINK 或者landing_type=APP&download_type=EXTERNAL_URL 时必填）
     */
    protected $external_url;

    /**
     * （对于转化为目标的计划如OCPM、CPA计划进入审核后将不允许更改，即计划下创建创意后不可更改，
     * 非转化为目标的计划如CPC、CPM计划可用更改无此限制）广告应用下载链接
     * （当推广目的landing_type=APP&download_type=DOWNLOAD_URL时必填，landing_type=LINK时不填）
     */
    protected $download_url;

    /**
     * 广告名称
     */
    protected $name;

    /**
     * （计划进入审核后不允许再更改，即计划下创建创意后不可更改）
     * 广告应用下载类型
     * (当campaign的landing_type=APP&download_type=DOWNLOAD_URL时必填，landing_type=LINK或者download_type=EXTERNAL_URL时不填)
     * 允许值: "APP_ANDROID", "APP_IOS"
     */
    protected $app_type;

    /**
     * （计划进入审核后不允许再更改，即计划下创建创意后不可更改）
     * 广告应用下载包名(应用下载类型时,必填)
     */
    protected $package;

    /**
     * ocpm广告转化出价
     * （如果是CPC、CPM出价方式的计划请填写bid字段，如果是OCPM出价方式的计划请填写cpq_bid字段）
     */
    protected $cpa_bid;

    /**
     * 过滤已转化用户类型字段
     */
    protected $hide_if_converted;

    /**
     * 过滤已安装，当推广目标为安卓应用下载时可填，0表示不过滤，1表示过滤，默认为不过滤
     * 默认值: 0
     * 允许值: 0, 1
     */
    protected $hide_if_exists;

    /**
     * 定向人群包列表，内容为人群包id
     */
    protected $retargeting_tags_include;

    /**
     * 排除人群包列表，内容为人群包id
     */
    protected $retargeting_tags_exclude;

    /**
     * 受众性别
     * 允许值: "GENDER_FEMALE", "GENDER_MALE", "NONE"
     */
    protected $gender;

    /**
     * 受众年龄区间
     * 允许值: "AGE_BELOW_18", "AGE_BETWEEN_18_23", "AGE_BETWEEN_24_30","AGE_BETWEEN_31_40", "AGE_BETWEEN_41_49", "AGE_ABOVE_50"
     */
    protected $age;

    /**
     * 受众最低android版本
     * 允许值: "0.0", "2.0", "2.1", "2.2", "2.3", "3.0", "3.1", "3.2", "4.0","4.1", "4.2", "4.3", "4.4", "4.5", "5.0", "NONE"
     */
    protected $android_osv;

    /**
     * 受众最低ios版本
     * 允许值: "0.0", "4.0", "4.1", "4.2", "4.3", "5.0", "5.1", "6.0", "7.0","7.1", "8.0", "8.1", "8.2", "9.0", "NONE"
     */
    protected $ios_osv;

    /**
     * 受众网络类型
     * 允许值: "WIFI", "2G", "3G", "4G"
     */
    protected $ac;

    /**
     * 受众手机品牌
     * 允许值: "APPLE", "HUAWEI", "XIAOMI", "SAMSUNG", "OPPO", "VIVO","MEIZU", "GIONEE",
     * "COOLPAD", "LENOVO", "LETV", "ZTE","CHINAMOBILE", "HTC", "PEPPER", "NUBIA", "HISENSE",
     * "QIKU", "TCL","SONY", "SMARTISAN", "360", "ONEPLUS", "LG", "MOTO", "NOKIA","GOOGLE"
     */
    protected $device_brand;

    /**
     * 用户首次激活时间
     * 允许值: "WITH_IN_A_MONTH", "ONE_MONTH_2_THREE_MONTH","THREE_MONTH_EAILIER"
     */
    protected $activate_type;

    /**
     * 受众文章分类
     * 允许值: "ENTERTAINMENT", "SOCIETY", "CARS", "INTERNATIONAL","HISTORY", "SPORTS",
     * "HEALTH", "MILITARY", "EMOTION", "FASHION","PARENTING", "FINANCE", "AMUSEMENT",
     * "DIGITAL", "EXPLORE", "TRAVEL","CONSTELLATION", "STORIES", "TECHNOLOGY", "GOURMET",
     * "CULTURE","HOME", "MOVIE", "PETS", "GAMES", "WEIGHT_LOSING", "FREAK","EDUCATION",
     * "ESTATE", "SCIENCE", "PHOTOGRAPHY", "REGIMEN", "ESSAY","COLLECTION", "ANIMATION",
     * "COMICS", "TIPS", "DESIGN", "LOCAL","LAWS", "GOVERNMENT", "BUSINESS", "WORKPLACE",
     * "RUMOR_CRACKER","GRADUATES"
     */
    protected $article_category;

    /**
     * 受众平台
     * 允许值: "ANDROID", "IOS", "PC"
     */
    protected $platform;

    /**
     * 受众运营商
     * 允许值: "MOBILE", "UNICOM", "TELCOM"
     */
    protected $carrier;

    /**
     * 地域定向城市或者区县列表
     */
    protected $city;

    /**
     * 地域类型，前者为省市，后者为区县。当city有数据时，必填。
     * 允许值: "CITY", "COUNTY", "NONE"
     */
    protected $district;

    /**
     * 受众位置类型
     */
    protected $location_type;

    /**
     * 兴趣分类
     * 如果传空数组 [] 表示不限，如果只传[0]表示系统推荐,如果按兴趣类型传表示自定义
     */
    protected $ad_tag;

    /**
     * 广告名称
     */
    protected $interest_tags;

    /**
     * APP行为定向
     * 允许值: "CATEGORY", "APP", "NONE"
     */
    protected $app_behavior_target;

    /**
     * APP行为定向
     */
    protected $app_category;

    /**
     * APP行为定向
     */
    protected $app_ids;

    /**
     * 产品目录ID
     */
    protected $product_platform_id;

    /**
     * H5地址参数
     */
    protected $external_url_params;

    /**
     * 直达链接参数
     */
    protected $open_url_params;

    /**
     * 是否自定义商品定向
     */
    protected $dpa_local_audience;

    /**
     * 包含人群包
     */
    protected $include_custom_actions;

    /**
     * 排除人群包
     */
    protected $exclude_custom_actions;
    
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
 /*       RequestCheckUtil::checkAllowField($this->budget_mode, ["BUDGET_MODE_DAY", "BUDGET_MODE_TOTAL"], 'budget_mode');
        RequestCheckUtil::checkAllowField($this->delivery_range, ["BUDGET_MODE_DAY", "BUDGET_MODE_TOTAL"], 'delivery_range');
        RequestCheckUtil::checkAllowField($this->schedule_type, ["SCHEDULE_FROM_NOW", "SCHEDULE_START_END"], 'schedule_type');
        RequestCheckUtil::checkAllowField($this->app_type, ["APP_ANDROID", "APP_IOS"], 'app_type');
        RequestCheckUtil::checkAllowField($this->hide_if_exists, [0, 1], 'hide_if_exists');
        RequestCheckUtil::checkAllowField($this->gender, ["GENDER_FEMALE", "GENDER_MALE", "NONE"], 'gender');
        RequestCheckUtil::checkAllowField($this->age, [
            "AGE_BELOW_18", "AGE_BETWEEN_18_23", "AGE_BETWEEN_24_30", "AGE_BETWEEN_31_40", "AGE_BETWEEN_41_49", "AGE_ABOVE_50"
        ], 'age');
        RequestCheckUtil::checkAllowField($this->flow_control_mode, [
            "FLOW_CONTROL_MODE_FAST", "FLOW_CONTROL_MODE_SMOOTH", "FLOW_CONTROL_MODE_BALANCE"
        ], 'flow_control_mode');
        RequestCheckUtil::checkAllowField($this->android_osv, [
            "0.0", "2.0", "2.1", "2.2", "2.3", "3.0", "3.1", "3.2", "4.0", "4.1", "4.2", "4.3", "4.4", "4.5", "5.0", "NONE"
        ], 'android_osv');
        RequestCheckUtil::checkAllowField($this->ios_osv, [
            "0.0", "4.0", "4.1", "4.2", "4.3", "5.0", "5.1", "6.0", "7.0", "7.1", "8.0", "8.1", "8.2", "9.0", "NONE"
        ], 'ios_osv');
        RequestCheckUtil::checkAllowField($this->ac, [
            "WIFI", "2G", "3G", "4G"
        ], 'ac');
        RequestCheckUtil::checkAllowField($this->device_brand, [
            "APPLE", "HUAWEI", "XIAOMI", "SAMSUNG", "OPPO", "VIVO", "MEIZU", "GIONEE", "COOLPAD",
            "LENOVO", "LETV", "ZTE", "CHINAMOBILE", "HTC", "PEPPER", "NUBIA", "HISENSE", "QIKU",
            "TCL", "SONY", "SMARTISAN", "360", "ONEPLUS", "LG", "MOTO", "NOKIA", "GOOGLE"
        ], 'device_brand');
        RequestCheckUtil::checkAllowField($this->activate_type, [
            "WITH_IN_A_MONTH", "ONE_MONTH_2_THREE_MONTH", "THREE_MONTH_EAILIER"
        ], 'activate_type');
        RequestCheckUtil::checkAllowField($this->article_category, [
            "ENTERTAINMENT", "SOCIETY", "CARS", "INTERNATIONAL", "HISTORY", "SPORTS",
            "HEALTH", "MILITARY", "EMOTION", "FASHION", "PARENTING", "FINANCE", "AMUSEMENT",
            "DIGITAL", "EXPLORE", "TRAVEL", "CONSTELLATION", "STORIES", "TECHNOLOGY", "GOURMET",
            "CULTURE", "HOME", "MOVIE", "PETS", "GAMES", "WEIGHT_LOSING", "FREAK", "EDUCATION",
            "ESTATE", "SCIENCE", "PHOTOGRAPHY", "REGIMEN", "ESSAY", "COLLECTION", "ANIMATION",
            "COMICS", "TIPS", "DESIGN", "LOCAL", "LAWS", "GOVERNMENT", "BUSINESS", "WORKPLACE",
            "RUMOR_CRACKER", "GRADUATES"
        ], 'article_category');
        RequestCheckUtil::checkAllowField($this->platform, ["ANDROID", "IOS", "PC"], 'platform');
        RequestCheckUtil::checkAllowField($this->carrier, ["MOBILE", "UNICOM", "TELCOM"], 'carrier');
        RequestCheckUtil::checkAllowField($this->district, ["CITY", "COUNTY", "NONE"], 'district');
        RequestCheckUtil::checkAllowField($this->app_behavior_target, ["CATEGORY", "APP", "NONE"], 'app_behavior_target');*/
    }
}
