<?php
/**
 * 更新动态创意词包
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Tool\CreativeWord;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ToolsCreativeWordUpdate extends RpcRequest
{
     protected $url = '/2/tools/creative_word/update/';
     protected $method = 'POST';
     protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var int $advertiser_id
     */
    protected $advertiser_id;

    /**
     * 创意词包ID
     * @var int $creative_word_id
     */
    protected $creative_word_id;

    /**
     * 创意词包名称
     * @var string $name
     */
    protected $name;

    /**
     * 默认词
     * @var string $default_word
     */
    protected $default_word;

    /**
     * 替换词
     * @var array $words
     */
    protected $words;

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
        RequestCheckUtil::checkNotNull($this->creative_word_id, 'creative_word_id');
    }
}
