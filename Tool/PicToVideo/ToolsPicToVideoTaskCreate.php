<?php
/**
 * 创建图片转视频任务
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Tool\PicToVideo;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ToolsPicToVideoTaskCreate extends RpcRequest
{
    protected $url = '/2/tools/pic_to_video/task/create/';
    protected $method = 'POST';
    protected $content_type = 'application/json';

    /**
     * 操作的广告主id
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 模版类型
     * @var string $template_type
     */
    protected $template_type;

    /**
     * 音乐名称
     * @var string $music_name
     */
    protected $music_name;

    /**
     * 回调地址，详见视频任务回调接口
     * @var string $callback_url
     */
    protected $callback_url;

    /**
     * 其他信息
     * @var array $other_info
     */
    protected $other_info;

    /**
     * 资源信息
     * @var array $map_id_resource
     */
    protected $map_id_resource;

    /**
     * 视频宽度
     * @var int $video_width
     */
    protected $video_width;

    /**
     * 视频高度
     * @var int $video_height
     */
    protected $video_height;

    /**
     * 是否resize图片，0表示不resize，1表示resize，默认为1
     * @var int $resize_image
     */
    protected $resize_image;

    /**
     * 是否拷贝资源，0表示不拷贝，1表示拷贝，默认为1
     * @var int $copy_resource
     */
    protected $copy_resource;

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
       RequestCheckUtil::checkNotNull($this->template_type, 'template_type');
       RequestCheckUtil::checkNotNull($this->music_name, 'music_name');
       RequestCheckUtil::checkNotNull($this->map_id_resource, 'map_id_resource');
    }
}
