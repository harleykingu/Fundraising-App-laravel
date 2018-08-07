<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $table = "transaction";

    public function donation()
    {
      return $this->hasMany('App\Donation');
    }
}
