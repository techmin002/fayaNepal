<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Partner\Database\factories\DonorFactory;

class Donor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['partner_id', 'name', 'description', 'status', 'image'];


    protected static function newFactory(): DonorFactory
    {
        //return DonorFactory::new();
    }
    // app/Models/Donor.php
public function partner()
{
    return $this->belongsTo(Partner::class);
}

}
