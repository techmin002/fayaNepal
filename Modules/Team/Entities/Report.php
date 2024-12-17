<?php

namespace Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'file',
        'report_type',
        'description',
        'status'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Team\Database\factories\ReportFactory::new();
    }
}
