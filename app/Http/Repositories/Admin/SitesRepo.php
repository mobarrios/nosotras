<?php
namespace App\Http\Repositories\Admin;

use App\Entities\Admin\Sites;
use App\Http\Repositories\BaseRepo;


class SitesRepo extends BaseRepo {
    
    public function getModel()
    {
        return new Sites();
    }
    

}