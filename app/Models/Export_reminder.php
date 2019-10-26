<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Export_reminder extends Model
{
    protected $fillable = [
        'user_id', 'type', 'datetime', 'export_id'
    ];

    public function export(){
        return $this->belongsTo(Export::class , 'export_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
