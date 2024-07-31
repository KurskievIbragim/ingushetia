<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [HomeController::class, 'index']);

Route::get('/region', function () {
    return Inertia::render('Region/Region');
});
Route::get('/economic', function () {
    return Inertia::render('Region/Economic');
});
Route::get('/history', function () {
    return Inertia::render('Region/History');
});

Route::get('/municipality', function () {
    return Inertia::render('Region/Municipality');
});
Route::get('/pravitelstvo', function () {
    return Inertia::render('Authority/Authority');
});

Route::get('/sostav-pravitelstva', function () {
    return Inertia::render('Authority/GovernmentTeam');
});


Route::get('/news', function () {
    return Inertia::render('News/News');
})->name('news.index');

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/admin', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->middleware(['auth', 'verified'])->name('admin');


    Route::group(['namespace' => 'News', 'prefix' => 'admin'], function () {
        Route::get('/news', [App\Http\Controllers\Admin\NewsController::class, 'index'])->name('admin.news.index');
        Route::get('/news/create', [App\Http\Controllers\Admin\NewsController::class, 'create'])->name('admin.news.create');
        Route::post('/news/store', [App\Http\Controllers\Admin\NewsController::class, 'store'])->name('admin.news.store');
        Route::get('/news/{news}/edit', [App\Http\Controllers\Admin\NewsController::class, 'edit'])->name('admin.news.edit');
        Route::patch('/news/{news}', [App\Http\Controllers\Admin\NewsController::class, 'update'])->name('admin.news.update');
        Route::delete('/news/{news}', [App\Http\Controllers\Admin\NewsController::class, 'destroy'])->name('admin.news.delete');

    });

    Route::group(['namespace' => 'NewsIng', 'prefix' => 'admin'], function () {
        Route::get('/news-ing', [App\Http\Controllers\Admin\NewsIngController::class, 'index'])->name('admin.newsIng.index');
        Route::get('/news-ing/create', [App\Http\Controllers\Admin\NewsIngController::class, 'create'])->name('admin.newsIng.create');
        Route::post('/news-ing/store', [App\Http\Controllers\Admin\NewsIngController::class, 'store'])->name('admin.newsIng.store');
        Route::get('/news-ing/{news}/edit', [App\Http\Controllers\Admin\NewsIngController::class, 'edit'])->name('admin.newsIng.edit');
        Route::patch('/news-ing/{news}', [App\Http\Controllers\Admin\NewsIngController::class, 'update'])->name('admin.newsIng.update');
        Route::delete('/news-ing/{news}', [App\Http\Controllers\Admin\NewsIngController::class, 'destroy'])->name('admin.newsIng.delete');

    });


    Route::group(['namespace' => 'Video', 'prefix' => 'admin'], function () {
        Route::get('/videos', [App\Http\Controllers\Admin\VideoController::class, 'index'])->name('admin.videos.index');
        Route::get('/videos/create', [App\Http\Controllers\Admin\VideoController::class, 'create'])->name('admin.videos.create');
        Route::post('/videos/store', [App\Http\Controllers\Admin\VideoController::class, 'store'])->name('admin.videos.store');
        Route::get('/videos/{video}/edit', [App\Http\Controllers\Admin\VideoController::class, 'edit'])->name('admin.videos.edit');
        Route::patch('/videos/{video}', [App\Http\Controllers\Admin\VideoController::class, 'update'])->name('admin.videos.update');
        Route::delete('/videos/{video}', [App\Http\Controllers\Admin\VideoController::class, 'destroy'])->name('admin.videos.delete');

    });

    Route::group(['namespace' => 'PhotoReportage', 'prefix' => 'admin'], function () {
        Route::get('/photo-reportage', [App\Http\Controllers\Admin\PhotoReportageController::class, 'index'])->name('admin.photoReportage.index');
        Route::get('/photo-reportage/create', [App\Http\Controllers\Admin\PhotoReportageController::class, 'create'])->name('admin.photoReportage.create');
        Route::post('/photo-reportage/store', [App\Http\Controllers\Admin\PhotoReportageController::class, 'store'])->name('admin.photoReportage.store');
        Route::get('/photo-reportage/{reportage}/edit', [App\Http\Controllers\Admin\PhotoReportageController::class, 'edit'])->name('admin.photoReportage.edit');
        Route::patch('/photo-reportage/{reportage}', [App\Http\Controllers\Admin\PhotoReportageController::class, 'update'])->name('admin.photoReportage.update');
        Route::delete('/photo-reportage/{reportage}', [App\Http\Controllers\Admin\PhotoReportageController::class, 'destroy'])->name('admin.photoReportage.delete');

    });

    Route::group(['namespace' => 'Category', 'prefix' => 'admin'], function () {
        Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories.index');

        Route::get('/categories/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/categories/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::patch('/categories/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.categories.delete');

    });

    Route::group(['namespace' => 'Document', 'prefix' => 'admin'], function () {
        Route::get('/documents', [App\Http\Controllers\Admin\DocumentController::class, 'index'])->name('admin.documents.index');

        Route::get('/documents/create', [App\Http\Controllers\Admin\DocumentController::class, 'create'])->name('admin.documents.create');
        Route::post('/documents/store', [App\Http\Controllers\Admin\DocumentController::class, 'store'])->name('admin.documents.store');
        Route::get('/documents/{document}/edit', [App\Http\Controllers\Admin\DocumentController::class, 'edit'])->name('admin.documents.edit');
        Route::patch('/documents/{document}', [App\Http\Controllers\Admin\DocumentController::class, 'update'])->name('admin.documents.update');
        Route::delete('/documents/{document}', [App\Http\Controllers\Admin\DocumentController::class, 'destroy'])->name('admin.documents.delete');

    });

    Route::group(['namespace' => 'Page', 'prefix' => 'admin'], function () {
        Route::get('/pages', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('admin.page.index');

        Route::get('/pages/create', [App\Http\Controllers\Admin\PageController::class, 'create'])->name('admin.page.create');
        Route::post('/pages/store', [App\Http\Controllers\Admin\PageController::class, 'store'])->name('admin.page.store');
        Route::get('/pages/{page}/edit', [App\Http\Controllers\Admin\PageController::class, 'edit'])->name('admin.page.edit');
        Route::patch('/pages/{page}', [App\Http\Controllers\Admin\PageController::class, 'update'])->name('admin.page.update');
        Route::delete('/pages/{page}', [App\Http\Controllers\Admin\PageController::class, 'destroy'])->name('admin.page.delete');

    });


    Route::group(['namespace' => 'Resource', 'prefix' => 'admin'], function () {
        Route::get('/resources', [App\Http\Controllers\Admin\ResourceController::class, 'index'])->name('admin.resources.index');

        Route::get('/resources/create', [App\Http\Controllers\Admin\ResourceController::class, 'create'])->name('admin.resources.create');
        Route::post('/resources/store', [App\Http\Controllers\Admin\ResourceController::class, 'store'])->name('admin.resources.store');
        Route::get('/resources/{resource}/edit', [App\Http\Controllers\Admin\ResourceController::class, 'edit'])->name('admin.resources.edit');
        Route::patch('/resources/{resource}', [App\Http\Controllers\Admin\ResourceController::class, 'update'])->name('admin.resources.update');
        Route::delete('/resources/{resource}', [App\Http\Controllers\Admin\ResourceController::class, 'destroy'])->name('admin.resources.delete');

    });

    Route::group(['namespace' => 'Agency', 'prefix' => 'admin'], function () {
        Route::get('/agencies', [App\Http\Controllers\Admin\AgencyController::class, 'index'])->name('admin.agencies.index');

        Route::get('/agencies/create', [App\Http\Controllers\Admin\AgencyController::class, 'create'])->name('admin.agencies.create');
        Route::post('/agencies/store', [App\Http\Controllers\Admin\AgencyController::class, 'store'])->name('admin.agencies.store');
        Route::get('/agencies/{agency}/edit', [App\Http\Controllers\Admin\AgencyController::class, 'edit'])->name('admin.agencies.edit');
        Route::patch('/agencies/{agency}', [App\Http\Controllers\Admin\AgencyController::class, 'update'])->name('admin.agencies.update');
        Route::delete('/agencies/{agency}', [App\Http\Controllers\Admin\AgencyController::class, 'destroy'])->name('admin.agencies.delete');

    });

    Route::group(['namespace' => 'User', 'prefix' => 'admin'], function () {
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');

        Route::get('/users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.users.create');
        Route::post('/users/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.users.edit');
        Route::patch('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.users.delete');

    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
