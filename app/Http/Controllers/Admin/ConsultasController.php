<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\ConsultasRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Entities\Admin\ConsultasTipo;

class ConsultasController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'consultas';
        $this->data['section']  = $this->section;

        $this->data['tipos'] = ConsultasTipo::lists('name','id');

    }

}
