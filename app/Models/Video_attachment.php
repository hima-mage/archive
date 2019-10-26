<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video_attachment extends Model
{
    protected $fillable = [
        'desc' , 'file' , 'type', 'video_id'
    ];

    public function video(){
        return $this->belongsTo(Video::class , 'video_id');
    }
}
