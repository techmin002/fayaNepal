<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhyUs extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Setting\Database\factories\WhyUsFactory::new();
    }
}
