<?php

use Illuminate\Support\Facades\Route;
use App\ETicket\CommonStr;

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
})->name('login');


Route::post('auth', 'AuthenticateController@auth');

Route::group(['middleware'=>'auth:web'], function(){
    Route::get(CommonStr::DASHBOARD_PATH, 'DashboardController@index')->name('dashboard');  
    Route::resource(CommonStr::TICKET_PATH, 'TicketController');
    
    Route::resource('stocks', 'StockController');
    Route::get('stocks/{stock}/sales', 'SalesController@saleForm');
    Route::post('stocks/{stock}/sales', 'SalesController@sale');
    
    Route::get('sales', 'SalesController@index')->name('sales');
    
});


