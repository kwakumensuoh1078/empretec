<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirmUnit extends Model
{
       protected $table = 'firm_units';

     protected $fillable = ['name','description','status','department_id','created_by','updated_by'];

     public function department()
     {
         return $this->belongsTo(FirmDepartment::class,'department_id');
     }
}
