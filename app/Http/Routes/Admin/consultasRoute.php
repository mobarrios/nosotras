<?php

Route::group(['prefix'=>'consultas'],function(){

        $section =  'users';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.consultas.destroy','uses'=>'Admin\ConsultasController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.consultas.edit','uses'=>'Admin\ConsultasController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.consultas.update','uses'=>'Admin\ConsultasController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.consultas.create','uses'=>'Admin\ConsultasController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.consultas.store','uses'=>'Admin\ConsultasController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.consultas.show','uses'=>'Admin\ConsultasController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.consultas.index','uses'=>'Admin\ConsultasController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.consultas.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});
