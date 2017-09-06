<?php

namespace App;

class Dependant extends Model
{
   public function member()
   {
      return $this->belongsTo('App\Participant');
   }
}
