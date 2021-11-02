<?php

namespace App\Controller\Admin;


use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\DateTimeImmutableType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;


class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('description'),
            AssociationField::new('category'),
            AssociationField::new('subCategory'),
            AssociationField::new('parcsNationaux'),
            DateTimeField::new('createdAt'),
            DateTimeField::new('updatedAt'),
            TextField::new('imageFile')->setFormType(VichFileType::class)->onlyWhenCreating(),
            ImageField::new('file')->setBasePath('uploads/pdf/')->onlyOnIndex(),
            SlugField::new('slug')->setTargetFieldName('title')->hideOnIndex(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['createdAt' => 'DESC']);
    }
    
}
