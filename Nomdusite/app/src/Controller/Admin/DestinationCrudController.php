<?php

namespace App\Controller\Admin;

use App\Entity\Destination;
use Faker\Provider\ar_EG\Text;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DestinationCrudController extends AbstractCrudController
{
  public const PAYS_BASE_PATH = 'upload/images/pays';
  public const PAYS_UPLOAD_DIR = '/public/upload/images/pays';

  public const DRAP_BASE_PATH = 'upload/images/flags';
  public const DRAP_UPLOAD_DIR = '/public/upload/images/flags';

  

  public static function getEntityFqcn(): string
  {
      return Destination::class;
  }


  public function configureField(Crud $crud): Crud
    {
        //permet de renommer les différentes pages
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des destinations')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter une destination')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier une destination');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            //champ text pour le titre de l'album
            TextField::new('label', 'Destination'),
            TextField::new('Visa', 'Visa'),
            TextField::new('Passport', 'Passport'),
            TextField::new('Secure', 'Secure'),
            TextField::new('Description', 'Description'),
            TextField::new('Langue', 'Langue'),
            TextField::new('Monnaie', 'Monnaie'),
            TextField::new('Debut_saison', 'Debut de la saison'),
            //champ pour upload l'image de l'album
            ImageField::new('image_path', 'Image de la destination')
                ->setBasePath(self::PAYS_BASE_PATH)
                ->setUploadDir(self::PAYS_UPLOAD_DIR)
                ->setUploadedFileNamePattern(
                  //on donne un nom de fichier unique à l'image
                  fn (UploadedFile $file): string => sprintf(
                      'upload_%d_%s.%s',
                      random_int(1, 999),
                      $file->getFilename(),
                      $file->guessExtension()
                  )
              ),
          TextField::new('Fin_saison', 'Fin de la saison'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions

        ->update(
          Crud::PAGE_INDEX,
          Action::NEW,
          fn (Action $action) => $action
          ->setIcon('fa fa-plus')
          ->setLabel('Ajouter une destination')
          ->setCssClass('btn btn-success')
        )
        ->update(
          Crud::PAGE_INDEX,
          Action::EDIT,
          fn (Action $action) => $action
          ->setIcon('fa fa-pen')
          ->setLabel('Modifier une destination')
        )
        ->update(
          Crud::PAGE_INDEX,
          Action::DELETE,
          fn (Action $action) => $action
          ->setIcon('fa fa-trash')
          ->setLabel('Supprimer une destination')
        )
        ->update(
          Crud::PAGE_EDIT,
          Action::SAVE_AND_RETURN,
          fn (Action $action) => $action
              ->setLabel('Enregistrer et quitter')
      )
      ->update(
          Crud::PAGE_EDIT,
          Action::SAVE_AND_CONTINUE,
          fn (Action $action) => $action
              ->setLabel('Enregistrer et continuer')
      )
      ->update(
        Crud::PAGE_NEW,
        Action::SAVE_AND_RETURN,
        fn (Action $action) => $action
            ->setLabel('Enregistrer et quitter')
    )
    ->update(
        Crud::PAGE_NEW,
        Action::SAVE_AND_ADD_ANOTHER,
        fn (Action $action) => $action
            ->setLabel('Enregistrer et ajouter un nouveau')
    )
    ->add(Crud::PAGE_INDEX, Action::DETAIL)
    ->update(
        Crud::PAGE_INDEX,
        Action::DETAIL,
        fn (Action $action) => $action
            ->setIcon('fa fa-eye')
            ->setLabel('Voir')
    )
    ->update(
        Crud::PAGE_DETAIL,
        Action::EDIT,
        fn (Action $action) => $action
            ->setIcon('fa fa-pen')
            ->setLabel('Modifier')
    )
    ->remove(
        Crud::PAGE_DETAIL,
        Action::DELETE,
        fn (Action $action) => $action
            ->setIcon('fa fa-trash')
            ->setLabel('Supprimer')
    )
    ->update(
        Crud::PAGE_DETAIL,
        Action::INDEX,
        fn (Action $action) => $action
            ->setIcon('fa fa-list')
            ->setLabel('Retour à la liste')
    );
    }

}