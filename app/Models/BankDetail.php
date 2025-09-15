<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    protected $table = 'bank_details';
    protected $fillable = ['staff_id', 'bank_name', 'account_number', 'account_name', 'branch_name','created_by'];
}
