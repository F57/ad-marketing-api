<?php
/**
 * 获取纵横组织下所有主体信息
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Advertiser;

use core\Exception\InvalidParamException;
use core\Helper\RequestCheckUtil;
use core\Profile\RpcRequest;

class MajordomoCompanyInfo extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'GET';
    protected $url = '/v3.0/business_platform/company_info/get/';
    protected $content_type = 'application/json';

    /**
     * 纵横组织id
     */
    protected $organization_id;

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
     *
     * @throws InvalidParamException
     */
    public function check()
    {
        RequestCheckUtil::checkNotNull($this->organization_id, 'organization_id');
    }


}

