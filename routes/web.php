<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ContentFeed;
use App\Http\Livewire\ContentPost;
use App\Http\Livewire\AdminPage;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/feed', ContentFeed::class);
Route::middleware(['auth:sanctum', 'verified'])->get('/feed/{id}', ContentPost::class)->name('post');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin_page', AdminPage::class);


