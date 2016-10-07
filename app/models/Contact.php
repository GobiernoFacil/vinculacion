<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $fillable = ["name", "phone", "email", "contact_id", "contact_type"];       

  public function contact()
  {
    return $this->morphTo();
  }
}
