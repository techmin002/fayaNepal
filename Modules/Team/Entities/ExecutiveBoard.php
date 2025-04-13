<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExecutiveBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'designation',
        'phone',
        'email',
        'status',
        'position'
    ];

    protected static function newFactory()
    {
        return \Modules\Team\Database\factories\ExecutiveBoardFactory::new();
    }
}
