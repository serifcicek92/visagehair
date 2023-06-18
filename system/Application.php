<?php
namespace App\System;

use App\Controllers\Auth;
use App\System\Controller;
use App\System\Router;
use App\System\View;
use App\System\Route;
use ReflectionClass;

class Application

{

    public static Application $app;

    public Router $router;

    public ?Controller $controller = null;

    public View $view;


    public Functions $functions;
    public Auth $auth;
    public $classList = [];
    public $layoutClass;




    public string $layout = 'main';

    public function __construct()

    {
        self::$app=$this;
        $this->router = new Router();   
        $this->view =  new View();
        $this->functions = new Functions();
        $this->auth = new Auth();
    }





    public function run($url,$callback,$method='get')

    {

        $this->router->resolve($url,$callback,$method);

    }

    public function runControllers(array $controllers)
    {
        foreach ($controllers as $controller) {
            $reflectionController = new ReflectionClass($controller);
            foreach ($reflectionController->getMethods() as $metod) {
                $attributes = $metod->getAttributes(Route::class);
                foreach ($attributes as $attribute) {
                    $route = $attribute->newInstance();
                    $controllerName = explode('\\', $controller);
                    $callback = end($controllerName)."/".$metod->getName();
                    $this->router->resolve($route->routePath,$callback,$route->method );
                }
            }
        }
    }

    public function setController($controller)

    {

        $this->controller = $controller;

    }

    public function getController()

    {

        return $this->controller;

    }

}