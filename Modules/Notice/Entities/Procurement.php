<?php

namespace Modules\Notice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Procurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
        'status',
        'type',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Notice\Database\factories\ProcurementFactory::new();
    }
}
