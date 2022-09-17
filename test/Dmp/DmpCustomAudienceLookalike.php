<?php
/**
 * Created by PhpStorm.
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */
require __DIR__ . '/../../index.php';
require __DIR__ . '/../config.php';

$auth = new ToutiaoSdk\ToutiaoAuth(APPID, SECRET);
$client = $auth->makeClient(TOKEN);

$req = $client::Dmp()->customAudienceLookalike();
$args = [];
$req->setArgs($args);

print_r($client->excute($req));
