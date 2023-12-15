<?php
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Product\SearchController;
use App\Http\Controllers\Front\Product\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Front\Product\ProductController as ProductProductController;



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

Route::get('/', function () {
    return view('authentication.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group([
    'middleware'=>['auth','check.role']
],function(){
    Route::get('/login', function () {
        if (auth()->user()->role=='admin') {
            return redirect('products-client'); // Redirect authenticated users to the home page
        } elseif(auth()->user()->role=='user'){
            return redirect('products-client'); // Redirect authenticated users to the home page
        }
        else {
            return view('auth.login'); // Show the login page for non-authenticated users
        }
    })->name('login');
    
    Route::resource('products',ProductController::class);
    Route::resource('products-client',ProductProductController::class);
    Route::resource('category',CategoryController::class);
    Route::get('/search', SearchController::class.'@search');
    Route::get('/category/{categoryId}/products', [BookController::class, 'index'])->name('category.products');
});


require __DIR__.'/auth.php';