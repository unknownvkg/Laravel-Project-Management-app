<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AddUserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkAssignController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::view('/', 'index')->name('index');
Route::get('/user/forUser', [AuthenticationController::class, 'Userlogin'])->name('forUser');
Route::get('/forAdmin', [AuthenticationController::class, 'admin'])->name('forAdmin');
Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/registeruser', [AuthenticationController::class, 'registeruser'])->name('registeruser');
Route::get('/login', [AuthenticationController::class, 'admin'])->name('login');
Route::post('/loginuser', [AuthenticationController::class, 'loginuser'])->name('loginuser');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');



Route::get('/studentData', [AuthenticationController::class, 'studentData'])->name('afterloginpage');
Route::get('/add', [AuthenticationController::class, 'addUser'])->name('add');

// Route::get('/',[AddUserController::class,'index'])->name('index');
Route::post('/adduser', [AddUserController::class, 'adduser'])->name('adduser');
Route::post('/Userlogin', [AddUserController::class, 'userLogin'])->name('loginUser');
Route::get('/userData', [AddUserController::class, 'userData'])->name('userDetail');
// Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);

Route::get('/seeUserPorfile/{userId}',[WorkAssignController::class,'giveTask'])->name('seeUserPorfile');
Route::post('/addTask',[WorkAssignController::class,'addTask'])->name('addTask');

Route::patch('/user/task/update-status/{id}', [TaskController::class, 'updateStatus'])->name('update-status');