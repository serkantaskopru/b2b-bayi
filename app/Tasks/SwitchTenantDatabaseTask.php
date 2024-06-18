<?php

namespace App\Tasks;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Multitenancy\Tasks\SwitchTenantDatabaseTask as SpatieSwitchTenantDatabaseTask;

class SwitchTenantDatabaseTask extends SpatieSwitchTenantDatabaseTask
{
    protected function setTenantConnectionDatabaseName(?string $databaseName)
    {
        /*Log::alert("Tenant Database: ");
        Log::alert($databaseName);*/
        parent::setTenantConnectionDatabaseName($databaseName);

        $tenantConnectionName = is_null($databaseName)
            ? $this->landlordDatabaseConnectionName()
            : $this->tenantDatabaseConnectionName();

        DB::setDefaultConnection($tenantConnectionName);
    }
}
