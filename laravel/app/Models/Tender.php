<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tender extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'title',
        'description',
        'path',
        'meta_title',
        'meta_description',
        'opening_date',
        'closing_date',
        'download_link'
    ];

    protected $dates = [
        'opening_date',
        'closing_date',
    ];
}
