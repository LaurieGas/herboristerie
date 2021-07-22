<?php

namespace App\Controller\Admin;

use App\Entity\Tisane;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
// une pseudo solution commenté les lignes 161 à 163 du FileUploadedType : https://github.com/EasyCorp/EasyAdminBundle/blob/master/src/Form/Type/FileUploadType.php#L161-L163
use Symfony\Component\Form\Extension\Core\Type\FileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class TisaneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tisane::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        // test pour affichage des miniatures
        // $imageField = TextField::new('imageTisaneFile', 'Image')->setFormType(VichImageType::class);

        
        // $image = TextField::new('imageTisaneFile', 'Image')->setFormType(VichImageType::class);

        // // $image = TextareaField::new('imageTisaneFile', 'Image')->setBasePath($this->getParameter('app.path.tisanes_images'))->setUploadDir('public\uploads\images\tisanes');


        // $fields = [
        //     IdField::new('id')->onlyOnIndex(),
        //     TextField::new('nomTisane'),
        //     TextField::new('descriptionTisane'),
        //     TextField::new('conseilUtilisation'),
        //     TextField::new('compositionDetail'),
        // ];

        // if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_EDIT){
        //     $fields[] = $image;
        // }
        // else{
        //     $fields[] = $imageField;
        // }

        // return $fields;

        return [
            // test5
            Field::new('id')->onlyOnIndex(),
            Field::new('nomTisane')->setRequired(true),
            Field::new('descriptionTisane')->setRequired(true),
            ImageField::new('imageTisane')
                ->setBasePath('uploads/images/tisanes') // permet d'indiquer le dossier dans lequel easyAdmin doit chercher les images
                ->setUploadDir('public/uploads/images/tisanes')
                ->setUploadedFileNamePattern('[name].[extension]') // permet de mettre un nom aléatoire [randomhash] ou le vrai nom de l'image
                ->setRequired(false),
            Field::new('conseilUtilisation')->setRequired(true),
            Field::new('compositionDetail')->setRequired(true)

            // test5bis
            // ImageField::new('imageTisaneFile')
            // ->setFormType(FileType::class)
            // ->setFormType(FileUploadType::class)
            // ->setBasePath($this->getParameter('app.path.tisanes_images'))
            // ->setUploadedFileNamePattern('[randomhash].[extension]')
            // ->setUploadDir('public/uploads/images/tisanes'),
            // TextField::new('imageTisaneFile', 'Image')->setFormType(FileType::class)->setFormType(FileUploadType::class),
            // ->setBasePath($this->getParameter('app.path.tisanes_images'))
            // ->setUploadedFileNamePattern('[randomhash].[extension]')
            // ->setUploadDir('public/uploads/images/tisanes'),
            
            
            // test4
            // TextField::new('imageTisaneFile'),
            // ImageField::new('ImageTisaneFile')
            // ->setBasePath($this->getParameter('app.path.tisanes_images'))
            // ->setUploadDir('public/uploads/images/tisanes')
            // ->setFormType(FileUploadType::class)
            // ->setUploadedFileNamePattern('[randomhash].[extension]')
            // ->setRequired(false),

            // test2
            // TextField::new('imageTisaneFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            // ImageField::new('imageTisane')
            //     ->setBasePath($this->getParameter('app.path.tisanes_images'))->onlyOnIndex(),
                // ->setUploadDir('public/uploads/images/tisanes')
                // ->setUploadedFileNamePattern('[name].[extension]')
                // ->onlyOnForms(),

            // test3
            // Field::new('imageTisaneFile')->setFormType(VichImageType::class)->onlyOnDetail(),
            // $imageTisaneFile = TextareaField::new('imageTisaneFile', 'Image')->setFormType(VichImageType::class),

            // TextField::new('conseilUtilisation'),
            // TextField::new('compositionDetail'),
           





            // test1
            // ImageField::new('imageTisaneFile')->setBasePath($this->getParameter('app.path.tisanes_images'))->setUploadDir('public\uploads\images\tisanes'),
            // ImageField::new('imageTisaneFile')
            

            // test2
            // Field::new('imageTisaneFile')->setFormType(VichImageType::class)->onlyOnDetail(),
            // ImageField::new('imageTisaneFile')->setBasePath($this->getParameter('app.path.tisanes_images'))->setUploadDir('public/uploads/images/tisanes')->setLabel('image') ->setFormType(VichImageType::class),

        ];
    }

    // CONFIGURATION DU CRUD
    // modification du titre 
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des tisanes')
            ->setPageTitle('new', 'Ajouter une nouvelle tisane')
            ->setPageTitle('edit', 'Modifier les détails d\'une tisane')
        ;

    }

    
}
