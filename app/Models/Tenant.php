<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Tenant extends Model
{
    use UsesTenantConnection;

    protected $fillable = ['name', 'domain', 'database', 'uid'];
}
