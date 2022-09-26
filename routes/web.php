<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CheckController;
use App\Http\Controllers\DislikeFoodController;


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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/user/{id}', [CheckController::class, 'show'])->name('user.show');
// Route::get('/create', [CheckController::class, 'create'])->name('user.input');



// todo: how to know what route was protect by auth ? any cmd like route:list ?
Route::group(['prefix' => 'laratrust', 'namespace' => '\App\Http\Controllers', 'middleware' => 'auth'], function () {


  //below works, but can move to outside to Route:group(['middleware' => 'auth'])
  // Route::resource('/', 'RolesAssignmentController', ['as' => 'laratrust'])->middleware('auth');

  //check not only login but also login as admin role(這區域的網址會出現laratrust)
  Route::resource('permissions', 'PermissionsController', ['as' => 'laratrust'])->only(['index', 'create', 'store', 'edit', 'update'])->middleware(['role:Admin']);
  Route::resource('roles', 'RolesController', ['as' => 'laratrust'])->middleware(['role:Admin']);
  Route::resource('roles-assignment', 'RolesAssignmentController', ['as' => 'laratrust'])
    ->only(['index', 'edit', 'update'])->middleware(['role:Admin']);
});


// todo: how to know what route was protect by auth ? any cmd like route:list ?
Route::group(['namespace' => '\App\Http\Controllers', 'middleware' => 'auth'], function () {



  Route::get('DislikeFood/delete/{id}', [DislikeFoodController::class, 'destroy']);  //這裡要用get才能正常執行
  Route::resource('DislikeFood', DislikeFoodController::class)->middleware(['role:Admin']);

  //[UserController::class,'destroy'])->name('kullanicilar.remove');  'as' => 'del_icon',

  // Route::resource('dietBehavior', DietBehaviorController::class)->middleware(['role:Admin']);
  // Route::resource('chainDiner', ChainDinerController::class)->middleware(['role:Admin']);
  // Route::resource('dietGroup', DietGroupController::class)->middleware(['role:Admin']);
});




// Route::group(['prefix' => 'dashboard/vendor/', 'namespace' => '\App\Http\Controllers', 'middleware' => 'auth'], function () {

//     Route::get('/create',[CheckController::class, 'create']);
//     //below works, but can move to outside to Route:group(['middleware' => 'auth'])
//     // Route::resource('/', 'RolesAssignmentController', ['as' => 'laratrust'])->middleware('auth');

//     //check not only login but also login as admin role
//     Route::resource('update', 'VendorController', ['as' => 'laratrust'])->only(['index', 'create', 'store', 'edit', 'update'])->middleware(['role:Vendor']);
//     Route::resource('index', 'VendorController', ['as' => 'laratrust'])->middleware(['role:Vendor']);
//     Route::resource('roles-assignment', 'VendorController', ['as' => 'laratrust'])
//     ->only(['index', 'edit', 'update'])->middleware(['role:Admin']);

// });






require __DIR__ . '/auth.php';