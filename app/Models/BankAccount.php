<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $tables="bank_accounts";
    protected $fillable=[
        'bank_name',
        'bank_branch',
        'account_name',
        'account_number',
        'account_qr',
        'mobile_number',
        'status'
    ];
}
