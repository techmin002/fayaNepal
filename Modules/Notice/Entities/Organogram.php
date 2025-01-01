<?php

namespace Modules\Notice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organogram extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'status'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Notice\Database\factories\OrganogramFactory::new();
    }
}
