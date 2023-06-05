<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Splash extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='splashes';
    protected $fillable=[
        'number','title_en','title_ar','image',
        'details_en', 'details_ar','status'
       ];

    protected function getImageAttribute($value)
    {

        if ($value) {
            return asset('uploads/splashes_images' . '/' . $value);
        } else {
            return asset('uploads/splashes_images/default.png');
        }
    }

    public function setImageAttribute($value)
    {
        if ($value) {
            $imageName = time() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('uploads/splashes_images/'), $imageName);
            $this->attributes['image'] = $imageName;
        }
    }

}