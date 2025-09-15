<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirmBranch extends Model
{
     protected $table = 'firm_branches';

     protected $fillable = ['name','description','status','created_by','updated_by'];
    
}
