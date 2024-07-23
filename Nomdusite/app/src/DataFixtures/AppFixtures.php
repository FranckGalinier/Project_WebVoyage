<?php

namespace App\DataFixtures;

use App\Entity\Destination;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // Ajout des pays avec leur infos
        $dest = new Destination();
        $dest->setLabel('île Açores');
        $dest->setDescription('Les Açores sont un archipel de 9 îles volcaniques portugaises situées dans l’océan Atlantique');
        $dest->setImagePath('acores.jpeg');
        $dest->setDrapeau('portugal.png');
        $dest->setPassport('Oui');
        $dest->setVisa('Non');
        $dest->setLangue('Portugais');
        $dest->setMonnaie('Euro');
        $dest->setDebutSaison('Mai');
        $dest->setFinSaison('Octobre');
        $dest->setSecure('Oui');

        $manager->persist($dest);

        $manager->flush();
    }
}
