<?php

use App\Http\Controllers\QueryController;
use App\Http\Controllers\UploadFailedController;
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

Route::get('/', [UploadFailedController::class, 'FailedIndex']);
Route::post('/download', [QueryController::class, 'queryByDate'])->name('download');


Route::get('/repush/{smsid}', [UploadFailedController::class, 'updateFailedSms'])->name('repush');
