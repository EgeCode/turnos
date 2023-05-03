<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\CallTurnos;
use App\Http\Livewire\ObtenerTurno;
use App\Http\Livewire\Pantalla;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;


Route::get('/login', [UserController::class, 'indexLogin'])->name('login');
Route::post('/loginned', [UserController::class, 'access'])->name('signin');

Route::middleware(['auth'])->group(function(){
    Route::get('/pantalla', Pantalla::class)->name('display.turnos');
    Route::get('/main', CallTurnos::class)->name('call.turnos');
    Route::get('/obtener-turno', ObtenerTurno::class)->name('getTurno');
    Route::view('/print/{turno}', 'ticket')->name('print.ticket');
});