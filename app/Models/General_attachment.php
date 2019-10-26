<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General_attachment extends Model
{
    protected $fillable = [
        'desc' , 'file' , 'general_id'
    ];

    public function general(){
        return $this->belongsTo(General::class , 'general_id');
    }
}
