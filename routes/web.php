<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\WebsiteController;
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
})->name('home');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [AuthManager::class, 'dashboard'])->name('dashboard');
    Route::get('/website', [AuthManager::class, 'website'])->name('website');
    Route::get('/about', [AuthManager::class, 'about'])->name('about');
    Route::get('/timeline', [AuthManager::class, 'timeline'])->name('timeline');

    
    Route::get('/website/create', [WebsiteController::class, 'create'])->name('website.create');
    Route::post('/website', [WebsiteController::class, 'store'])->name('website.store');
    Route::get('/website/{website}/edit', [WebsiteController::class, 'edit'])->name('website.edit');
    Route::put('/website/{website}/update', [WebsiteController::class, 'update'])->name('website.update');
    Route::get('/website/{id}/delete', [WebsiteController::class, 'delete'])->name('website.delete');

    Route::get('/about/create', [WebsiteController::class, 'createAbout'])->name('about.create');
    Route::post('/about', [WebsiteController::class, 'storeAbout'])->name('about.store');
    Route::get('/about/{id}/edit', [WebsiteController::class, 'editAbout'])->name('about.edit');
    Route::put('/about/{id}/update', [WebsiteController::class, 'updateAbout'])->name('about.update');
    Route::get('/about/{id}/delete', [WebsiteController::class, 'deleteAbout'])->name('about.delete');

    Route::get('/timeline/create', [WebsiteController::class, 'createTimeline'])->name('timeline.create');
    Route::post('/timeline', [WebsiteController::class, 'storeTimeline'])->name('timeline.store');
    Route::get('/timeline/{id}/edit', [WebsiteController::class, 'editTimeline'])->name('timeline.edit');
    Route::put('/timeline/{id}/update', [WebsiteController::class, 'updateTimeline'])->name('timeline.update');
    Route::get('/timeline/{id}/delete', [WebsiteController::class, 'deleteTimeline'])->name('timeline.delete');

    Route::get('/experience/create', [WebsiteController::class, 'createExperience'])->name('experience.create');
    Route::post('/experience', [WebsiteController::class, 'storeExperience'])->name('experience.store');
    Route::get('/experience/{id}/edit', [WebsiteController::class, 'editExperience'])->name('experience.edit');
    Route::put('/experience/{id}/update', [WebsiteController::class, 'updateExperience'])->name('experience.update');
    Route::get('/experience/{id}/delete', [WebsiteController::class, 'deleteExperience'])->name('experience.delete');

    Route::get('/skill/create', [WebsiteController::class, 'createSkill'])->name('skill.create');
    Route::post('/skill', [WebsiteController::class, 'storeSkill'])->name('skill.store');
    Route::get('/skill/{id}/edit', [WebsiteController::class, 'editSkill'])->name('skill.edit');
    Route::put('/skill/{id}/update', [WebsiteController::class, 'updateSkill'])->name('skill.update');
    Route::get('/skill/{id}/delete', [WebsiteController::class, 'deleteSkill'])->name('skill.delete');

    Route::get('/work/create', [WebsiteController::class, 'createWork'])->name('work.create');
    Route::post('/work', [WebsiteController::class, 'storeWork'])->name('work.store');
    Route::get('/work/{id}/edit', [WebsiteController::class, 'editWork'])->name('work.edit');
    Route::put('/work/{id}/update', [WebsiteController::class, 'updateWork'])->name('work.update');
    Route::get('/work/{id}/delete', [WebsiteController::class, 'deleteWork'])->name('work.delete');

    Route::get('/users/create', [WebsiteController::class, 'createUser'])->name('user.create');
    Route::post('/users', [WebsiteController::class, 'storeUser'])->name('user.store');
    Route::get('/users/{id}/edit', [WebsiteController::class, 'editUser'])->name('user.edit');
    Route::put('/users/{id}/update', [WebsiteController::class, 'updateUser'])->name('user.update');
    
    Route::get('/website', [WebsiteController::class, 'website'])->name('WebsiteName.show');
    Route::get('/about', [WebsiteController::class, 'about'])->name('about.show');
    Route::get('/timeline', [WebsiteController::class, 'timeline'])->name('timeline.show');
    Route::get('/skill', [WebsiteController::class, 'skill'])->name('skill.show');
    Route::get('/work', [WebsiteController::class, 'work'])->name('work.show');
    Route::get('/experience', [WebsiteController::class, 'experience'])->name('experience.show');
    Route::get('/users', [WebsiteController::class, 'user'])->name('user.show');
});

// Route::get('/welcome', [WebsiteController::class, 'sendContact'])->name('contact.send');
Route::post('/', [WebsiteController::class, 'storeContact'])->name('contact.store');
Route::get('/', [WebsiteController::class, 'welcome'])->name('WebsiteName.index');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// Catch-all route for undefined routes
Route::fallback(function () {
    return view('404');
});
