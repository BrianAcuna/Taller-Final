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

/*
$usuarios = UsuariosQuery::create()->find();
foreach($usuarios as $usuario){
    echo $usuario->getLogin(). "\n" ;
}


/*
$elUsuario = UsuariosQuery::create()->findPK(1);
echo $elUsuario->getLogin(). "\n" ;*/
/*
  foreach($apartamento as $a){
         $array[] = array(
        
        'direccion'=> $a -> getDireccion(),
        'descripcion'=> $a -> getDescripcion(), 
        'precio'=> $a -> getPrecio()
        );
      }
      */
      $tipo= new Tipos();
      $tipo->setNombre('Algo');
      
$usuario= new Apartamentos();
$usuario->setDireccion('calle 8');
$usuario->setDescripcion('feo0');
$usuario->setLatitud('5.1645');
$usuario->setLongitud('-74.1654');
$usuario->setTipos($tipo);
$usuario->save();
      
      
      
      
      
      