<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image',
        'album_id',
        'status',
        'schedule_date',
        'meta_title',
        'meta_description',
    ];

    protected $dates = [
        'schedule_date',
    ];

    public function album(){
        return $this->hasOne(Album::class, 'id', 'album_id');
    }


}
