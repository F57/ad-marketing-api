<?php
/**
 * 获取access_token
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace AuthenticationOauth;

use core\Profile\RpcRequest;

class GetAccessToken extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';

    protected $url = '/oauth2/access_token/';

    protected $cotent_type = 'application/json';

    protected $app_id;
    protected $secret;
    protected $grant_type;
    protected $auth_code;
}
