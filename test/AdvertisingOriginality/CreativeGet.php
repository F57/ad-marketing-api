<?php
/**
 * 获取创意列表
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';
$auth = new ToutiaoSdk\ToutiaoAuth(APPID, SECRET);
$client = $auth->makeClient(TOKEN);
$args = [];
$req = $client::AdvertisingOriginality()->CreativeGet()->setArgs($args)->send();
var_dump($req->getBody());
