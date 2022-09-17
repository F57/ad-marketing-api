<?php
/**
 * Created by PhpStorm.
 * User: 57F
 * Date: 2022/9/17
 * Email:
 */

namespace AdvertisingDelivery;

use core\Profile\BaseModule;

class Module extends BaseModule
{
    public function campaignCreate()
    {
        return new CampaignCreate($this->client);
    }

    public function campaignGet()
    {
        return new CampaignGet($this->client);
    }

    public function campaignUpdate()
    {
        return new CampaignUpdate($this->client);
    }

    public function campaignUpdateStatus()
    {
        return new CampaignUpdateStatus($this->client);
    }
}
