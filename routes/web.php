<?php

// HOMEPAGE ROUTES
Route::prefix('/')->group(function(){
		Route::get('/', 'PagesController@index')->name('homepage');
		Route::post('/comment','PagesController@commentstore')->name('comment');
		Route::get('/reserve', 'PagesController@reserve')->name('reserve');
});

// Checkout Form for Credit Card Payment
Route::prefix('checkout')->group(function(){
		Route::get('/', 'RegistrationsController@checkout')->name('checkout');
		Route::post('/', 'RegistrationsController@checkout_store');
		Route::post('/qrcode', 'RegistrationsController@get_qrcode');
		Route::get('/download', 'RegistrationsController@download')->name('download');
		Route::get('/downloadfile', 'RegistrationsController@download_file')->name('downloadfile');
});

// For Cash Registration Form Payment
Route::prefix('cash')->group(function(){
		Route::get('/', 'CashController@cash')->name('cash');
		Route::post('/', 'CashController@cash_store')->name('cash.store');
		Route::post('/qrcode', 'CashController@get_qrcode')->name('cash.get_qrcode');
		Route::get('/download', 'CashController@download')->name('cash.download');
		Route::get('/downloadfile', 'CashController@download_file')->name('cash.downloadfile');
});

// ADMIN ROUTES
Route::prefix('admin')->group(function(){
		// AdminsController
		Route::get('/', 'AdminsController@index')->name('admin.dashboard')->middleware('auth:admin');

		// LoginController
		Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login')->middleware('guest:admin');
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit')->middleware('guest:admin');

		// Inquiries
		Route::get('/inquiry','AdminsController@inquiry')->name('admin.inquiry')->middleware('auth:admin');
		Route::get('/inquiry_show/{inquiry_show}','AdminsController@inquiry_show')->name('admin.inquiry.show')->middleware('auth:admin');
		Route::delete('/inquiry/{inquiry}','AdminsController@inquiry_destroy')->name('admin.inquiry.destroy')->middleware('auth:admin');

		// Email Send
		Route::get('/inquiry/create/{id}','AdminsController@sendemail')->name('admin.inquiry.create')->middleware('auth:admin');
		Route::post('/inquiry/send','AdminsController@send')->name('admin.inquiry.send')->middleware('auth:admin');

		// Credit Card List
		Route::get('/registered','AdminsController@registered')->name('admin.registered')->middleware('auth:admin');
		Route::get('/registered/{registered}','AdminsController@registered_show')->name('admin.registered.show')->middleware('auth:admin');
		Route::delete('/registered/{registered}','AdminsController@registered_destroy')->name('admin.registered.destroy')->middleware('auth:admin');

		// Cash Only List
		Route::get('/cash','AdminsController@cash')->name('admin.cash')->middleware('auth:admin');
		Route::post('/cash','AdminsController@cash_approved')->name('admin.cash.approved')->middleware('auth:admin');
		Route::delete('/cash/{cash}','AdminsController@cash_destory')->name('admin.cash.destroy')->middleware('auth:admin');

		// Vue QRCode Tester
		Route::get('/qrcodetester','QRCodesController@qrcodeTester')->name('admin.qrcodetester')->middleware('auth:admin');
		Route::post('/qrcodetester','QRCodesController@store_qrcodeTester')->middleware('auth:admin');

		// Vue QRCode Scanner
		Route::get('/qrcodescanner','QRCodesController@qrcodeScanner')->middleware('auth:admin');
		Route::post('/qrcodescanner','QRCodesController@store_qrcodeScanner')->name('admin.qrcodescanner')->middleware('auth:admin');

		// Logs
		Route::get('/logs','AdminsController@logs')->name('admin.logs')->middleware('auth:admin');
		Route::delete('/logs/{logs}','AdminsController@log_destroy')->name('admin.log.destroy')->middleware('auth:admin');
		// Admin Logout
		Route::post('/logout','Auth\AdminLoginController@adminLogout')->name('admin.logout');
});
