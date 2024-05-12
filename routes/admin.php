<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function() {
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])
                ->name('dashboard');

        Route::get('/admin/post/list', [PostController::class, 'index'])
                ->name('post.list');

        Route::get('/admin/post/create', [PostController::class, 'create'])
                ->name('post.create');
    
        Route::post('/admin/post/save-create', [PostController::class, 'saveCreate'])
                ->name('post.savecreate');

        Route::get('/admin/post/edit/{id?}', [PostController::class, 'edit'])
                ->name('post.edit');

        Route::post('/admin/post/save-edit', [PostController::class, 'saveEdit'])
                ->name('post.saveedit');
        
        Route::post('/admin/post/delete/{id?}', [PostController::class, 'delete'])
                ->name('post.delete');

        Route::get('/admin/post/categories/list', [PostController::class, 'categoryList'])
                ->name('post.categories');

        Route::get('/admin/post/categories/create', [PostController::class, 'createCategories'])
                ->name('post.createCategories');
        
        Route::post('/admin/post/categories/save-create', [PostController::class, 'saveCategoryCreate'])
                ->name('post.saveCreateCategories');
    
        Route::get('/admin/post/categories/edit/{id?}', [PostController::class, 'editCategory'])
                ->name('postcategory.edit');

});