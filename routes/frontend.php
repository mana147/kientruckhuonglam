<?php

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::get('/gioi-thieu', [IndexController::class, 'aboutUs']);

Route::get('/du-an', [IndexController::class, 'project'])
        ->name('project');

Route::get('/du-an/{slug}', [IndexController::class, 'project_detail'])
        ->name('project.detail');

Route::get('/nha-may', [IndexController::class, 'factory']);

Route::get('/tin-tuc', [IndexController::class, 'news'])
        ->name('news');

Route::get('/tin-tuc/{slug}', [IndexController::class, 'news_detail'])
        ->name('news.detail');

Route::get('/lien-he', [IndexController::class, 'contact']);
