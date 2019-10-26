<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $fillable = [
        'export_number' ,
        'name' ,
        'category' ,
        'sub_category' ,
        'adminstration' ,
        'department' ,
        'from_category' ,
        'from_sub_category' ,
        'recieve_date' ,
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

    public function from_cat(){
        return $this->belongsTo(Category::class , 'from_category');
    }

    public function from_sub_cat(){
        return $this->belongsTo(Sub_category::class , 'from_sub_category');
    }

    public function admin(){
        return $this->belongsTo(Adminstration::class , 'adminstration');
    }

    public function dept(){
        return $this->belongsTo(Department::class , 'department');
    }

    public function attaches(){
        return $this->hasMany(Import_attachment::class);
    }
}
