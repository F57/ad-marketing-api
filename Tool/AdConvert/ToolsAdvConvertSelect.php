<?php
/**
 * 转化ID列表
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Tool\AdConvert;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ToolsAdvConvertSelect extends RpcRequest
{
    protected $url = '/2/tools/adv_convert/select/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 操作的广告主id
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 需要查询的convert_ids，如不填写默认返回所有的转化ID
     * @var array $convert_ids
     */
    protected $convert_ids;

    /**
     * 操作状态
     * @var string $opt_status
     */
    protected $opt_status;

    /**
     * 页数 默认值： 1
     * @var int $page
     */
    protected $page;

    /**
     * 页面大小 默认值： 10
     * @var int $page_size
     */
    protected $page_size;
    
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
