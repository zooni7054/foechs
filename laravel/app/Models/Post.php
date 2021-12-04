<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image',
        'status',
        'meta_title',
        'meta_description',
    ];

    public function images(){
        return $this->hasMany(PostImage::class, 'post_id', 'id');
    }
}
