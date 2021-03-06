<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ManagerAuthController;

use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\TeachersController as TeachersControllerDep;
use App\Http\Controllers\Manager\StudentsController as StudentsControllerDep;
use App\Http\Controllers\Manager\AngiController as AngiControllerDep;
use App\Http\Controllers\Manager\HicheelController as HicheelControllerDep;
use App\Http\Controllers\Manager\HuvaariController as HuvaariControllerDep;
use App\Http\Controllers\Manager\MergejilController as MergejilControllerDep;
use App\Http\Controllers\Manager\MergejilBagshController as MergejilBagshControllerDep;
use App\Http\Controllers\Manager\TenhimController as TenhimControllerDep;
use App\Http\Controllers\Manager\SettingsController as SettingsControllerDep;
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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/****************************************************************************/
/********************************** MANAGER *********************************/
/****************************************************************************/

// Manager Login
Route::get('manager', [ManagerAuthController::class, 'managerGet'])->name('managerLogin');
Route::get('manager/login', [ManagerAuthController::class, 'managerGetLogin'])->name('managerLogin');
Route::post('manager/login', [ManagerAuthController::class, 'managerLogin'])->name('managerLoginPost');
Route::get('manager/logout', [ManagerAuthController::class, 'managerLogout'])->name('logout');

Route::group(['prefix' => 'manager','middleware' => 'managerauth'], function () {
	// Manager Dashboard
	Route::get('dashboard',[ManagerController::class, 'dashboard'])->name('manager-dashboard');	
	
	// Teacher
	Route::get('teachers',[TeachersControllerDep::class, 'index'])->name('manager-teachers');
	Route::get('teachers/add',[TeachersControllerDep::class, 'add'])->name('manager-teachers-add');
	Route::get('teachers/edit/{id}',[TeachersControllerDep::class, 'edit'])->name('teachers-edit');

	Route::post('teachers/add',[TeachersControllerDep::class, 'store'])->name('manager-teachers-save');
	Route::post('teachers/edit/{id}',[TeachersControllerDep::class, 'update'])->name('manager-teachers-edit');
	Route::post('teachers/delete/',[TeachersControllerDep::class, 'delete'])->name('manager-teachers-delete-ajax');

	Route::delete('teachers/delete/{id}',[TeachersControllerDep::class, 'destroy'])->name('manager-teachers-delete');

	// Angi
	Route::get('angi',[AngiControllerDep::class, 'index'])->name('manager-angi');
	Route::get('angi/add',[AngiControllerDep::class, 'add'])->name('manager-angi-add');
	Route::get('angi/edit/{id}',[AngiControllerDep::class, 'edit'])->name('angi-edit');

	Route::post('angi/add',[AngiControllerDep::class, 'store'])->name('manager-angi-save');
	Route::post('angi/edit/{id}',[AngiControllerDep::class, 'update'])->name('manager-angi-edit');

	Route::delete('angi/delete/{id}',[AngiControllerDep::class, 'destroy'])->name('manager-angi-delete');

	// Mergejil
	Route::get('mergejil',[MergejilControllerDep::class, 'index'])->name('manager-mergejil');
	Route::get('mergejil/add',[MergejilControllerDep::class, 'add'])->name('manager-mergejil-add');
	Route::get('mergejil/edit/{id}',[MergejilControllerDep::class, 'edit'])->name('mergejil-edit');

	Route::post('mergejil/add',[MergejilControllerDep::class, 'store'])->name('manager-mergejil-save');
	Route::post('mergejil/edit/{id}',[MergejilControllerDep::class, 'update'])->name('manager-mergejil-edit');
	Route::post('mergejil/delete/',[MergejilControllerDep::class, 'delete'])->name('manager-mergejil-delete-ajax');

	Route::delete('mergejil/delete/{id}',[MergejilControllerDep::class, 'destroy'])->name('manager-mergejil-delete');

	// Mergejil Bagsh
	Route::get('mergejil_bagsh',[MergejilBagshControllerDep::class, 'index'])->name('manager-mergejil_bagsh');
	Route::get('mergejil_bagsh/add',[MergejilBagshControllerDep::class, 'add'])->name('manager-mergejil_bagsh-add');
	Route::get('mergejil_bagsh/edit/{id}',[MergejilBagshControllerDep::class, 'edit'])->name('mergejil_bagsh-edit');

	Route::post('mergejil_bagsh/add',[MergejilBagshControllerDep::class, 'store'])->name('manager-mergejil_bagsh-save');
	Route::post('mergejil_bagsh/edit/{id}',[MergejilBagshControllerDep::class, 'update'])->name('manager-mergejil_bagsh-edit');

	Route::delete('mergejil_bagsh/delete/{id}',[MergejilBagshControllerDep::class, 'destroy'])->name('manager-mergejil_bagsh-delete');

	// Tenhim
	Route::get('tenhim',[TenhimControllerDep::class, 'index'])->name('manager-tenhim');
	Route::get('tenhim/add',[TenhimControllerDep::class, 'add'])->name('manager-tenhim-add');
	Route::get('tenhim/edit/{id}',[TenhimControllerDep::class, 'edit'])->name('tenhim-edit');

	Route::post('tenhim/add',[TenhimControllerDep::class, 'store'])->name('manager-tenhim-save');
	Route::post('tenhim/edit/{id}',[TenhimControllerDep::class, 'update'])->name('manager-tenhim-edit');
	Route::post('tenhim/delete/',[TenhimControllerDep::class, 'delete'])->name('manager-tenhim-delete-ajax');

	Route::delete('tenhim/delete/{id}',[TenhimControllerDep::class, 'destroy'])->name('manager-tenhim-delete');

	// Hicheel
	Route::get('hicheel',[HicheelControllerDep::class, 'index'])->name('manager-hicheel');
	Route::get('hicheel/add',[HicheelControllerDep::class, 'add'])->name('manager-hicheel-add');
	Route::get('hicheel/edit/{id}',[HicheelControllerDep::class, 'edit'])->name('hicheel-edit');

	Route::post('hicheel/add',[HicheelControllerDep::class, 'store'])->name('manager-hicheel-save');
	Route::post('hicheel/edit/{id}',[HicheelControllerDep::class, 'update'])->name('manager-hicheel-edit');
	Route::post('hicheel/delete/',[HicheelControllerDep::class, 'delete'])->name('manager-hicheel-delete-ajax');

	Route::delete('hicheel/delete/{id}',[HicheelControllerDep::class, 'destroy'])->name('manager-hicheel-delete');

	// Huvaari
	Route::get('huvaari',[HuvaariControllerDep::class, 'index'])->name('manager-huvaari');
	Route::get('huvaari/bagsh/{bagshId}',[HuvaariControllerDep::class, 'bagsh'])->name('manager-huvaari-bagsh');

	// Students
	Route::get('students',[StudentsControllerDep::class, 'index'])->name('manager-students');
	Route::get('students/add',[StudentsControllerDep::class, 'add'])->name('manager-students-add');
	Route::get('students/edit/{id}',[StudentsControllerDep::class, 'edit'])->name('students-edit');

	Route::post('students/add',[StudentsControllerDep::class, 'store'])->name('manager-students-save');
	Route::post('students/edit/{id}',[StudentsControllerDep::class, 'update'])->name('manager-students-edit');
	Route::post('students/delete/',[StudentsControllerDep::class, 'delete'])->name('manager-students-delete-ajax');

	// Settings
	Route::get('settings',[SettingsControllerDep::class, 'index'])->name('manager-settings');
	Route::get('settings/password',[SettingsControllerDep::class, 'password'])->name('manager-settings-password');
	Route::get('settings/huvaari',[SettingsControllerDep::class, 'huvaari'])->name('manager-settings-huvaari');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
