<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table='requests';
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');

    }

    public function supporter()
    {
        return $this->belongsTo(User::class,'user_id');

    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function invoice()
    {
//        return $this->hasMany()
    }
}
