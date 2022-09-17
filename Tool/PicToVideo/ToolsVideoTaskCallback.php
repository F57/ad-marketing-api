<?php
/**
 * 视频任务回调接口
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Tool\PicToVideo;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ToolsVideoTaskCallback extends RpcRequest
{
    protected $url = '';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 模版类型
     * @var string $template_category
     */
    protected $template_category;

    /**
     * @var int $template_id
     */
    protected $template_id;

    /**
     * @var string $video_uri
     */
    protected $video_uri;

    /**
     * @var int $errcode
     */
    protected $errcode;

    /**
     * @var string $errmsg
     */
    protected $errmsg;

    /**
     * @var array $video_detail
     */
    protected $video_detail;

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
        RequestCheckUtil::checkNotNull($this->template_category, 'template_category');
        RequestCheckUtil::checkNotNull($this->template_id, 'template_id');
        RequestCheckUtil::checkNotNull($this->video_uri, 'video_uri');
        RequestCheckUtil::checkNotNull($this->errcode, 'errcode');
        RequestCheckUtil::checkNotNull($this->errmsg, 'errmsg');
        RequestCheckUtil::checkNotNull($this->video_detail, 'video_detail');
    }
}
