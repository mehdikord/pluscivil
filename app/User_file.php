<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_file extends Model
{
    protected $table='user_files';
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
