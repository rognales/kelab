<?php

namespace App;
use Balping\HashSlug\HasHashSlug;

class Participant extends Model
{
    use HasHashSlug;
    protected $guarded = ['id','created_at','updated_at'];
    protected static $minSlugLength = 8;

    public function dependants(){

      return $this->hasMany('App\Dependant');
    }

    public function event(){

       return $this->belongsTo('App\Event');
    }
}
