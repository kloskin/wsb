<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UserFormController extends Controller
{
  public function showForm(Request $req)
  {
//    Nie dodawać w formularzu bo mozna zbadac i wyslac
    $req->validate([
      'name' => 'required | min:3 | max:15',
      'email' => 'required | min:5 | max:50 | email',
      'password' => 'required | min:3'
    ]);
    return View('showUser', $req->input());
//    return View('showUser', $req);
    }
}
