<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveTypeSetup extends Model
{
        protected $table = 'leave_type_setups';
        protected $fillable = [
            'name',
            'description',
            'total_days',
            'status',
            'created_by',
            'updated_by'
        ];
}
