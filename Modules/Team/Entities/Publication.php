<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'file',
        'description',
        'status'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Team\Database\factories\PublicationFactory::new();
    }
}
