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
      'firstName' => 'required | min:3 | max:15',
      'lastName' => 'required',
      'email' => 'required | min:5 | max:50 | email',
    ]);
    return View('showUser', $req->input());
//    return View('showUser', $req);
    }
}
