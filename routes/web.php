<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminKnowledgebaseCategoryController;
use App\Http\Controllers\Admin\AdminKnowledgebaseController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminPersonalProjectsController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminPostCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPostTagsController;
use App\Http\Controllers\Admin\AdminWhatIDoController;
use App\Http\Controllers\Admin\Pages\AdminHomepageController;
use App\Http\Controllers\Frontend\FrontendPortfolioController;
use App\Http\Controllers\Frontend\Pages\FrontendHomepageController;
use App\Http\Controllers\Frontend\Pages\FrontendKnowledgebaseController;
use App\Http\Controllers\Frontend\Pages\ResourcePageController;
use Illuminate\Support\Facades\Route;

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
//Admin Routes
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    //Knowledgebase
    Route::prefix('knowledgebase')->group(function(){
        Route::resource('knowledgebase-categories', AdminKnowledgebaseCategoryController::class);
    });
    Route::resource('knowledgebase', AdminKnowledgebaseController::class);

    //Pages
    Route::prefix('pages')->group(function(){
        Route::resource('homepage', AdminHomepageController::class);
    });
    Route::resource('pages', AdminPagesController::class);

    //Portfolio
    Route::resource('portfolio', AdminPortfolioController::class);

    //Personal Projects
    Route::resource('personal-projects', AdminpersonalProjectsController::class);

    //Posts & Categories
    Route::prefix('posts')->group(function(){
       Route::resource('post-categories', AdminPostCategoryController::class);
       Route::resource('post-tags', AdminPostTagsController::class);
    });
    Route::resource('posts', AdminPostController::class);

    //Settings
    Route::prefix('settings')->group(function(){

    });
    //Main Settings resource route here

    //What I do
    Route::resource('what-i-do', AdminWhatIDoController::class);
});

//Client Routes

//Frontend Routes
Route::get('/', [FrontendHomepageController::class, 'index']);
Route::prefix('portfolio')->group(function () {
    Route::get('/', [FrontendPortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('{slug}', [FrontendPortfolioController::class, 'show'])->name('portfolio.show');
});
Route::prefix('resources')->group(function(){
    Route::get('/', [ResourcePageController::class, 'index']);
    Route::get('{slug}', [ResourcePageController::class, 'showSingleCategory'])->name('category.show');
    Route::get('{category}/{slug}', [ResourcePageController::class, 'showSinglePost'])->name('posts.show');
});

Route::get('/knowledgebase', [FrontendKnowledgebaseController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

