<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class ShowController extends Controller
{
    public function show(){
      return 'Kontroler ShowController';
    }

  public function showData()
  {
    $data = [
      'firstName' => 'Franek',
      'lastName' => 'Nowak',
      'city' => 'Poznań',
      'hobby' => ['siatkówka', 'żużel', 'piłka ręczna']
    ];
      return View('data', $data);
      /*return View('data', ['data'=>$data]);*/
  }

}
