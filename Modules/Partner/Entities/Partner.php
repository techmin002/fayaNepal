<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'logo',
        'type',
        'status',
        'description'
    ];

    protected static function newFactory()
    {
        return \Modules\Partner\Database\factories\PartnerFactory::new();
    }
    // app/Models/Partner.php
public function donors()
{
    return $this->hasMany(Donor::class);
}

}
