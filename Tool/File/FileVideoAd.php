<?php
/**
 * 上传视频
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Tool\File;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class FileVideoAd extends RpcRequest
{
    protected $url = '/2/file/video/ad/';
    protected $method = 'POST';
    protected $content_type = 'multipart/form-data';
    protected $timeout = 600;

    /**
     * 广告主ID
     * @var string $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 视频的md5(用于服务端校验)
     * @var string $video_signature
     */
    protected $video_signature;

    /**
     * 视频文件,格式mp4、mpeg、3gp、avi
     * @var string $video_file
     */
    protected $video_file;

    /**
     * 视频文件名,
     * @var string $filename
     */
    protected $filename;

    /**
     * @return string
     */
    public function getAdvertiserId()
    {
        return $this->advertiser_id;
    }

    /**
     * @param string $advertiser_id
     * @return $this
     */
    public function setAdvertiserId($advertiser_id)
    {
        $this->params["advertiser_id"] = $advertiser_id;
        $this->advertiser_id = $advertiser_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getVideoSignature()
    {
        return $this->video_signature;
    }

    /**
     * @param string $video_signature
     * @return $this
     */
    public function setVideoSignature($video_signature)
    {
        $this->params["video_signature"] = $video_signature;
        $this->video_signature = $video_signature;
        return $this;
    }

    /**
     * @return string
     */
    public function getVideoFile()
    {
        return $this->video_file;
    }

    /**
     * @param string $video_file
     * @return $this
     */
    public function setVideoFile($video_file)
    {
        $this->params["video_file"] = '@' . $video_file;
        $this->video_file = $video_file;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->filename;
    }

    /**
     * @param string $upload_type
     * @return $this
     */
    public function setFileName($filename)
    {
        $this->params["filename"] = $filename;
        $this->filename = $filename;
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
