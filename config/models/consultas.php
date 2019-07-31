<?php

$model = 'consultas';

return [

    'paginate'      => '50',

    //nombre de la seccion
    'sectionName'   => 'Consultas',

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

            'descripcion'          => 'required',
            'solicitud_user_id'          => 'required',
            'respuesta_user_id'          => 'required',
            'tipo_consulta'          => 'required',
            'estado'          => 'required',
    ],

    'validationsUpdate' => [

        'descipcion'          => 'required',
        'solicitud_user_id'          => 'required',
        'respuesta_user_id'          => 'required',
        'tipo_consulta'          => 'required',
        'estado'          => 'required',

    ],

    'export' => [
        'nombre' => 'name'
    ]

];
