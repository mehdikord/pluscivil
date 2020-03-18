<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table='services';
    protected $guarded=[];
    protected $appends = [
        'nested_slug',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function parent()
    {
        return $this->belongsTo(Service::class,'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Service::class,'parent_id');
    }

    public function getNestedSlugAttribute()
    {
        $nested_slug[] = $this->slug;
        $current       = $this;
        while ($parent = $current->parent) {
            array_unshift($nested_slug, $parent->slug);
            $current = $parent;
        }

        return implode('/', $nested_slug);
    }
}
