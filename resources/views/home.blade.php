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
                    <h3>250</h3>
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
                    <h3>450</h3>
                    <p>Total de  Consultas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-comment"></i>
                </div>
            </div>

                  <p class="text-center">
                    <strong>Consultas por Estados</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Pendiente</span>
                    <span class="progress-number"><b>60</b>/450</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 16%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">En proceso</span>
                    <span class="progress-number"><b>100</b>/450</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 31%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Resuelto</span>
                    <span class="progress-number"><b>140</b>/450</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 48%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Derivado</span>
                    <span class="progress-number"><b>70</b>/450</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 25%"></div>
                    </div>
                  </div>

                  <div class="progress-group">
                    <span class="progress-text">No aplica</span>
                    <span class="progress-number"><b>80</b>/450</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-secondary" style="width: 26%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->

                  <p class="text-center">
                    <strong>Consultas por Temáticas</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Salud</span>
                    <span class="progress-number"><b>60</b>/450</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 36%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Educación</span>
                    <span class="progress-number"><b>80</b>/450</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 51%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Asesoramiento Legal</span>
                    <span class="progress-number"><b>100</b>/450</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 78%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Otros</span>
                    <span class="progress-number"><b>140</b>/450</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 55%"></div>
                    </div>
                  </div>

                 
        </div> 

        


    </div>
@endsection
