<?php
/**
 * 获取地域列表
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Tool\QueryTool;

use core\Profile\RpcRequest;

class ToolsRegionGet extends RpcRequest
{
    protected $url = '/2/tools/region/get/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 地域类型，目前只支持：BUSINESS_DISTRICT(商圈)
     * @var string $region_type
     */
    protected $region_type;

    /**
     * 只获取某层级数据，详见【附录-地域层级】
     * @var string  $region_level
     */
    protected $region_level;

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
}
