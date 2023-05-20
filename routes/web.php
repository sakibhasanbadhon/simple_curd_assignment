<?php

use App\Models\TestModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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
    $allData = TestModel::toBase()->orderBy('id','DESC')->simplePaginate(10);
    return view('assignment',['allData'=>$allData]);
});


Route::resource('assignments', TestController::class)->except('index','create','show');
