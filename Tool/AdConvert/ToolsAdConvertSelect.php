<?php
/**
 * 查询计划可用转化ID
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Tool\AdConvert;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;
use Couchbase\RegexpSearchQuery;

class ToolsAdConvertSelect extends RpcRequest
{
    protected $url = '/2/tools/ad_convert/select/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * @var string $external_url
     */
    protected $external_url;

    /**
     * @var string $package_name
     */
    protected $package_name;

    /**
     * @var string $itunes_url
     */
    protected $itunes_url;

    /**
     * @var array $fields
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

    /**
     * @throws \core\Exception\InvalidParamException
     */
    public function check()
    {
        RequestCheckUtil::checkNotNull($this->advertiser_id, 'advertiser_id');
    }
}
