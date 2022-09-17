<?php
/**
 * 更新定向包
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace Tool\AudiencePackage;

use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class AudiencePackageUpdate extends RpcRequest
{
    protected $url = '/2/audience_package/update/';
    protected $method = 'GET';
    protected $content_type = 'application/json';

    /**
     * 操作的广告主id
     * @var int $advertiser_id
     */
    protected $advertiser_id;

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

    }
}
