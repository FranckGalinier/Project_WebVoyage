<?php

namespace App\Controller;

use App\Entity\Destination;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

# On crée une classe HomeController qui hérite de AbstractController

class HomeController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    #[Route('/', name: 'home_')]
    public function index()
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/continents', name: 'continents')]
    public function continents()

    {

        $ps = $this->entityManager->getRepository(Destination::class)->findAll();

        return $this->render('home/continents.html.twig',
        [
            'ps' => $ps
        ]);
    } 

    
    #[Route('/modejoueursolo', name:'md_joueur')]
    public function modejoueur()
    {
        return $this->render('home/modesolo/acceuil.html.twig');
    }
    #[Route('/pays', name:'pays')]
    public function pays()
    {
        return $this->render('home/pays/detailpays.html.twig');
    }
}
