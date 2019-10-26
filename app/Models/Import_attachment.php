<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import_attachment extends Model
{
    protected $fillable = [
        'desc' , 'file' , 'import_id'
    ];

    public function import(){
        return $this->belongsTo(Import::class , 'import_id');
    }
}
