<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/setting/profile', [App\Http\Controllers\HomeController::class, 'setting_profile'])->name('setting-profile');
Route::get('/user/setting/profile/update', [App\Http\Controllers\HomeController::class, 'update_profile'])->name('update-profile');
Route::get('/user/setting/repassword/edit', [App\Http\Controllers\HomeController::class, 're_password_user'])->name('re-password-user');
Route::get('/user/setting/repassword/update', [App\Http\Controllers\HomeController::class, 'update_password_user'])->name('update-password');
Route::get('/user/setting/web', [App\Http\Controllers\HomeController::class, 'setting_app'])->name('setting-app');
Route::get('/user/setting/corses', [App\Http\Controllers\HomeController::class, 'setting_corses'])->name('setting-corses');
Route::get('/user/setting/corses/add', [App\Http\Controllers\HomeController::class, 'add_corses'])->name('setting-add-corses');
Route::get('/user/setting/corses/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete_corses'])->name('setting-delete-corses');
Route::get('/user/setting/corses/update', [App\Http\Controllers\HomeController::class, 'update_corses'])->name('setting-update-corses');
Route::get('/user/student/corses/add', [App\Http\Controllers\HomeController::class, 'add_grades_cores'])->name('student-add-grades');
Route::get('/user/student/Ask/{num}', [App\Http\Controllers\HomeController::class, 'ask_page'])->name('student-ask-page');
Route::get('/user/setting/Ask/', [App\Http\Controllers\HomeController::class, 'add_ask'])->name('setting-ask-add');
Route::get('/user/setting/Ask/create', [App\Http\Controllers\HomeController::class, 'new_ask'])->name('setting-ask-new');
Route::get('/user/setting/Ask/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete_ask'])->name('setting-ask-delete');
Route::get('/user/setting/Ask/update', [App\Http\Controllers\HomeController::class, 'update_ask'])->name('setting-ask-update');
Route::get('/user/setting/Ask/answer', [App\Http\Controllers\HomeController::class, 'student_answer'])->name('student-ask-answer');
Route::get('/user/setting/Ask/answer/end', [App\Http\Controllers\HomeController::class, 'end_student'])->name('student-end-answer');
Route::get('/user/setting/user/edit', [App\Http\Controllers\HomeController::class, 'edit_users'])->name('setting-user-edit');

Route::get('/user/setting/user/role/admin/{id}', [App\Http\Controllers\HomeController::class, 'role_admin'])->name('setting-role-admin');
Route::get('/user/setting/user/role/user/{id}', [App\Http\Controllers\HomeController::class, 'role_user'])->name('setting-role-user');
Route::get('/user/setting/user/role/Guide/{id}', [App\Http\Controllers\HomeController::class, 'role_Guide'])->name('setting-role-Guide');

Route::get('/user/setting/user/bloke/{id}', [App\Http\Controllers\HomeController::class, 'user_blok'])->name('setting-user-blok');
Route::get('/user/setting/user/unbloke/{id}', [App\Http\Controllers\HomeController::class, 'user_unblok'])->name('setting-user-unblok');

Route::get('/user/setting/user/blocked/', [App\Http\Controllers\UserBlok::class, 'page_blok'])->name('setting-user-page-blok');

Route::get('/user/guide/answer/student/{id}', [App\Http\Controllers\HomeController::class, 'page_answer_student'])->name('guide-answer-student');
Route::get('/user/guide/answer/email/', [App\Http\Controllers\HomeController::class, 'send_msg'])->name('guide-send-email');
Route::get('/user/guide/answer/student/', [App\Http\Controllers\HomeController::class, 'guide_student_send_msg'])->name('guide-student');
Route::get('/user/guide/not/answer/student', [App\Http\Controllers\HomeController::class, 'guide_student_not_send_msg'])->name('guide-student-not');
