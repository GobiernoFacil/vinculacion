<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class OpenData extends Model
{
  protected $table = "open_data";

  protected $fillable = ["resource", "available", "busy", "file"];
}
