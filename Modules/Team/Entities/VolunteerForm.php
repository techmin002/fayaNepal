<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VolunteerForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'form',
        'details',
        'status'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Team\Database\factories\VolunteerFormFactory::new();
    }
}
