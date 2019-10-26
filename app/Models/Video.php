<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'name',
        'category',
        'sub_category',
        'location',
        'adminstration',
        'department',
        'date',
        'user_id' ,
];

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function cat(){
        return $this->belongsTo(Category::class , 'category');
    }

    public function sub_cat(){
        return $this->belongsTo(Sub_category::class , 'sub_category');
    }

    public function admin(){
        return $this->belongsTo(Adminstration::class , 'adminstration');
    }

    public function dept(){
        return $this->belongsTo(Department::class , 'department');
    }

    public function location(){
        return $this->belongsTo(Location::class , 'location');
    }

    public function attaches(){
        return $this->hasMany(Album_attachment::class);
    }
}
