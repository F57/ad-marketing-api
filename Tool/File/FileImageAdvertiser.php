<?php
/**
 * 广告主图片
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Tool\File;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;
use Tool\CreativeWord\ToolsCreativeWordCreate;

class FileImageAdvertiser extends RpcRequest
{
    protected $url = '/2/file/image/advertiser/';
    protected $method = 'POST';
    protected $content_type = 'multipart/form-data';

    /**
     * 广告主ID
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 图片上传方式
     * 默认值: UPLOAD_BY_FILE
     * 允许值: "UPLOAD_BY_FILE", "UPLOAD_BY_URL"
     * @var string $upload_type
     */
    protected $upload_type = 'UPLOAD_BY_FILE';

    /**
     * 图片的md5(用于服务端校验)，upload_type为UPLOAD_BY_FILE必填
     * @var string $image_signature
     */
    protected $image_signature;

    /**
     * 图片文件,格式jpg, jpeg, png, bmp, gif, 大小1M内，upload_type为UPLOAD_BY_FILE必填
     * @var string $image_file
     */
    protected $image_file;

    /**
     * 图片url地址，如http://xxx.xxx，upload_type为UPLOAD_BY_URL必填
     * @var string $image_url
     */
    protected $image_url;

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
        if ($this->upload_type == 'UPLOAD_BY_URL') {
            $this->content_type = 'application/json';
            RequestCheckUtil::checkNotNull($this->image_url, 'image_url');
        } else {
            RequestCheckUtil::checkNotNull($this->image_signature, 'image_signature');
            RequestCheckUtil::checkNotNull($this->image_file, 'image_file');
        }
    }
}
