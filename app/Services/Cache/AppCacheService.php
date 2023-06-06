<?php

namespace App\Services\Cache;

use App\Models\RiskCalculation;
use App\Models\Role;
use Illuminate\Support\Facades\Cache;

/**
 * This is a generic implementation 
 * What should be useful is to have a contract and many services related to their models
 * to keep up with SOLID principles (refactor for later) 
 */
class AppCacheService
{
    public function getRiskCalculation()
    {
        return Cache::rememberForever('riskCalculation', fn () => RiskCalculation::all());
    }

    public function getRoles()
    {
        return Cache::rememberForever('roles', fn() => Role::all());
    }
}
