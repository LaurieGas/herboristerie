<?php

namespace App\Controller\Admin;

use App\Entity\Plante;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlanteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plante::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id')->onlyOnIndex(),
            Field::new('nomPlante')->setRequired(true),
            Field::new('nomLatin')->setRequired(true),
            Field::new('nomCommun')->setRequired(true),
            Field::new('famille')->setRequired(true),
            Field::new('origineGeographique')->setRequired(true),
            Field::new('descriptionBotanique')->setRequired(true),
            Field::new('partiesUtilisees')->setRequired(true),
            Field::new('proprietes')->setRequired(true),
            ImageField::new('imagePlante')
                ->setBasePath('uploads/images/plantes') // permet d'indiquer le dossier dans lequel easyAdmin doit chercher les images
                ->setUploadDir('public/uploads/images/plantes')
                ->setUploadedFileNamePattern('[name].[extension]') // permet de mettre un nom aléatoire [randomhash] ou le vrai nom de l'image
                ->setRequired(false),

        ];
    }


    // CONFIGURATION DU CRUD
    // modification du titre 
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des plantes')
            ->setPageTitle('new', 'Ajouter une nouvelle plante')
            ->setPageTitle('edit', 'Modifier les détails d\'une plante')
        ;

    }

}