<?php

use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\ClassMappingController;
use App\Http\Controllers\Admin\EmployeeController as AdminEmployeeController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/session', [SessionController::class, 'index'])->name('session');
    Route::get('/session/add', [SessionController::class, 'create'])->name('session.add');
    Route::post('/session/store', [SessionController::class, 'store'])->name('session.store');
    Route::get('/session/{id}/edit', [SessionController::class, 'edit'])->name('session.edit');
    Route::post('/session/{id}/update', [SessionController::class, 'update'])->name('session.update');
    Route::delete('/session/{id}', [SessionController::class, 'destroy'])->name('session.delete');
    Route::get('/session/{id}/restore', [SessionController::class, 'restore'])->name('session.restore');

    Route::resource('classes', ClassController::class);
    Route::get('classes/restore/{id}', [ClassController::class, 'restore'])->name('classes.restore');

    Route::get('/section', [SectionController::class, 'index'])->name('section');
    Route::get('/section/add', [SectionController::class, 'create'])->name('section.add');
    Route::post('/section/store', [SectionController::class, 'store'])->name('section.store');
    Route::get('/section/{id}/edit', [SectionController::class, 'edit'])->name('section.edit');
    Route::post('/section/{id}/update', [SectionController::class, 'update'])->name('section.update');
    Route::delete('/section/{id}', [SectionController::class, 'destroy'])->name('section.delete');

    Route::get('/class_mapping', [ClassMappingController::class, 'index'])->name('class_mapping');
    Route::get('/class_mapping/add', [ClassMappingController::class, 'create'])->name('class_mapping.add');
    Route::post('/class_mapping/store', [ClassMappingController::class, 'store'])->name('class_mapping.store');
    Route::get('/class_mapping/{id}/edit', [ClassMappingController::class, 'edit'])->name('class_mapping.edit');
    Route::post('/class_mapping/{id}/update', [ClassMappingController::class, 'update'])->name('class_mapping.update');
    Route::delete('/class_mapping/{id}', [ClassMappingController::class, 'destroy'])->name('class_mapping.delete');

    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/employee/add', [EmployeeController::class, 'create'])->name('employee.add');
    Route::post('/employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/employee/{id}/update', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
    
    Route::post('/employee/getDesignation', [EmployeeController::class, 'getDesignation'])->name('employee.getDesignation');
    Route::post('/employee/getCity', [EmployeeController::class, 'getCity'])->name('employee.getCity');

    Route::get('/test', function(){
        $con = config('constants.EMPLOYEE_TYPE');
        dd($con);
    });
});

require __DIR__.'/auth.php';
