<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'category' ,
        'sub_category' ,
        'date' ,
        'status' ,
        'message' ,
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

    public function dates(){
        return $this->hasMany(Reminder_date::class);
    }
}
