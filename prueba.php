<?php
require "vendor/autoload.php";
require "generated-conf/config.php";
/*
$usuario= new Usuarios();
$usuario->setLogin("jenny");
$usuario->setPassword("123");
$usuario->setAdministrador(1);
$usuario->save();
*/


$usuarios = UsuariosQuery::create()->find();
foreach($usuarios as $usuario){
    echo $usuario->getLogin(). "\n" ;
}


/*
$elUsuario = UsuariosQuery::create()->findPK(1);
echo $elUsuario->getLogin(). "\n" ;*/

  foreach($apartamento as $a){
         $array[] = array(
        
        'direccion'=> $a -> getDireccion(),
        'descripcion'=> $a -> getDescripcion(), 
        'precio'=> $a -> getPrecio()
        );
      }