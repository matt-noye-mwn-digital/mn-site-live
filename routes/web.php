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
use App\Http\Controllers\Admin\Pages\AdminKnowledgebaseMainPageController;
use App\Http\Controllers\Frontend\FrontendGetQuoteController;
use App\Http\Controllers\Frontend\FrontendPortfolioController;
use App\Http\Controllers\Frontend\FrontendWhatIDoController;
use App\Http\Controllers\Frontend\Pages\FrontendAboutPageController;
use App\Http\Controllers\Frontend\Pages\FrontendContactPageController;
use App\Http\Controllers\Frontend\Pages\FrontendHomepageController;
use App\Http\Controllers\Frontend\Pages\FrontendKnowledgebaseController;
use App\Http\Controllers\Frontend\Pages\ResourcePageController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

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
        Route::resource('knowledgebase', AdminKnowledgebaseMainPageController::class);
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
Route::get('/', [FrontendHomepageController::class, 'index'])->name('homepage.index');
Route::get('/about-me', [FrontendAboutPageController::class, 'index'])->name('about-me');
Route::prefix('portfolio')->group(function () {
    Route::get('/', [FrontendPortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('{slug}', [FrontendPortfolioController::class, 'show'])->name('portfolio.show');
});
Route::prefix('resources')->group(function(){
    Route::get('/', [ResourcePageController::class, 'index'])->name('resources.index');
    Route::get('{slug}', [ResourcePageController::class, 'showSingleCategory'])->name('category.show');
    Route::get('{category}/{slug}', [ResourcePageController::class, 'showSinglePost'])->name('posts.show');
});
Route::prefix('what-i-do')->group(function(){
    Route::get('/', [FrontendWhatIDoController::class, 'index']);
    Route::get('{slug}', [FrontendWhatIDoController::class, 'show'])->name('what-i-do.show');
});
Route::prefix('knowledgebase')->group(function(){
    Route::get('search', [FrontendKNowledgebaseController::class, 'search'])->name('knowledgebase.search');
    Route::get('/', [FrontendKnowledgebaseController::class, 'index'])->name('knowledgebase.index');
    Route::get('{slug}', [FrontendKNowledgebaseController::class, 'categoryShow'])->name('knowledgebase.categoryShow');
    Route::get('{category}/{slug}', [FrontendKnowledgebaseController::class, 'show'])->name('knowledgebase.show');
});
Route::prefix('contact-me')->group(function(){
   Route::get('/', [FrontendContactPageController::class, 'index'])->name('contact-me.index');
   Route::post('/store', [FrontendContactPageController::class, 'store'])->name('contact-me.store');
});
Route::prefix('get-a-quote')->group(function(){
   route::get('/', [FrontendGetQuoteController::class, 'index'])->name('get-a-quote.index');
});

//Sitemap route do not touch
Route::get('generate-sitemap', function () {
    $baseUrl = config('app.url');
    SitemapGenerator::create($baseUrl)
        ->writeToFile(public_path('sitemap.xml'));
});
Route::get('/generate-sitemap', function() {
    $exitCode = Artisan::call('sitemap:generate');
    return "sitemap generated";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

