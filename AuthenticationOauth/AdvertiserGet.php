<?php
/**
 * 获取access_token
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace AuthenticationOauth;

use core\Profile\RpcRequest;

class AdvertiserGet extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'GET';

    protected $url = '/oauth2/advertiser/get/';

    protected $cotent_type = 'application/json';

    protected $app_id;
    protected $secret;
    protected $access_token;
}
