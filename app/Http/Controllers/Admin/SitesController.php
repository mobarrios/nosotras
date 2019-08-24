<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\SitesRepo as Repo;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use App\Entities\Admin\SitesTipo;

class SitesController extends Controller
{
    public function  __construct(Request $request, Repo $repo, Route $route)
    {

        $this->request  = $request;
        $this->repo     = $repo;
        $this->route    = $route;

        $this->section          = 'sites';
        $this->data['section']  = $this->section;

        $this->data['tipos'] = SitesTipo::lists('name','id');


    }

}
