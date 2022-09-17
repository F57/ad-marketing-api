<?php
/**
 * 数据源更新
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Dmp;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class DmpDataSourceUpdate extends RpcRequest
{
    protected $url = '/2/dmp/data_source/update/';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 数据源ID
     * @var string $data_source_id
     */
    protected $data_source_id;

    /**
     * 更新操作类型, 1: 添加append, 2: 删除delete, 3:重置 reset
     * @var int $operation_type
     */
    protected $operation_type;

    /**
     * 数据格式, 0: ProtocolBuffer
     * @var int $data_format
     */
    protected $data_format;

    /**
     * 数据存储类型, 0: API
     * @var int $file_storage_type
     */
    protected $file_storage_type;

    /**
     * 通过上传接口得到的文件路径
     * @var array $file_paths
     */
    protected $file_paths;
    
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
        RequestCheckUtil::checkNotNull($this->data_source_id, 'date_source_id');
        RequestCheckUtil::checkNotNull($this->operation_type, 'operation_type');
        RequestCheckUtil::checkNotNull($this->data_format, 'data_format');
        RequestCheckUtil::checkNotNull($this->file_storage_type, 'file_storage_type');
        RequestCheckUtil::checkNotNull($this->file_paths, 'file_paths');
    }
}
