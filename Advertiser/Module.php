<?php
/**
 * 账号服务
 * Created by PhpStorm.
 * User: 57F
 * Date: 2022/9/17
 * Email: 
 */

namespace Advertiser;

use core\Profile\BaseModule;

class Module extends BaseModule
{
    public function agentAdvertise()
    {
        return new AgentAdvertise($this->client);
    }
    public function childAgentAdvertise()
    {
        return new ChildAgentAdvertise($this->client);
    }
    public function majordomoAdvertise()
    {
        return new MajordomoAdvertise($this->client);
    }

    public function majordomoCompanyInfo()
    {
        return new MajordomoCompanyInfo($this->client);
    }

    public function customerAdvertise()
    {
        return new CustomerAdvertise($this->client);
    }

    public function fundGet()
    {
        return new FundGet($this->client);
    }

    public function budgetGet()
    {
        return new BudgetGet($this->client);
    }

    public function updateBudget()
    {
        return new UpdateBudget($this->client);
    }

    public function fundDailyStat()
    {
        return new FundDailyStat($this->client);
    }

    public function fundTransactionGet()
    {
        return new FundTransactionGet($this->client);
    }
}
