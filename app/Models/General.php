<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $fillable = [
        'name' ,
        'category' ,
        'sub_category' ,
        'adminstration' ,
        'department' ,
        'to_category' ,
        'to_sub_category' ,
        'date' ,
        'follow_status' ,
        'follow_date' ,
        'priority' ,
        'confidentiality' ,
        'remind' ,
        'remind_to' ,
        'main_file' ,
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

    public function to_cat(){
        return $this->belongsTo(Category::class , 'to_category');
    }

    public function to_sub_cat(){
        return $this->belongsTo(Sub_category::class , 'to_sub_category');
    }

    public function admin(){
        return $this->belongsTo(Adminstration::class , 'adminstration');
    }

    public function dept(){
        return $this->belongsTo(Department::class , 'department');
    }

    public function attaches(){
        return $this->hasMany(General_attachment::class);
    }
}
