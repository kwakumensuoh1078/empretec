<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected$fillable = [
        'name',
        'region_id',
        'status'
    ];
    function region(){
        return $this->belongsTo(Region::class, 'region_id','id');
    }
}
