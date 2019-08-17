<?php

$model = 'sites';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Sitios',

    //routes
    'indexRoute'    => 'admin.'.$model.'.index',
    'storeRoute'    => 'admin.'.$model.'.store',
    'createRoute'   => 'admin.'.$model.'.create',
    'showRoute'     => 'admin.'.$model.'.show',
    'editRoute'     => 'admin.'.$model.'.edit',
    'updateRoute'   => 'admin.'.$model.'.update',
    'destroyRoute'  => 'admin.'.$model.'.destroy',

    'postStoreRoute'  => 'admin.'.$model.'.index',
    'postUpdateRoute' => 'admin.'.$model.'.index',

    //urls
    'destroyUrl' => 'admin/'.$model.'/destroy/',

    //views
    'storeView' =>  'admin.'.$model.'.form',
    'editView'  =>  'admin.'.$model.'.form',

    //path
    'imagesPath' => 'uploads/'.$model.'/images/',

    //polymorphic
    'is_logueable'      => true,
    'is_imageable'      => false,
    'is_brancheable'    => false,
    

    //column search
    'search' => [
        
            'Nombre'    => 'name',
            //'Direccion'  => 'address' ,
            //'Email'     => 'email'
    ],

    'validationsStore' => [

            'title'          => 'required',
            'address'     => 'required',
            'lat'     => 'required',
            'long'     => 'required',


    ],

    'validationsUpdate' => [

        'title'          => 'required',
        'address'     => 'required',
        'lat'     => 'required',
        'long'     => 'required',

    ],

    'export' => [
        'nombre' => 'name'
    ]

];
