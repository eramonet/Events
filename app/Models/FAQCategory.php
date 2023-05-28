<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FAQCategory extends Model
{
    use HasFactory ,SoftDeletes ,Sluggable;
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug_ar' => [
                'source' => 'title_ar',
                'separator' => '-',
            ],
            'slug_en' => [
                'source' => 'title_en',
                'separator' => '-',
            ],
        ];
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }





    public function faqs()
    {
        return $this->hasMany(FAQ::class, 'category_id');
    }
}
