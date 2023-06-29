<?php

namespace App\Controller\Admin;

use App\Entity\NFT;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NFTCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NFT::class;
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
