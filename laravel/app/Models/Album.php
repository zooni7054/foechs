<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'status',
        'meta_title',
        'meta_description',
    ];

    public function images(){
        return $this->hasMany(AlbumImage::class, 'album_id', 'id');
    }
}
