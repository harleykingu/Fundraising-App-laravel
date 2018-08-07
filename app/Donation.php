<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public $table = "donations";

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function campaign()
    {
      return $this->belongsTo('App\Campaign');
    }

    public function transaction()
    {
      return $this->belongsTo('App\Transaction');
    }
}
