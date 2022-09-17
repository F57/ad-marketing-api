<?php
/**
 * 刷新access_token
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace AuthenticationOauth;

use core\Profile\RpcRequest;

class RefreshToken extends RpcRequest
{
    /**
     * @var string
     */
    protected $method = 'POST';
    protected $url = '/oauth2/refresh_token/';

    protected $app_id;
    protected $secret;
    protected $grant_type;
    protected $refresh_token;
}
