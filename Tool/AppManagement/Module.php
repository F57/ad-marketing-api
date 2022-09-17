<?php

namespace Tool\AppManagement;

use core\Profile\BaseModule;

class Module extends BaseModule
{
    public function getBooking()
    {
        return new AppGetBooking($this->client);
    }

    public function getApp()
    {
        return new AppGetApp($this->client);
    }

    public function getExtendPackage()
    {
        return new AppGetExtendPackage($this->client);
    }

}
