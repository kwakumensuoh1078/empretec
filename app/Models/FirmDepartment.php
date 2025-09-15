<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirmDepartment extends Model
{
      protected $table = 'firm_departments';

     protected $fillable = ['name','description','status','created_by','updated_by'];
}
