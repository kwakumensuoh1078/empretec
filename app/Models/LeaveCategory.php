<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveCategory extends Model
{
    protected $table = 'leave_categories';
    protected $fillable = [
        'name',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];
}
