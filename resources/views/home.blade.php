@extends('template')

@section('sectionContent')
    <div class="row">



        <!-- Default box -->
   {{--      <div class="col-xs-12 col-sm-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{!! Auth::user()->images ? Auth::user()->images->path : "vendors/LTE/dist/img/avatar5.png"!!}" alt="User profile picture">

                    <h3 class="profile-username text-center"><a href="{!! route('admin.profiles.index') !!}">{{\Illuminate\Support\Facades\Auth::user()->fullName}}</a></h3>

                    <p class="text-center ">
                        <span class="text-muted">Perfil : </span>

                    @foreach(\Illuminate\Support\Facades\Auth::user()->Roles as $rol)
                            <label class=" label label-primary"> {{$rol->slug}}</label>
                        @endforeach
                    </p>
                    <span >
                        <span class="text-muted">Sucursales : </span>
                      @foreach(\Illuminate\Support\Facades\Auth::user()->brancheables as $branch)
                        <label class=" label label-default">{{$branch->branches->name}}</label>
                      @endforeach
                    </span>

                </div>

            </div>
        </div> --}}

         

        <div class="col-sm-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red-active">
                <div class="inner">
                    <h3>{{$usuarios_registrados}}</h3>
                    <p>Usuarios Registrados.</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
{{--                 <a href="{{route('admin.sales.create')}}" class="small-box-footer">Nueva Venta <i class="fa fa-arrow-circle-right"></i></a>
 --}}       </div>
        </div>

        <div class="col-sm-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-orange ">
                <div class="inner">
                    <h3>{{$total_consultas}}</h3>
                    <p>Total de  Consultas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-comment"></i>
                </div>
            </div>

                  <p class="text-center">
                    <strong>Consultas por Estados</strong>
                  </p>

@foreach($consultas_tipo as $tipo)
                  <div class="progress-group">
                    <span class="progress-text">{{$tipo->name}}</span>
                    <span class="progress-number"><b>{{$tipo->consultas}}</b>/{{$total_consultas}}</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: {{ ($tipo->consultas * 100 / $total_consultas) }}%"></div>
                    </div>
                  </div>
@endforeach() 




                  

                 
        </div> 

        


    </div>
@endsection
