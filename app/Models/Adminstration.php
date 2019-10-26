<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adminstration extends Model
{
    protected $fillable = [
        //'name' , 'meta_keywords' , 'meta_des'
        'name' 
    ];

    public function departments(){
        return $this->hasMany(Department::class, 'admin_id');
    }
}
