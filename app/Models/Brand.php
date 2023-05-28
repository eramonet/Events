<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table='brands';
    protected $fillable=['logo','name_en','name_ar'];

    protected function getLogoAttribute($value)
    {
        if ($value) {
            return asset('uploads/brands' . '/' . $value);
        } else {
            return asset('uploads/brands/default.png');
        }
    }

    public function setLogoAttribute($value)
    {
        if ($value) {
            $imageName = time() . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('uploads/brands/'), $imageName);
            $this->attributes['logo'] = $imageName;
        }
    }
}
