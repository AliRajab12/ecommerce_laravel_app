<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HelperController;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/fetchProducts',[ProductController::class,'index'])->name("fetchProducts");
Route::get('/categories',[CategoryController::class,'index'])->name("categories");

// Route::get('/products/{id}',[ProductController::class,'showProductDetails'])->name('products.details');
Route::get("/products/{id}",[ProductController::class,'showProductDetails'])->name('products.details');
Route::get("/products/category/{category}",[ProductController::class,'showProductByCategory'])->name('products.category');




// static page(without need to a controller)
Route::inertia('services','Services/Index');
Route::inertia('products','Product/Index');

Route::get('/dashboard', function () {
    $productsCount = Product::count();
    $usersCount = User::count();
    $categoriesCount = Category::count();
    return Inertia::render('Admin/Analytics',['productsCount' => $productsCount,
    'usersCount' => $usersCount,
    'categoriesCount' => $categoriesCount
]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // ---------------------------------- Users ---------------------------------------------------- //
    Route::get('/admin/users',[UserController::class,'index'])->name("admin.users");
    Route::patch('/admin/users',[UserController::class,'update'])->name("admin.users.update");
    Route::delete('/admin/users/{id}',[UserController::class,'destroy'])->name("admin.users.destroy");

    // ----------------------------------- Products --------------------------------------------------- //
    Route::get('/admin/products',[ProductController::class,'fetchProducts'])->name("admin.products");
    Route::delete('/admin/products/{id}',[ProductController::class,'destroy'])->name("admin.products.destroy");

    // ----------------------------------- Categories --------------------------------------------------- //
    Route::get('/admin/categories',[CategoryController::class,'fetchCategories'])->name("admin.categories");
    Route::delete('/admin/categories/{id}',[CategoryController::class,'destroy'])->name("admin.categories.destroy");


});

require __DIR__.'/auth.php';

