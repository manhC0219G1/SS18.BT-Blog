<?php

Route::group(['prefix'=>'blogs'],function (){
    Route::get('/index','BlogController@index')->name('blogs.index');
    Route::get('/create','BlogController@create')->name('blogs.create');
    Route::post('/create','BlogController@store')->name('blogs.store');
    Route::get('/{blogID}/delete','BlogController@delete')->name('blogs.delete');
    Route::post('/{blogID}/delete','BlogController@destroy')->name('blogs.destroy');
    Route::get('/{blogID}/edit','BlogController@edit')->name('blogs.edit');
    Route::post('/{blogID}/edit','BlogController@update')->name('blogs.update');
});