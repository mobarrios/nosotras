<?php
 namespace App\Entities\Admin;

 use App\Entities\Entity;

 class Sites extends Entity
 {
     protected $table       = 'sites';
     protected $fillable    = ['title','icon','address','lat','long'];
     protected $section     = 'sites';   
 }


