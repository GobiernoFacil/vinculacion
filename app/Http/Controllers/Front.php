<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Front extends Controller
{
  // La página de inicio
  //
  //
  public function index(){
    return view("frontend.home");
  }

  public function offers($page = 1){

  }

  public function offer($id){

  }

  public function opds($page = 1){

  }

  public function opd($id){

  }

  public function companies($page = 1){

  }

  public function company($id){

  }

  public function openData(){

  }

  public function privacy(){
    
  }
}
