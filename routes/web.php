<?php

use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::middleware('localization')->group(function () {
    Route::get('/login', \App\Http\Livewire\Login::class)->name('login');
    Route::get('/logout', \App\Http\Livewire\Login::class)->name('logout');
    Route::get('/profile', \App\Http\Livewire\Profile::class)->name('profile')->middleware('auth');

    // Route::middleware('auth')->group(function () {
        Route::get('/', \App\Http\Livewire\Frontend\Index::class)->name('home');
    // });

    Route::prefix('services')->group(function () {
        Route::get('/', \App\Http\Livewire\Services\Services::class)->name('services');
        Route::get('/{token}', \App\Http\Livewire\Services\ServicesShow::class)->name('services.show');
    });

    Route::prefix('carts')->group(function () {
        Route::get('/', \App\Http\Livewire\Carts\Carts::class)->name('carts');
    });

    Route::prefix('applicants')->group(function () {
        Route::get('/', \App\Http\Livewire\Applicants\Applicants::class)->name('applicants');
        Route::get('/pdf/{applicant_id}', \App\Http\Livewire\Applicants\ApplicantsPdf::class)->name('applicants.pdf');
    });

    Route::prefix('notifications')->group(function () {
        Route::get('/', \App\Http\Livewire\Notifications\Notifications::class)->name('notifications');
    });

    Route::middleware(['auth', 'role:Admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/', \App\Http\Livewire\Admin::class)->name('admin');
        Route::get('/services', \App\Http\Livewire\Services\ServicesAdmin::class)->name('services');
        Route::get('/services/{token}', \App\Http\Livewire\Services\ServicesShowAdmin::class)->name('services.show');
        Route::get('/types', \App\Http\Livewire\Types\Types::class)->name('types');
        Route::get('/statuses', \App\Http\Livewire\Statuses\Statuses::class)->name('statuses');
        Route::get('/categories', \App\Http\Livewire\Category\CategoryComponent::class)->name('categories');
        Route::get('/statistics', \App\Http\Livewire\Statistics::class)->name('statistics');
        Route::get('/applicants', \App\Http\Livewire\Applicants\ApplicantsAdmin::class)->name('applicants');
        Route::get('/carts', \App\Http\Livewire\Carts\CartsAdmin::class)->name('carts');
        Route::get('/notifications', \App\Http\Livewire\Notifications\NotificationsAdmin::class)->name('notifications');
        Route::get('/telescope-emails', \App\Http\Livewire\TelescopeEmails\TelescopeEmails::class)->name('telescope-emails');
        Route::get('/operations',\App\Http\Livewire\OperationServices\OperationService::class)->name('operations');
        Route::get('/questions',\App\Http\Livewire\QuestionAnswer\QuestionAnswer::class)->name('questions');
        Route::get('/price',\App\Http\Livewire\PricesShow\PriceShow::class)->name('price');
        Route::get('/priceservices',\App\Http\Livewire\PriceServices\PriceServece::class)->name('priceservices');
        Route::get('/customerreviews',\App\Http\Livewire\CustomReviews\CustomReview::class)->name('customerreviews');
    });
});

Route::get('/index',\App\Http\Livewire\Frontend\Index::class)->name('index');
Route::get('/serv-detail/{model}',\App\Http\Livewire\Frontend\ServicesDetails::class)->name('serv-detail');
Route::get('/contact-us',\App\Http\Livewire\Frontend\ContactUs::class)->name('/contact-us');
Route::get('/oreder-service',\App\Http\Livewire\Frontend\OrderService::class)->name('/oreder-service');
Route::get('/show-price',\App\Http\Livewire\Frontend\ShowPrice::class)->name('/show-price');
Route::get('/all-services',\App\Http\Livewire\Frontend\AllServices::class)->name('/all-services');

