<?php
namespace App\Controllers;
use App\System\Application;
use App\System\Controller;
use App\System\Route;

class Blog extends Controller{
    #[Route('/blog')]
    public function blogIndex() : void {
        $this->render('blog',[]);
    }
}