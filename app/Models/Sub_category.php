<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $fillable = [
        //'name' , 'meta_keywords' , 'meta_des', 'cat_id'
        'name' , 'cat_id'
    ];

    public function cat(){
        return $this->belongsTo(Category::class , 'cat_id');
    }
}
