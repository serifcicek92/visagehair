<?php
namespace App\Controllers;
use App\System\Controller;
use App\System\Application;
use App\System\Route;

class Home extends Controller
{
    #[Route('/')]
    public function index()
    {
        Application::$app->view->title = "Ana Sayfa";
        $this->render('home',[]);
    }

    #[Route('/getid/{id}')]
    public function getIdTest($id)
    {
        print_r($id);
        exit;
    }

    #[Route('/getValTest/{val}')]
    public function getValTest($id)
    {
        print_r($id);
        exit;
    }
    #[Route('/getUrlTest/{url}')]
    public function getUrlTest($url = null)
    {
        echo $url;
        exit;
    }


    #[Route('/contact')]
    public function contact() : void {
        Application::$app->view->title = "Contuct Us";
        $this->render('contact',[]);
    }

    #[Route('/about')]
    public function about() : void {
        Application::$app->view->title = "About Us";
        $this->render('about',[]);
    }
    
    #[Route('/404')]
    public function errorPage() : void {
        Application::$app->view->title = "404 Error";
        $this->render('helpers/404',[]);
    }

}