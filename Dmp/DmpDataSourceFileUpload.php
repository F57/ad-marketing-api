<?php
/**
 * 数据源文件上传
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Dmp;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class DmpDataSourceFileUpload extends RpcRequest
{
    protected $url = '/2/dmp/data_source/file/upload/';
    protected $method = 'POST';
    protected $content_type = 'multipart/form-data';

    /**
     * 广告主ID
     * @var integer $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 文件
     * @var string $file
     */
    protected $file;

    /**
     * 文件MD5
     * @var string $file_signature
     */
    protected $file_signature;
    
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
        RequestCheckUtil::checkFileExist($this->file, 'file');
    }
}
