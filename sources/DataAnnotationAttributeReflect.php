<?php

#[Attribute]
class ExampleAttribute
{
    private string $message;
    private int $answer;
    public function __construct(string $message, int $answer)
    {
        $this->message = $message;
        $this->answer = $answer;
    }
}



#[exampleAttribute('Hello world', 42)]
class Foo
{
}


$reflector = new \ReflectionClass(Foo::class);
$attrs = $reflector->getAttributes();

foreach ($attrs as $attribute) {

    $attribute->getName(); // "My\Attributes\ExampleAttribute"
    $attribute->getArguments(); // ["Hello world", 42]
    $attribute->newInstance();
    // object(ExampleAttribute)#1 (2) {
    //  ["message":"Foo":private]=> string(11) "Hello World"        
    //  ["answer":"Foo":private]=> int(42) 
    // }

}

$foo = new Foo();




//Route için annotation
class Controller
{
}
class HomeController extends Controller
{


    #[Route('/')]
    public function index()
    {
        echo "Burası İndex Abey";
    }

    #[Route('test')]
    public function test($id)
    {
        echo "burası test";
    }
}

#[Attribute]
class Route
{
    public function __construct(public string $routePath, public string $method = 'get')
    {
    }
}


class Router
{
    private array $routes = [];
    public function __construct()
    {
    }

    public function registerRoutesFromControllerAttributes(array $controllers)
    {
        foreach ($controllers as $controller) {
            $reflectionController = new ReflectionClass($controller);
            foreach ($reflectionController->getMethods() as $metod) {
                $attributes = $metod->getAttributes(Route::class);
                foreach ($attributes as $attribute) {
                    $route = $attribute->newInstance();
                    $this->yazdir($route->method, $route->routePath, [$controller => $metod->getName()]);
                }
            }
        }
    }

    public function yazdir($metod, $route, callable|array $action)
    {
        $controllerName = array_keys($action)[0];
        $class = new $controllerName();
        $parameters = [];
        call_user_func_array([new HomeController, array_values($action)[0]], $parameters);
    }
}





$router = new Router();
$router->registerRoutesFromControllerAttributes(
    [
        HomeController::class
    ]
);
