<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        //'name' , 'meta_keywords' , 'meta_des', 'cat_id'
        'name' , 'admin_id'
    ];

    public function admin(){
        return $this->belongsTo(Adminstration::class , 'admin_id');
    }
}
