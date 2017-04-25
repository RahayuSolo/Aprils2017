<?php


Route::resource('articles', 'ArticlesController');

Route::resource('comments', 'CommentsController');

Route::get('importExport', 'MaatwebsiteDemoController@importExport');

Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');

Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');





  