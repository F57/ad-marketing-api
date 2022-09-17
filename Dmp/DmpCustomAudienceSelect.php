<?php
/**
 * 人群包列表
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Dmp;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class DmpCustomAudienceSelect extends RpcRequest
{
    protected $url = '/2/dmp/custom_audience/select/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 查询类型, 0: 属于该广告主的人群包, 1: 该广告主可用的人群包.
     * @var int $select_type
     */
    protected $select_type;

    /**
     * 偏移,类似于SQL中offset(起始为0,翻页时new_offset=old_offset+limit) 默认值: 0
     * @var int $offset
     */
    protected $offset;

    /**
     * 返回数据量 默认值: 30
     * @var int $limit
     */
    protected $limit;

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
        RequestCheckUtil::checkNotNull($this->select_type, 'select_type');
    }
}
