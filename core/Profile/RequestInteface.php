<?php
/**
 * Created by PhpStorm.
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace core\Profile;

interface RequestInteface
{
    public function getUrl();

    public function setUrl($url);

    public function getMethod();

    public function getTimeout();

    public function setParams($array);

    public function getParams();

    public function addParam($key, $value);

    public function getContentType();

    public function check();
}
