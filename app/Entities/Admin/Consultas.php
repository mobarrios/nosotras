<?php
 namespace App\Entities\Admin;
 
 use App\Entities\Entity;

 class Consultas extends Entity
 {
     protected $table       = 'consultas';
     protected $fillable    = ['descripcion','solicitud_user_id','respuesta_user_id','tipo_consulta','estado'];
     protected $section     = 'consultas';



     public function ConsultasTipo(){
     	return $this->hasMany(ConsultasTipo::class,'id','tipo_consulta');
     }

     public function getEstadoAttribute(){

     	if($this->attributes['estado'] == 1)
     		return 'Enviado';
     	
     	if($this->attributes['estado'] == 2)
     		return 'Procesado';

     }
 }


