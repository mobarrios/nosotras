<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Consultas;
use App\Http\Repositories\BaseRepo;


class ConsultasRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Consultas();
    }
    

}