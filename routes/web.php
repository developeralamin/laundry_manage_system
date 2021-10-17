<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaundryCategorYController;
use App\Http\Controllers\LaundryListController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\InventoryController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('laundry')->group(function (){

Route::get('/view',[LaundryCategorYController::class,'LandryView'])->name('laundry.view');
Route::get('/add',[LaundryCategorYController::class,'LandryAdd'])->name('laundry.add');
Route::post('/store',[LaundryCategorYController::class,'LandryStore'])->name('laundry.store');
Route::get('/edit/{id}',[LaundryCategorYController::class,'LandryEdit'])->name('laundry.edit');
Route::post('/update/{id}',[LaundryCategorYController::class,'LandryUpdate'])->name('laundry.update');
Route::get('/delete/{id}',[LaundryCategorYController::class,'LandryDelete'])->name('laundry.delete');

});


Route::prefix('laundry-list')->group(function (){

Route::get('/view',[LaundryListController::class,'LandryListView'])->name('laundryList.view');
Route::get('/add',[LaundryListController::class,'LandryListAdd'])->name('laundryList.add');
Route::post('/store',[LaundryListController::class,'LandryListStore'])->name('laundryList.store');
Route::get('/edit/{id}',[LaundryListController::class,'LandryListEdit'])->name('laundryList.edit');
Route::post('/update/{id}',[LaundryListController::class,'LandryListUpdate'])->name('laundryList.update');
Route::get('/delete/{id}',[LaundryListController::class,'LandryListDelete'])->name('laundryList.delete');

Route::get('/findProductName',[LaundryListController::class,'findProductName'])->name('findProductName');
Route::get('/findPrice',[LaundryListController::class,'findPrice'])->name('findPrice');


});


//SupplyController all routes here


Route::prefix('supply')->group(function (){

Route::get('/view',[SupplyController::class,'SupplyView'])->name('supply.view');
Route::get('/add',[SupplyController::class,'SupplyAdd'])->name('supply.add');
Route::post('/store',[SupplyController::class,'SupplyStore'])->name('supply.store');
Route::get('/edit/{id}',[SupplyController::class,'SupplyEdit'])->name('supply.edit');
Route::post('/update/{id}',[SupplyController::class,'SupplyUpdate'])->name('supply.update');
Route::get('/delete/{id}',[SupplyController::class,'SupplyDelete'])->name('supply.delete');

});



Route::prefix('inventory')->group(function (){

Route::get('/view',[InventoryController::class,'inventoryView'])->name('inventory.view');
Route::get('/in-out',[InventoryController::class,'inventoryINOut'])->name('InOutList.view');
Route::get('/add',[InventoryController::class,'inventoryAdd'])->name('inventory.add');
Route::post('/store',[InventoryController::class,'inventoryStore'])->name('inventory.store');
Route::get('/edit/{id}',[InventoryController::class,'inventoryEdit'])->name('inventory.edit');
Route::post('/update/{id}',[InventoryController::class,'inventoryUpdate'])->name('inventory.update');
Route::get('/delete/{id}',[InventoryController::class,'inventoryDelete'])->name('inventory.delete');

});
