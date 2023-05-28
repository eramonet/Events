<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminCategory extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];


    public function admins(): HasMany
    {
        return $this->hasMany(Admin::class, 'category_id',);
    }

    public function vendor_admins(): HasMany
    {
        return $this->hasMany(Admin::class, 'category_id',)->whereRoleIs(['vendor-admin']);

    }

    public function system_admins(): HasMany
    {
        return $this->hasMany(Admin::class, 'category_id',)->whereRoleIs(['admin', 'super-admin']);

    }


    public function added_by_admin()
    {
        return $this->belongsTo(Admin::class, 'added_by');
    }


}
