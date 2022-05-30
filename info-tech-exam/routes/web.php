<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectResultController;
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
Route::get('/test', function () {
    return view('admin.supervisor');
});

Route::group(['middleware'=>'auth'],function (){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('all-student-results',[SubjectResultController::class ,'index'])->name('student.results');
    Route::get('add-new-student-result',[SubjectResultController::class,'create'])->name('student.result.create');
    Route::post('add-new-student-result',[SubjectResultController::class,'store'])->name('student.result.save');;
    Route::get('edit-result/{id}',[SubjectResultController::class ,'edit'])->name('edit');
    Route::put('update-result/{id}',[SubjectResultController::class ,'update'])->name('update');
    Route::delete('delete-result/{id}',[SubjectResultController::class ,'destroy'])->name('delete');

});

//Route::get('/dashboard', function () {
//    return view('admin.dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
