<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffDocument extends Model
{
     protected $table = 'staff_documents';
    protected $fillable = ['title', 'category_id','type_id', 'status','file_path','created_by'];

    public function type()
    {
        return $this->belongsTo(DocumentType::class, 'type_id');
    }

     public function category()
    {
        return $this->belongsTo(DocumentCategory::class, 'category_id');
    }
}
