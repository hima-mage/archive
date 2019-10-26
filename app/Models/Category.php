<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        //'name' , 'meta_keywords' , 'meta_des'
        'name' 
    ];

    public function sub_categories(){
        return $this->hasMany(Sub_category::class, 'cat_id');
    }
}
