<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form_attachment extends Model
{
    protected $fillable = [
        'desc' , 'file' , 'form_id'
    ];

    public function form(){
        return $this->belongsTo(Form::class , 'form_id');
    }
}
