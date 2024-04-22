<?php

namespace App\Controller\Admin;

use App\Entity\TimeSlot;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class TimeSlotCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TimeSlot::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield DateField::new('date', 'Date')->setFormat('dd/MM/YYYY');
        if ($pageName === Crud::PAGE_INDEX) {
            yield TextField::new('timeSummary', 'Plage horaire');
        }
        else {
            yield TimeField::new('start_time', 'Début');
            yield ChoiceField::new('duration', 'Durée');
        }
    }
}
