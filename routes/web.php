<?php

use App\Http\Controllers\CruedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MultipleDataController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});




//jetstream-route
Route::middleware(['auth:web,api',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    //crued-route-manage
    Route::resource('crued',CruedController::class);
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::post('/user/delete',[UserController::class,'delete'])->name('user.delete');

    //multiple data-crued operation
    Route::resource('multiple',MultipleDataController::class);
    Route::post('multiple/multi/',[MultipleDataController::class,'multiMultiple'])->name('multi.multiple');
    Route::get('multiple/delete/{id}',[MultipleDataController::class,'Delete'])->name('delete');

    //Relationship-eluquant
    Route::get('one-To-One-relation',[RelationshipController::class,'oneToOne'])->name('oneToOne.relation');
    Route::post('one-To-One-create',[RelationshipController::class,'oneToCreate'])->name('data.create');

    // one to many
    Route::get('one-To-many-relation',[RelationshipController::class,'oneToMany'])->name('oneToMany.relation');
    Route::post('one-To-many-post-create',[RelationshipController::class,'oneToManyPostCreate'])->name('post.data.create');
    Route::post('one-To-many-comment-create',[RelationshipController::class,'oneToManyCommentCreate'])->name('comment.data.create');

    //many to many relationship
    Route::get('many-To-many-relation',[RelationshipController::class,'manyToMany'])->name('manyToMany.relation');
    Route::post('many-To-many-category-create',[RelationshipController::class,'manyToManyCategoryCreate'])->name('category.data.create');
    Route::post('many-To-many-product-create',[RelationshipController::class,'manyToManyProductCreate'])->name('product.data.create');






    //Role manage
    Route::get('role',[RoleController::class,'index'])->name('role.index');
    Route::post('/permission/store',[RoleController::class,'storePermission'])->name('permission.store');
    Route::post('/Role/store',[RoleController::class,'storeRole'])->name('role.store');
    Route::post('/assign/role',[RoleController::class,'assignRole'])->name('assign.role');
    Route::get('/remove/role/{id}',[RoleController::class,'removeRole'])->name('remove.role');
    Route::get('/role/permission/edit/{id}',[RoleController::class,'permissionEdit'])->name('edit.user.permission');
    Route::post('/permission/update',[RoleController::class,'permissionUpdate'])->name('permission.update');


    // Route::get('/dashboard', function () {
    //     return view('layouts.index');
    // })->name('dashboard');
});
