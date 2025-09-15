<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffType extends Model
{
     function category(){
        return $this->belongsTo(StaffCategory::class, 'category_id','cat_id');
    }
}
