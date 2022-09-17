<?php

namespace Tool\AudiencePackage;

use core\Profile\BaseModule;

class Module extends BaseModule
{
    public function AudiencePackageBind()
    {
        return new AudiencePackageBind($this->client);
    }

    public function AudiencePackageCreate()
    {
        return new AudiencePackageCreate($this->client);
    }

    public function AudiencePackageGet()
    {
        return new AudiencePackageGet($this->client);
    }

    public function AudiencePackageUnbind()
    {
        return new AudiencePackageUnbind($this->client);
    }

    public function AudiencePackageUpdate()
    {
        return new AudiencePackageUpdate($this->client);
    }
}
