<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::controller( CategoryController::class)->group(function(){
    // Route::middleware("guest")->group(function(){

Route::get("/categories", "index")->name("categories");
Route::get("/categories/show/{id}", "show")->name("showCategory");
    // });
    Route::middleware("auth")->group(function(){

Route::get("/categories/create","create")->name("createCategory");
Route::post("/categories","store")->name("storeCategory");

Route::get("/categories/edit/{id}","edit")->name("editCategory");
Route::put("/categories/{id}","update")->name("updateCategory");

Route::delete("/categories/{id}","destroy")->name("deleteCategory");
    });
});

Route::controller(AuthController::class)->group(function(){
Route::middleware("guest")->group(function(){
    Route::get("register","registerForm");
    Route::post("register","register")->name("register");

    Route::get("login","loginForm");
    Route::post("login","login")->name("login");
});
    Route::post("logout","logout")->middleware("auth")->name("logout");


});