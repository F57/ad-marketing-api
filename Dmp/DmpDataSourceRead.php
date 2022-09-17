<?php
/**
 * 数据源详细信息
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Dmp;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class DmpDataSourceRead extends RpcRequest
{
    protected $url = '/2/dmp/data_source/read/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 数据源ID列表
     * @var array $data_source_id_list
     */
    protected $data_source_id_list;
    
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
        RequestCheckUtil::checkNotNull($this->data_source_id_list, 'data_source_id_list');
    }
}
