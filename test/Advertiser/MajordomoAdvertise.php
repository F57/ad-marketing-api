<?php
/**
 * 创建广告组
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';
$auth = new ToutiaoSdk\ToutiaoAuth(APPID, SECRET);
$client = $auth->makeClient(TOKEN);
$args = [];
$req = $client::Advertiser()->majordomoAdvertise()->setArgs($args)->send();
var_dump($req->getBody());

