<?php

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

# On crée une classe HomeController qui hérite de AbstractController

class HomeController extends AbstractController
{
    
    #[Route('/', name: 'home_')]
    public function index()
    {
        return $this->render('home/index.html.twig');
    }
}