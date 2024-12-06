<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leadership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'designation',
        'email',
        'phone',
        'image',
        'status',
        'introduction'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Team\Database\factories\LeadershipFactory::new();
    }
}
