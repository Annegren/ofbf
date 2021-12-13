<?php

namespace App\Controller\Admin;


use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\DateTimeImmutableType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
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
            TextField::new('title', 'Titre'),
            TextField::new('imageFile', 'Image')->setFormType(VichFileType::class)->hideOnIndex(),
            TextEditorField::new('description')->setFormType(CKEditorType::class)->setLabel(' Déscription'),
            AssociationField::new('category', 'Catégorie'),
            AssociationField::new('parcsNationaux', 'PNX: Sous catégorie'),
            AssociationField::new('ofb', 'OFB: Sous catégorie'),
            DateTimeField::new('createdAt', 'Créé le'),
            DateTimeField::new('updatedAt', 'Modifié le'),
            ImageField::new('file', 'Image')->setBasePath('Users/annegreen/Desktop/ofbf/ofbf/uploads/pdf/')->onlyOnIndex(),
            SlugField::new('slug')->setTargetFieldName('title')->hideOnform()->hideOnIndex()

        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        
        return $crud
        ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
        ->setDefaultSort(['createdAt' => 'DESC'])
        ->renderContentMaximized()
        ->setPaginatorRangeSize(3
        )
        ;

    }

    public function configureAssets(Assets $assets): Assets
    {
            
        return Assets::new()->addCssFile('css/admin.css');

    }

    
    
}

