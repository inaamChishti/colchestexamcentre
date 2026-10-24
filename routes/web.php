<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitePageController;
use App\Support\SitePages;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tuition', [PageController::class, 'tuitionPage'])->name('tuition');
Route::get('/tuition-centre', [PageController::class, 'tuition'])->name('tuition.centre');
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact.us');
Route::get('/form', [PageController::class, 'form'])->name('form');
Route::post('/contact-us', [ContactController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('contact.store');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.post');
Route::get('/sitemap', [SitePageController::class, 'sitemap'])->name('sitemap');
Route::get('/sitemap.xml', [SitePageController::class, 'sitemapXml'])->name('sitemap.xml');

foreach (SitePages::routeNames() as $slug => $routeName) {
    Route::get('/'.$slug, [SitePageController::class, 'show'])
        ->name($routeName)
        ->defaults('slug', $slug);
}

Route::redirect('/login', '/admin/login');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/admin/login', [LoginController::class, 'login'])->name('login.attempt');
});

Route::post('/admin/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('courses', CourseController::class)->except('show');

    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::patch('messages/{message}/status', [MessageController::class, 'updateStatus'])->name('messages.status');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    Route::get('pages', [AdminPageController::class, 'index'])->name('pages.index');
    Route::get('pages/{slug}/edit', [AdminPageController::class, 'edit'])->name('pages.edit');
    Route::put('pages/{slug}', [AdminPageController::class, 'update'])->name('pages.update');
});
