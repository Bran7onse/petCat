<?php

use App\Livewire\Mascotas\Index as MascotasIndex;
use App\Livewire\Mascotas\Create as MascotasCreate;
use App\Livewire\Users\Index as UsersIndex;
use App\Livewire\Users\Create as UsersCreate;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordatorioController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Rutas para usuarios en grupo con autenticación
    Route::get('/usuarios', action: UsersIndex::class)->name('users.index');
    Route::get('/usuarios/crear', action: UsersCreate::class)->name('users.create');

    // Rutas para mascotas en grupo con autenticación
    Route::get('/mascotas', action: MascotasIndex::class)->name('mascotas.index');
    Route::get('/mascotas/crear', action: MascotasCreate::class)->name('mascotas.create');

    // Rutas para citas mascotas
    Route::get('/citas/crear', [CitaController::class, 'create'])->name('citas.create');
    Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');
    Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::patch('/citas/{cita}/confirmar', [CitaController::class, 'confirmar'])->name('citas.confirmar');
    Route::patch('/citas/{cita}/cancelar', [CitaController::class, 'cancelar'])->name('citas.cancelar');

    Route::get('/recordatorios', [RecordatorioController::class, 'index'])->name('recordatorios.index');




    /*Route::get('/test-log', function () {
        Log::info('🧪 LOG DESDE RUTA FUNCIONA');
        return 'ok';
    });*/
});
