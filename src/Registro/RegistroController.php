<?php
namespace App\Registro;
require "generated-conf/config.php";
use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Base\UsuariosQuery;
use Usuarios;
class RegistroController implements ControllerProviderInterface {
    // la función "connect" define las rutas del módulo
    public function connect(Application $app) {
        // creates a nuevo controlador
        $controller = $app['controllers_factory'];
        // Configura las rutas del módulo
        // ==============================
        // la ruta "/registro" muestra el formulario de login
        $controller->get('/registro', function() use($app) {
            // muestra la plantilla views/registro.html.twig
            return $app['twig']->render('Login/registro.html.twig');
        })->bind('registro');
        
        //registra usuario
        $controller->post('/hacerRegistro', function(Request $request) use($app) {
            // toma los datos de la petición web
           
            $log = $request->get('login');
            $pass = $request->get('password');
            $ad = $request->get('admin');
            
            
            $usuario = new Usuarios();
            $usuario->setLogin($log);
            $usuario->setPassword($pass);
            $usuario->setAdministrador($ad);
           
            $usuario->save();
            
            return $app->redirect($app['url_generator']->generate('login'));
            // hace un bind con el nombre "doRegister"
        })->bind('hacerRegistro');
        // retorna el controlador
        return $controller;
    }
}