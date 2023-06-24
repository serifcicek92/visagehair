<?php

namespace App\Controllers;

use App\System\Controller;
use App\System\Application;
use App\System\Route;

class Shop extends Controller
{
    #[Route('/shop'), Route('/shop/{url}', 'post')]
    public function index(): void
    {
        Application::$app->view->title = "Shop";
        $this->render('shop', []);
    }

    #[Route('/product/{url}')]
    public function productIndex($url = null): void
    {
        Application::$app->view->title = "Product Detail";
        $this->render('productdetail', []);
    }

    #[Route('/checkout')]
    public function checkout(): void
    {
        Application::$app->view->title = "Checkout";
        $this->render('checkout', []);
    }

    #[Route('/cart')]
    public function cart() : void {
        Application::$app->view->title = "cart";
        $this->render('cart', []);
    }

    #[Route('/confirmation')]
    public function confirmation() : void {
        Application::$app->view->title = "confirmation";
        $this->render('confirmation', []);
    }

}
