@extends('template.model_form')

    @section('form_title')
        Nuevo Sitio
    @endsection

    @section('form_inputs')
        @if(isset($models))
            {!! Form::model($models,['route'=> [config('models.'.$section.'.updateRoute'),$models->id]]) !!}
        @else
            {!! Form::open(['route'=>config('models.'.$section.'.storeRoute')]) !!}
        @endif

            <div class="col-xs-12 form-group">
              {!! Form::label('Título') !!}
              {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="col-xs-12 form-group">
                {!! Form::label('Dirección') !!}
                {!! Form::text('address', null, ['class'=>'form-control']) !!}
              </div>

              <div class="col-xs-12 form-group">
                {!! Form::label('Tipo') !!}
                {!! Form::select('sites_tipo_id', $tipos, null, ['class'=>'form-control']) !!}
              </div>
              <div class="col-xs-6 form-group">
                {!! Form::label('Latitud') !!}
                {!! Form::text('lat', null, ['class'=>'form-control']) !!}
              </div>
              <div class="col-xs-6 form-group">
                {!! Form::label('Longitud') !!}
                {!! Form::text('long', null, ['class'=>'form-control']) !!}
              </div>
@endsection

