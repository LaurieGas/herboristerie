<?php

namespace App\Controller\Admin;

use App\Entity\Tisane;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TisaneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tisane::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
