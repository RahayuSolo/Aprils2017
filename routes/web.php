<?php


Route::resource('articles', 'ArticlesController');

Route::get('/', 'ArticlesController@index')->name('root');

Route::resource('comments', 'CommentsController');

Route::get('importExport', 'MaatwebsiteDemoController@importExport')->name('maatweb');

Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel')->name('export');

Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');





  