<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded=[];

    public function service()
    {
     return $this->belongsTo(Service::class,'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function images()
    {
        return $this->hasMany(File_image::class,'file_id');
    }
}
