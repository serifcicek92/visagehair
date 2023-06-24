<?php
namespace App\Controllers;
use App\System\Application;
use App\System\Controller;
use App\System\Route;

class Admin extends Controller{
    #[Route('/admin'),Route('/admin/home')]
    public function Index() : void {
        $this->renderAdmin('home',[]);
    }
}