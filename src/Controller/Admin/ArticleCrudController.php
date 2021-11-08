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
use FOS\CKEditorBundle\Form\Type\CKEditorType;
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
            TextField::new('title', 'Titre Article'),
            TextEditorField::new('description')->setFormType(CKEditorType::class)->setLabel('Article description'),
            AssociationField::new('category', 'Catégorie'),
            AssociationField::new('subCategory', 'Sous catégorie'),
            AssociationField::new('parcsNationaux', 'resélectionner la sous catégorie Parcs Nationaux'),
            AssociationField::new('ofb', 'resélectionner la sous catégorie OFB'),
            DateTimeField::new('createdAt', 'créé le'),
            DateTimeField::new('updatedAt', 'modifié le'),
            TextField::new('imageFile', 'Fichier PDF')->setFormType(VichFileType::class)->onlyWhenCreating(),
            ImageField::new('file', 'Fichier PDF')->setBasePath('uploads/pdf/')->onlyOnIndex(),
            SlugField::new('slug')->setTargetFieldName('title')->hideOnform(),

        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');

    }

    function show($text)
{
    return htmlspecialchars ($text);
}
    
}
