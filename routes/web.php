<?php

// web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\MedicationController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta GET para mostrar el formulario de inicio de sesión
Route::get('login', function () {
    return view('auth.login');
})->name('login');

// Rutas de autenticación
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    // Rutas para pacientes
    Route::get('patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');

    // Rutas para enfermedades
    Route::get('diseases', [DiseaseController::class, 'index'])->name('diseases.index');
    Route::get('diseases/create', [DiseaseController::class, 'create'])->name('diseases.create');
    Route::post('diseases', [DiseaseController::class, 'store'])->name('diseases.store');
    Route::get('diseases/{disease}/edit', [DiseaseController::class, 'edit'])->name('diseases.edit');
    Route::put('diseases/{disease}', [DiseaseController::class, 'update'])->name('diseases.update');
    Route::delete('diseases/{disease}', [DiseaseController::class, 'destroy'])->name('diseases.destroy');

    // Rutas para medicamentos
    Route::get('medications', [MedicationController::class, 'index'])->name('medications.index');
    Route::get('medications/create', [MedicationController::class, 'create'])->name('medications.create');
    Route::post('medications', [MedicationController::class, 'store'])->name('medications.store');
    Route::get('medications/{medication}/edit', [MedicationController::class, 'edit'])->name('medications.edit');
    Route::put('medications/{medication}', [MedicationController::class, 'update'])->name('medications.update');
    Route::delete('medications/{medication}', [MedicationController::class, 'destroy'])->name('medications.destroy');
});
