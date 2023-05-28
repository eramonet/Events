<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Authenticatable

{
    use LaratrustUserTrait ,SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;




    protected $guarded = [];


    protected $appends =['image_url' ];

    protected function getImageUrlAttribute(){
        $path = asset('uploads/admins_images');

        return  is_null($this->image) ? $path.'/default.png':$path .'/'.$this->image;
    }







    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function category()
    {
        return $this->belongsTo(AdminCategory::class, 'category_id');
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class , 'id' , 'vendor_admin');
    }

    public function added_by_admin()
    {
        return $this->belongsTo(Admin::class, 'added_by')->with('roles');
    }


}
