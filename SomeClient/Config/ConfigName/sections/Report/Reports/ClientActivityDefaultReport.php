<?php

namespace SomeClient\Config\ConfigName\sections\Report\Reports;

use Iris\Config\CRM\sections\Report\Reports\Standard\ReportRender;

class ClientActivityDefaultReport extends ReportRender
{
    public function prepare()
    {
        echo 'test';
        parent::prepare();
    }

}