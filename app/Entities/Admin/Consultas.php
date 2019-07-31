<?php
 namespace App\Entities\Admin;
 
 use App\Entities\Entity;

 class Consultas extends Entity
 {
     protected $table       = 'consultas';
     protected $fillable    = ['descripcion','solicitud_user_id','respuesta_user_id','tipo_consulta','estado'];
     protected $section     = 'consultas';
 }


