<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorInfo extends Model
{
    use HasFactory;
    protected $table='vendor_infos';
    protected $fillable=[
        'admin_id','cover_image','insta','gmail','twitter',
        'facebook','about_en','about_ar','side_image'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id')->with('roles');
    }

    public function setCoverImageAttribute($value)
    {
        if ($value) {
            $imageName = time() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('media/vendor_info/'), $imageName);
            $this->attributes['cover_image'] = $imageName;
        }
    }

    public function setSideImageAttribute($value)
    {
        if ($value) {
            $imageName = time() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('uploads/vendor_info/'), $imageName);
            $this->attributes['side_image'] = $imageName;
        }
    }


    protected function getCoverImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/vendor_info' . '/' . $value);
        } else {
            return asset('mediauploads/vendor_info/default.png');
        }
    }

    protected function getSideImageAttribute($value)
    {
        if ($value) {
            return asset('uploads/vendor_info' . '/' . $value);
        } else {
            return asset('mediauploads/vendor_info/default.png');
        }
    }

}
