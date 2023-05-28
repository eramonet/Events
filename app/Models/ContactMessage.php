<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactMessage extends Model
{
    use HasFactory;
    protected $table = 'contact_messages';
    protected $fillable = ['name', 'email', 'phone', 'message', 'user_id', 'seen'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}