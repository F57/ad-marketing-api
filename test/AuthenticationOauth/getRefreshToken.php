<?php
/**
 * 刷新access_token
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';

$auth = new ToutiaoSdk\ToutiaoAuth(APPID, SECRET);
print_r($auth->refreshToken(REFRESH_TOKEN));
