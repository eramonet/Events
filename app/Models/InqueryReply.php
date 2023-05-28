<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InqueryReply extends Model
{
    use HasFactory;
    protected $table='inquery_replies';

    protected $fillable=['inquery_id','reply'];

    public function inquery()
    {
        return $this->belongsTo(Inquery::class, 'inquery_id');

    }
}