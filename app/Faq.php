<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
    protected $table='faqs';
    protected $guarded=[];
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}
