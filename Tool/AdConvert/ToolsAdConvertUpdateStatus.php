<?php
/**
 * 更新转化状态
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Tool\AdConvert;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ToolsAdConvertUpdateStatus extends RpcRequest
{
    protected $url = '/2/tools/ad_convert/update_status/';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 操作的广告主id
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 转化ID
     * @var int $convert_id
     */
    protected $convert_id;

    /**
     * 操作状态，详见【附录-操作状态】, 允许值：
     * "AD_CONVERT_OPT_STATUS_ENABLE",
     * "AD_CONVERT_OPT_STATUS_DISABLE",
     * "AD_CONVERT_OPT_STATUS_PAUSE"
     *
     * @var string $opt_status
     */
    protected $opt_status;
    
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
        RequestCheckUtil::checkNotNull($this->convert_id, 'convert_id');
        RequestCheckUtil::checkNotNull($this->opt_status, 'opt_status');
    }
}
