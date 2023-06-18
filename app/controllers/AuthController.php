<?php
namespace App\Controllers;

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
}