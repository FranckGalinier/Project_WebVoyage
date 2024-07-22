<?php

namespace App\Controller;

use App\Entity\Destination;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

# On crée une classe HomeController qui hérite de AbstractController

class PaysController extends AbstractController
{

  private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

  #[Route('/destinations/{id}', name: 'detailpays')]
  public function detailpays($id)
  {
    $ps= $this->entityManager->getRepository(Destination::class)->find($id);



    return $this->render('home/pays/detailpays.html.twig', [
      'ps' => $ps
    ]);
  }


}
