<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    protected $table = 'document_types';
    protected $fillable = ['name', 'category_id', 'status','created_by'];

    public function category()
    {
        return $this->belongsTo(DocumentCategory::class, 'category_id');
    }
}
