<?php
class persona {
 
private $_nombre = 'Coco';
private $_apellido = 'Espinosa';

public function __construct(){
echo 'Soy el constructor';


}

 public function imprimeNombre() {

 	echo 'Mi nombre es '.$this->_nombre.' '.$this->_apellido;
 }

}



?>