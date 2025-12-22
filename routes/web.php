<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('leads', LeadController::class);
Route::post('/leads/scrape', [LeadController::class, 'scrape']);

Route::resource('campaigns', CampaignController::class)->except(['show']);
Route::post('/campaigns/{campaign}/send', [CampaignController::class, 'send'])->name('campaigns.send');

Route::get('/analytics', [AnalyticsController::class, 'index']);

// require __DIR__.'/auth.php';
