<?php
/**
 * 修改转化ID
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Tool\AdConvert;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ToolsAdConvertUpdate extends RpcRequest
{
    protected $url = '/2/tools/ad_convert/update/';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 操作的广告主id
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 转化id
     * @var int $convert_id
     */
    protected $convert_id;

    /**
     * 下载链接
     * @var string $download_url
     */
    protected $download_url;
    
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
        RequestCheckUtil::checkNotNull($this->download_url, 'download_url');
    }
}
