<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('forms.user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//      Zamiast confirmed można zrobić same:email_confirmation

      $request->validate([
        'name' => 'required | min:3 | max:15',
        'email' => 'required | min:5 | max:50 | email | confirmed | unique:users',
        'password' => 'required | min:3 | regex:/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])/ | confirmed'
      ]);

      $user = User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
      ]);

/*
//      Można też tak

      $name = $request->input('name');
      $email = $request->input('email');
      $password = Hash::make($request->input('password'));

      $result = DB::insert('insert into users (name, email, password) values (?,?,?)',[$name, $email, $password]);

      if($result){
        return 'udało sie';
      }else{
        return 'nie udało sie';
      }
*/

      return redirect(route('users.show'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
      $allUsers = User::all();

      return view('users.show',[
        'users'=>$allUsers,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
