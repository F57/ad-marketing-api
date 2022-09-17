<?php
/**
 * Created by PhpStorm.
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */
require __DIR__ . '/../../../index.php';
require __DIR__ . '/../../config.php';

$client = new ToutiaoSdk\TouTiaoClient(TOKEN);

$file = __DIR__ . '/test.mp4';
$req = $client::Tool()->file->videoAd();
$args = [];

$req->setAdvertiserId(ADVERTISER_ID);
$req->setVideoFile($file);
$req->setVideoSignature(md5_file($file));

$req->setArgs($args);

print_r($client->excute($req));
