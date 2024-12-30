<?php

namespace Modules\Slider\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio',
        'beneficiary_direct',
        'beneficiary_indirect',
        'project',
        'others',
        'status'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Slider\Database\factories\PortfolioFactory::new();
    }
}
