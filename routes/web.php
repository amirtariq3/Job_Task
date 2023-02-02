<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return redirect()->route('image_upload');
});
Route::get('upload_image', [App\Http\Controllers\TaskController::class, 'index'])->name('image_upload');
Route::post('upload_image', [App\Http\Controllers\TaskController::class, 'store']);
Route::get('show_image', [App\Http\Controllers\TaskController::class, 'show'])->name('all_images');

