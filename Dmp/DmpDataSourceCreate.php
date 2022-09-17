<?php
/**
 * 数据源创建
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Dmp;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class DmpDataSourceCreate extends RpcRequest
{
    protected $url = '/2/dmp/data_source/create/';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 数据源名称, 限30个字符内（使用API通过上传数据源方式创建的人群包生成后人群包名称会与数据源名称一致，人群包标签会默认为“API文件数据源”）
     * @var string $data_source_name
     */
    protected $data_source_name;

    /**
     * 数据源描述, 限256字符内
     * @var string $description
     */
    protected $description;

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
        RequestCheckUtil::checkNotNull($this->data_source_name, 'data_source_name');
        RequestCheckUtil::checkNotNull($this->description, 'description');
        RequestCheckUtil::checkNotNull($this->data_format, 'data_format');
        RequestCheckUtil::checkNotNull($this->file_storage_type, 'file_storage_type');
        RequestCheckUtil::checkNotNull($this->file_paths, 'file_paths');
    }
}
