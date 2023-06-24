<?php
namespace App\Controllers;

use App\System\Application;
use App\System\Controller;
use App\System\Route;

class Auth extends Controller
{
    #[Route("/login"),Route("/login","post")]
    public function index()
    {
        $errors = [];
        if ($_POST) {
            print_r($_POST);
            exit;

            $email = $_POST["email"];
            if ($email) {
                $errors["email"] = "Email alanı gerekli";
            }
           return $this->render('login',[]);
        }
        
       return $this->render('login',[]);
    }

    #[Route("/register")]
    public function register()
    {
        var_dump($_POST);

    }

    #[Route('/signin')]
    public function signin() : void {
        Application::$app->view->title = "Signin";
        $this->render('signin',[]);
    }

    #[Route('/forgetpassword')]
    public function forgetpassword() : void {
        Application::$app->view->title = "forgetpassword";
        $this->render('forgetpassword',[]);
    }

    #[Route('/dashboard')]
    public function userProfile() : void {
        Application::$app->view->title = "User Dashboard";
        $this->render('dashboard',[]);
    }

    #[Route('/orders')]
    public function userorders() : void {
        Application::$app->view->title = "User Orders";
        $this->render('userorders',[]);
    }
    #[Route('/useraddress')]
    public function useraddress() : void {
        Application::$app->view->title = "User Adress";
        $this->render('useraddress',[]);
    }

    #[Route('/profile-details')]
    public function profileDetails() : void {
        Application::$app->view->title = "User Profile Detail";
        $this->render('profile-details',[]);
    }
}