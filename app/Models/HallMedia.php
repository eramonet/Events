<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallMedia extends Model
{
    use HasFactory;
    protected $guarded = [];


    protected $fillable = ['hall_id', 'image'];

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hall_id');
    }

    protected $appends =['image_url' ];


    protected function getImageUrlAttribute(){
        $path = asset('uploads/halls_images');

        return  is_null($this->image) ? $path.'/default.png':$path .'/'.$this->image;
    }

}