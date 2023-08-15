<?php
 namespace App\Entities\Admin;
 
 use App\Entities\Entity;

 class ConsultasTipo extends Entity
 {
     protected $table       = 'consultas_tipo';
     protected $fillable    = ['name'];
     protected $section     = 'consultas_tipo';
 }


