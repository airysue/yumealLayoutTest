<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DislikeFoodController;
use App\Http\Controllers\ChainDinerController;
use App\Http\Controllers\DietGroupController;
use App\Http\Controllers\DietBehaviorController;

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

Route::group(['middleware' => 'auth'], function () {

  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::view('profile',  'profile')->name('profile');
});



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

  Route::get('DietBehavior/delete/{id}', [DietBehaviorController::class, 'destroy']);
  Route::resource('DietBehavior', DietBehaviorController::class)->middleware(['role:Admin']);

  Route::get('ChainDiner/delete/{id}', [ChainDinerController::class, 'destroy']);
  Route::resource('ChainDiner', ChainDinerController::class)->middleware(['role:Admin']);
  //Route::resource('ChainDiner', 'App\Http\Controllers\ChainDinerController')->middleware(['role:Admin']);

  Route::get('DietGroup/delete/{id}', [DietGroupController::class, 'destroy']);
  Route::resource('DietGroup', DietGroupController::class)->middleware(['role:Admin']);

  Route::get('Diner/delete/{id}', [DinerController::class, 'destroy']);  //這裡要用get才能正常執行
  Route::resource('Diner', DinerController::class)->middleware(['role:Admin']);

  Route::get('/df_search', 'App\Http\Controllers\DislikeFoodController@search')->name('DislikeFood_search');
  Route::get('/cd_search', 'App\Http\Controllers\ChainDinerController@search')->name('ChainDiner_search');
  Route::get('/dg_search', 'App\Http\Controllers\DietGroupController@search')->name('DietGroup_search');
  Route::get('/db_search', 'App\Http\Controllers\DietBehaviorController@search')->name('DietBehavior_search');
});

Route::group(['namespace' => '\App\Http\Controllers', 'middleware' => 'auth'], function () {

  // Route::get('Diner/delete/{id}', [DinerController::class, 'destroy']);
  // Route::resource('Diner', DinerController::class)->middleware(['role:Vendor']);

  Route::get('Meal/delete/{id}', [MealController::class, 'destroy']);
  Route::resource('Meal', MealController::class)->middleware(['role:Vendor']);

  Route::get('/diner_search', 'App\Http\Controllers\Diner@search')->name('Diner_search');
  Route::get('/meal_search', 'App\Http\Controllers\Meal@search')->name('Meal_search');
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