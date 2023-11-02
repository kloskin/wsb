<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShowController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('wsb', function (){
  return view('wsb', ['firstName' => 'Franek', 'lastName' => 'Nowak']);
});

/*Parametr obligatoryjny (wymagany)*/
Route::get('pages/{page}', function(string $page){
  $pages = [
    'about' => 'Informacej o stronie',
    'contact' => 'Franek@gmail.com',
    'home' => 'Strona domowa',
  ];
  return $pages[$page]??"Błędne dane wprowadzone przez użytkownika";
})->name('pages');

/*Parametr */
/*Route::get('/address/{city}/{street}', function (string $city, string $street){
  return "Miasto $city";
});*/

Route::get('/address/{city?}/{street?}/{postalCode?}', function (string $city = '-', string $street = '-', int $postalCode = null){

  $postalCode = is_null($postalCode) ? 'brak kodu pocztowego' : substr($postalCode, 0, 2) . '-' . substr($postalCode, 2, 3);


//  Te SHOW mozna zmienic np na ADDuser czy cos takiego
  echo <<< SHOW
    Kod Pocztowy: $postalCode<br>
    Miasto: $city<br>
    Ulica: $street<hr>
SHOW;
})->name('adres');

Route::redirect('adres/{city?}/{street?}/{postalCode?}', '/address/{city?}/{street?}/{postalCode?}');


//Temat 3 z Kontrolerami i Middlewerami

Route::get('show', [\App\Http\Controllers\ShowController::class, 'show']);

Route::get('show_data', [ShowController::class, 'showData']);

    //Kontroler userForm
Route::view('userform', 'forms.user_form')->name('forms.user');
Route::post('UserFormController', [\App\Http\Controllers\UserFormController::class,'showForm']);


Route::get('/usersdbtable', [\App\Http\Controllers\UsersController::class,'show'])->name('users.show');
Route::post('CreateUser', [\App\Http\Controllers\UsersController::class,'store'])->name('forms.create');
