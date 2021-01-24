<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnnouncementsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');


// Announcement

Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'welcome'])->name('dashboard');
Route::get('/new/ad', [AnnouncementsController::class, 'newAnnouncement'])->name('newad');
Route::post('/new/ad', [AnnouncementsController::class, 'postAnnouncement'])->name('postad');
Route::get('/edit/{id}', [AnnouncementsController::class, 'editAnnouncement'])->name('editad');
Route::post('/update/{id}', [AnnouncementsController::class, 'updateAnnouncement'])->name('updatead');
Route::get('/ad/{id}', [HomeController::class, 'singleAd'])->name('singlead');
Route::get('/delete/{id}', [AnnouncementsController::class, 'deleteAnnouncement'])->name('deletead');
Route::get('/deleteadfromdashboard/{id}', [DashboardController::class, 'deleteAnnouncementDashboard'])->name('deleteadfromdashboard');
// end announcement








