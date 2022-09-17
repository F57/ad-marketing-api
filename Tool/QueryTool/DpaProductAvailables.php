<?php
/**
 * 查询DPA商品库可用类型
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Tool\QueryTool;

use core\Profile\RpcRequest;

class DpaProductAvailables extends RpcRequest
{
    protected $url = '/2/dpa/product/availables/';
    protected $method = 'GET';
    protected $content_type = 'application/json';
}
