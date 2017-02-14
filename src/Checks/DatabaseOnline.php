<?php

namespace Vistik\Checks;

use Exception;
use Illuminate\Support\Facades\DB;

class DatabaseOnline extends HealthCheck
{

    public function run(): bool
    {
        try {
            $this->log("Trying to connect to database using driver: " . DB::connection()->getDriverName());
            if (DB::connection()->getPdo()) {
                return true;
            }
        } catch (Exception $e) {
            $this->setError($e->getMessage());
        }

        return false;
    }
}
