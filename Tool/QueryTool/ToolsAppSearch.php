<?php
/**
 * 查询应用信息
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Tool\QueryTool;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class ToolsAppSearch extends RpcRequest
{
    protected $url = '/2/tools/app_search/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 广告主ID
     * @var string $advertiser_id
     */
    protected $advertiser_id;

    /**
     * @var string 查询条件
     * APP_NAME:按名称搜索，APP_ID:按ID搜索
        默认值: APP_NAME
        允许值: "APP_NAME", "APP_ID"
     */
    protected $search_by;

    /**
     * 搜索关键字，search_by=APP_NAME时必填
     * @var string $app_name
     */
    protected $app_name;

    /**
     * 应用的ID，search_by=APP_ID时必填
     * @var integer
     */
    protected $app_id;

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
