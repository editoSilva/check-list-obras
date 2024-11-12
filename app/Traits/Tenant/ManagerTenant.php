<?php

namespace App\Traits\Tenant;

use App\Models\Company;

trait ManagerTenant
{
    public static function domain()
    {
        return request()->header('domain');
    }

    public static function tenant()
    {
        $tenant = Company::where('domain', self::domain())->first();

        return $tenant;
    }

    public static function identify()
    {
        $tenant = self::tenant();

        if(!$tenant) {
            return response()->json(['message' => 'Acesso Negado'], 404);
        }

        return $tenant->id;
    }

    public static function status()
    {
        if(self::tenant()) {

            return true;
        }

        return false;


    }
}
