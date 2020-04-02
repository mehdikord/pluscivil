<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File_image extends Model
{
    protected $table='file_images';
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function file()
    {
        return $this->belongsTo(File::class,'file_id');
    }
}
