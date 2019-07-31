<?php

Route::group(['prefix'=>'sites'],function(){

        $section =  'users';

        Route::get('/destroy/{id?}',    ['middleware'=>'permission:'.$section.'.destroy','as'=>'admin.sites.destroy','uses'=>'Admin\SitesController@destroy']);
        Route::get('/edit/{id?}',       ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.sites.edit','uses'=>'Admin\SitesController@edit']);
        Route::post('/update/{id?}',    ['middleware'=>'permission:'.$section.'.edit','as'=>'admin.sites.update','uses'=>'Admin\SitesController@update']);

        Route::get('/create',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.sites.create','uses'=>'Admin\SitesController@create']);
        Route::post('/store',           ['middleware'=>'permission:'.$section.'.create','as'=>'admin.sites.store','uses'=>'Admin\SitesController@store']);
        Route::get('/show',             ['middleware'=>'permission:'.$section.'.show','as'=>'admin.sites.show','uses'=>'Admin\SitesController@show']);
        Route::get('/index/{search?}',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.sites.index','uses'=>'Admin\SitesController@index']);

    Route::get('/pdf',  ['middleware'=>'permission:'.$section.'.list','as'=>'admin.sites.pdf','uses'=>'Utilities\UtilitiesController@exportListToPdf']);

});
