<?php
/**
 * 更新计划预算
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';
$auth = new ToutiaoSdk\ToutiaoAuth(APPID, SECRET);
$client = $auth->makeClient(TOKEN);
$args = [];
$req = $client::AdvertisingPlan()->AdUpdateBudget()->setArgs($args)->send();//注意是二维
var_dump($req->getBody());
