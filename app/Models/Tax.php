<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tax extends Model
{
    use HasFactory ,SoftDeletes;

    protected $guarded = [];

   public function admin()
   {
       return $this->belongsTo(Admin::class, 'admin_id');
   }


}
