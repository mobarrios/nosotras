<?php
 namespace App\Entities\Admin;

 use App\Entities\Entity;

 class SitesTipo extends Entity
 {
     protected $table       = 'sites_tipo';
     protected $fillable    = ['name'];
     protected $section     = 'sites_tipo';   
 }


