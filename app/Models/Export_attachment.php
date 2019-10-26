<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Export_attachment extends Model
{
    protected $fillable = [
        'desc' , 'file' , 'export_id'
    ];

    public function export(){
        return $this->belongsTo(Export::class , 'export_id');
    }
}
