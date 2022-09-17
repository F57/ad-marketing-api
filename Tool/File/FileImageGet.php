<?php
/**
 * 获取图片素材库
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Tool\File;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;
use Tool\CreativeWord\ToolsCreativeWordCreate;

class FileImageGet extends RpcRequest
{
    protected $url = '/2/file/image/get/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var string $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 图片过滤条件
     * 允许值: "width", "height", "ratio", "image_ids"
     * @var array $filtering
     */
    protected $filtering;

    /**
     * 页码，默认值1
     * @var int $page
     */
    protected $page;

    /**
     * 页面大小，默认值20
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
