<?php

namespace Modules\Service\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'category-id',
        'title',
        'slug',
        'icon',
        'shortdescription',
        'description',
        'image',
        'video',
        'status',
        'program_type',
        'date'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Service\Database\factories\ProgramFactory::new();
    }
}
