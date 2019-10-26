<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder_date extends Model
{
    protected $fillable = [
        'date' , 'reminder_id'
    ];

    public function reminder(){
        return $this->belongsTo(Reminder::class , 'reminder_id');
    }
}
