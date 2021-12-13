<?php

namespace App\Controller\Admin;


use App\Entity\Article;
use App\Entity\PermanentArticle;
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
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichFileType;


class PermanentArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PermanentArticle::class;
    }

    

    
    public function configureFields(string $pageName): iterable
    {
        
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Titre'),
            ImageField::new('file', 'Image')->setBasePath('Users/annegreen/Desktop/ofbf/ofbf/uploads/pdf/')->onlyOnIndex(),
            TextField::new('imageFile', 'Image')->setFormType(VichFileType::class)->hideOnIndex()



        ];
    }

   
    public function configureAssets(Assets $assets): Assets
    {
            
        return Assets::new()->addCssFile('css/admin.css');

    }

    
    
}

