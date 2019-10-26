<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album_attachment extends Model
{
    protected $fillable = [
        'desc' , 'file' , 'type', 'album_id'
    ];

    public function album(){
        return $this->belongsTo(Album::class , 'album_id');
    }
}
