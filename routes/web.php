<?php

use App\Http\Controllers\Avaliations;
use App\Http\Controllers\Classes;
use App\Http\Controllers\Disciplines;
use App\Http\Controllers\Students;
use App\Http\Controllers\Teachers;
use Illuminate\Support\Facades\Route;

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


Route::get('/',"App\Http\Controllers\PageController@showHome");
Route::controller(Teachers::class)->group(function () {
    Route::get("/teachers", "index");
    Route::get("/teachers/{id}", "show");
    Route::post("/teachers","create");
});
Route::controller(Students::class)->group(function () {
    Route::get("/students", "index");
    Route::get("/students/{id}", "show");
    Route::post("/students","create");
});
Route::controller(Disciplines::class)->group(function () {
    Route::get("/disciplines", "index");
    Route::get("/disciplines/{id}", "show");
    Route::post("/disciplines","create");
});
Route::controller(Classes::class)->group(function () {
    Route::get("/classes", "index");
    Route::get("/classes/{id}", "show");
    Route::post("/classes","create");
});
Route::controller(Avaliations::class)->group(function () {
    Route::get("/avaliations", "index");
    Route::get("/avaliations/{id}", "show");
    Route::post("/avaliations","create");
});


