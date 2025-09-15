<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holidays';
    protected $fillable = [
        'name',
        'description',
        'date',
        'category_id',
        'type_id',
        'status',
        'created_by',
        'updated_by'
    ];

     public function category(){
        return $this->belongsTo(LeaveCategory::class,'category_id');
    }

     public function type(){
        return $this->belongsTo(LeaveType::class,'type_id');
    }
}
