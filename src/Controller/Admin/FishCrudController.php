<?php

namespace App\Controller\Admin;

use App\Entity\Fish;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FishCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fish::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setPageTitle(Crud::PAGE_INDEX, 'Poissons');
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('fishname');
        yield IntegerField::new('age');
        yield ChoiceField::new('level')
            ->setChoices([
                'débutant' => 'beginner',
                'confirmé' => 'good',
                'expert' => 'expert'
            ]);
    }
}
