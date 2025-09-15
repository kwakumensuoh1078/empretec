<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
      protected $table = 'leave_types';
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'total_days',
        'status',
        'created_by',
        'updated_by'
    ];

    public function category(){
        return $this->belongsTo(LeaveCategory::class,'category_id');
    }
}
