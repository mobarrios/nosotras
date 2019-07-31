@extends('template.model_form')

    @section('form_title')
        Nueva Consulta
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
        @endif

            <div class="col-xs-12 form-group">
              {!! Form::label('Descripción') !!}
              {!! Form::text('descripcion', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-12 form-group">
                {!! Form::label('Usuario Consulta') !!}
                {!! Form::text('solicitud_user_id', null, ['class'=>'form-control']) !!}
              </div>
              <div class="col-xs-12 form-group">
                {!! Form::label('Usuario Respuesta') !!}
                {!! Form::text('respuesta_user_id', null, ['class'=>'form-control']) !!}
              </div>
              <div class="col-xs-12 form-group">
                {!! Form::label('Tipo ') !!}
                {!! Form::text('tipo_consulta', null, ['class'=>'form-control']) !!}
              </div>
              <div class="col-xs-12 form-group">
                {!! Form::label('Estado') !!}
                {!! Form::text('estado', null, ['class'=>'form-control']) !!}
              </div>
@endsection

