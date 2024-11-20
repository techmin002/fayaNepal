<?php

namespace Modules\Advertisement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'image',
        'shortdescription',
        'description',
        'image',
        'status'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Advertisement\Database\factories\StoryFactory::new();
    }
}
