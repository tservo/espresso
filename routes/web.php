<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Establishment;
use Illuminate\Http\Request;

Route::get('/', 'EstablishmentController@showAll');

Route::post('/establishment', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'description' => 'required|max:255'
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // Create The Task...
    $establishment = new Establishment;
    $establishment->name = $request->name;
    $establishment->description = $request->description;
    $establishment->save();
    return redirect('/');
});