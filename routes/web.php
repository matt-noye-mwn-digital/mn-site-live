<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFormSubmissionController;
use App\Http\Controllers\Admin\AdminKnowledgebaseCategoryController;
use App\Http\Controllers\Admin\AdminKnowledgebaseController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPagesController;
use App\Http\Controllers\Admin\AdminPersonalProjectsController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminPostCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPostTagsController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminWhatIDoController;
use App\Http\Controllers\Admin\AdminWhoWorkWithController;
use App\Http\Controllers\Admin\Pages\AdminHomepageController;
use App\Http\Controllers\Admin\Pages\AdminKnowledgebaseMainPageController;
use App\Http\Controllers\Admin\Pages\AdminWhoWorkWithPageContentController;
use App\Http\Controllers\Frontend\FrontendPortfolioController;
use App\Http\Controllers\Frontend\FrontendWhatIDoController;
use App\Http\Controllers\Frontend\Pages\FrontendAboutPageController;
use App\Http\Controllers\Frontend\Pages\FrontendContactPageController;
use App\Http\Controllers\Frontend\Pages\FrontendGetQuoteController;
use App\Http\Controllers\Frontend\Pages\FrontendHomepageController;
use App\Http\Controllers\Frontend\Pages\FrontendKnowledgebaseController;
use App\Http\Controllers\Frontend\Pages\FrontendWhoWorkWithController;
use App\Http\Controllers\Frontend\Pages\ResourcePageController;
use App\Services\GoogleAnaltyics;
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


    //Form Submissions
    Route::prefix('form-submissions')->group(function(){
        Route::get('contact-form', [AdminFormSubmissionController::class, 'contactForm'])->name('form-submissions.contact-form');
        Route::get('contact-form-single/{id}', [AdminFormSubmissionController::class, 'contactFormSingle'])->name('form-submissions.contact-form-single');
        Route::get('quote-form', [AdminFormSubmissionController::class, 'quoteForm'])->name('form-submissions.quote-form');
        Route::get('quote-form-single/{id}', [AdminFormSubmissionController::class, 'quoteFormSingle'])->name('form-submissions.quote-form-single');
    });

    //Knowledgebase
    Route::prefix('knowledgebase')->name('knowledgebase.')->group(function(){
        Route::get('/', [AdminKnowledgeBaseController::class, 'index'])->name('index');
        Route::get('create', [AdminKnowledgebaseController::class, 'create'])->name('create');
        Route::post('store', [AdminKnowledgebaseController::class, 'store'])->name('store');
        Route::get('{id}/show', [AdminKnowledgebaseController::class, 'show'])->name('show');
        Route::get('edit', [AdminKnowledgebaseController::class, 'edit'])->name('edit');
        Route::put('{id}/update', [AdminknowledgebaseController::class, 'update'])->name('update');
        Route::delete('{id}/destroy', [AdminKnowledgebaseController::class, 'destroy'])->name('destroy');
        Route::resource('knowledgebase-categories', AdminKnowledgebaseCategoryController::class);
    });
    //Route::resource('knowledgebase', AdminKnowledgebaseController::class);

    //Pages
    Route::prefix('pages')->group(function(){
        Route::get('/', [AdminPageController::class, 'index'])->name('pages.index');
        Route::get('create-page', [AdminPageController::class, 'create'])->name('pages.create');
        Route::post('store-page', [AdminPageController::class, 'store'])->name('pages.store');
        Route::get('/edit-page/{id}', [AdminPageController::class, 'edit'])->name('pages.edit');
        Route::put('/update-page/{id}', [AdminPageController::class, 'update'])->name('pages.update');
        Route::resource('homepage', AdminHomepageController::class);
        //Route::resource('knowledgebase', AdminKnowledgebaseMainPageController::class);
        Route::resource('who-work-with-page', AdminWhoWorkWithPageContentController::class);
    });

    //Personal Projects
    Route::resource('personal-projects', AdminpersonalProjectsController::class);

    //Portfolio
    Route::resource('portfolio', AdminPortfolioController::class);

    //Posts & Categories
    Route::prefix('posts')->group(function(){
       Route::resource('post-categories', AdminPostCategoryController::class);
    });
    Route::resource('posts', AdminPostController::class);

    //Settings
    Route::prefix('settings')->group(function(){
        Route::get('/', [AdminSettingsController::class, 'index'])->name('settings.index');
        Route::get('general-settings-create', [AdminSettingsController::class, 'create'])->name('settings.generalSettingsCreate');
        Route::post('general-settings-update', [AdminSettingsController::class, 'update'])->name('settings.generalUpdate');
        Route::post('general-settings-store', [AdminSettingsController::class, 'store'])->name('settings.generalSettingStore');
    });
    //Main Settings resource route here

    //What I do
    Route::resource('what-i-do', AdminWhatIDoController::class);

    //Who Work With
    Route::resource('who-i-work-with', AdminWhoWorkWithController::class);
});

//Client Routes

//Frontend Routes
Route::get('/', [FrontendHomepageController::class, 'index'])->name('homepage.index');
//About me
Route::get('/about-me', [FrontendAboutPageController::class, 'index'])->name('about-me');
Route::prefix('portfolio')->group(function () {
    Route::get('/', [FrontendPortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('{slug}', [FrontendPortfolioController::class, 'show'])->name('portfolio.show');
});
//Resources
Route::prefix('resources')->group(function(){
    Route::get('/', [ResourcePageController::class, 'index'])->name('resources.index');
    Route::get('{slug}', [ResourcePageController::class, 'showSingleCategory'])->name('category.show');
    Route::get('{category}/{slug}', [ResourcePageController::class, 'showSinglePost'])->name('posts.show');
});
//What i do
Route::prefix('what-i-do')->group(function(){
    Route::get('/', [FrontendWhatIDoController::class, 'index']);
    Route::get('{slug}', [FrontendWhatIDoController::class, 'show'])->name('what-i-do.show');
});
//Knowledge base
Route::prefix('knowledgebase')->group(function(){
    Route::get('search', [FrontendKNowledgebaseController::class, 'search'])->name('knowledgebase.search');
    Route::get('/', [FrontendKnowledgebaseController::class, 'index'])->name('knowledgebase.index');
    Route::get('{slug}', [FrontendKNowledgebaseController::class, 'categoryShow'])->name('knowledgebase.categoryShow');
    Route::get('{category}/{slug}', [FrontendKnowledgebaseController::class, 'show'])->name('knowledgebase.show');
});
//Contact Me
Route::prefix('contact-me')->group(function(){
   Route::get('/', [FrontendContactPageController::class, 'index'])->name('contact-me.index');
   Route::post('/store', [FrontendContactPageController::class, 'store'])->name('contact-me.store');
});
//Get Quote
Route::prefix('get-a-quote')->group(function(){
   Route::get('/', [FrontendGetQuoteController::class, 'index'])->name('get-a-quote.index');
   Route::post('/store', [FrontendGetQuoteController::class, 'store'])->name('get-a-quote.store');
});
Route::prefix('who-i-work-with')->group(function(){
    Route::get('/', [FrontendWhoWorkWithController::class, 'index'])->name('who-work-with.index');
    Route::get('{slug}', [FrontendWhoWorkWithController::class, 'show'])->name('who-work-with.show');
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

