<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'location',
        'image',
        'shortdescription',
        'description',
        'image',
        'status'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\EventFactory::new();
    }
}
