<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Companies extends Controller
{
  public function index(){
    return view("elcoruco-test")->with(["message" => "estás en el dashboard de empresa!"]);
  }
}