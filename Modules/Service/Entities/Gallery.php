<?php

namespace Modules\Service\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class gallery extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];
    protected static function newFactory()
    {
        return \Modules\Service\Database\factories\GalleryFactory::new();
    }
}
