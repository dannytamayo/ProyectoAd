<?php

use App\Models\Travel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request) {
    $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return response()->json(['success' => false, 'message' => 'Invalid email or password']);
    }

    $user = Auth::user();

    return response()->json([
        'success' => true,
        'email' => $user->email,
        'role' => $user->rol,
        'id' => $user->id
    ]);
});

Route::post('/travel', function (Request $request) {

    // dd($validatedData);


    $travel = new Travel;
    $travel->main_street = $request->main_street;
    $travel->secondary_street = $request->secondary_street;
    $travel->reference = $request->reference;
    $travel->neighborhood = $request->neighborhood;
    $travel->additional_information = $request->additional_information;
    $travel->status = 0;
    $travel->user_id = $request->user_id;
    $travel->save();

    return response()->json([
        'success' => true,
        'message' => 'Travel added successfully'
    ]);
});

Route::get('/driver/{id}/travels', function ($id) {
    $travels = Travel::where('driver_id', $id)
                    ->where('status', 1)->get();

        return response()->json($travels);
});

Route::post('/travel/{id}/start', function ($id) {
    $travel = Travel::find($id);
    $driver = User::find($travel->driver_id);


    $travel->status = 2;
    $driver->estado = 0;

    $travel->save();
    $driver->save();

    return response()->json([
        'message' => 'Viaje iniciado y taxista ocupado.'
    ], 200);
});

Route::post('/taxista/{id}/finalizado', function ($id) {
    $taxista = User::find($id);
    $taxista->estado = 1;
    $taxista->save();

    return response()->json(['message' => 'El estado del taxista ha sido actualizado a disponible.']);
});