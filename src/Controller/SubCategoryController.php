<?php

namespace App\Controller;

use App\Entity\SubCategory;
use App\Entity\Article;
use App\Entity\Category;
use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
* @Route("/subcategory", name="subcategory_")
*/
class SubCategoryController extends AbstractController
{
     /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $subCategories = $this->getDoctrine()
            ->getRepository(SubCategory::class)
            ->findAll();

        return $this->render('subCategory/index.html.twig', [
            'subCategories' => $subCategories,
         ]);
    }

     /**
     * @Route ("/{subCategoryName}", methods={"GET"}, name="show")
     */
    public function show(string $subCategoryName): Response
    {
        $subCategories = $this->getDoctrine()
            ->getRepository(SubCategory::class)
            ->findOneBy(['name' => $subCategoryName]);

        if (!$subCategories) {
            throw $this->createNotFoundException(
                'Sorry we have not this category in our program'
            );
        }

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findBy(['subCategory' => $subCategories->getId()], ['id' => 'DESC'],3);

        return $this->render('subCategory/show.html.twig', [
            'articles' => $articles,
            'subCategories' => $subCategories,
        

        ]);
    }
    /**
     * @Route ("/{subCategoryName}/{categoryName}", name="ArticleSubCategory_show")
     * @ParamConverter("subCategory", class="App\Entity\SubCategory", options={"mapping": {"subCategory_id": "id"}})
     * @ParamConverter("category", class="App\Entity\Category", options={"mapping": {"category_id": "id"}})
     */
    public function showArticles(SubCategory $subCategoryName, Category $categoryName, Article $article) : Response
    {

        $article = $categoryName->getArticles();

        $article = $subCategoryName->getArticles();


        return $this->render('subCategory/article_show.html.twig', [
            'subCategory' => $subCategoryName,
            'category' => $categoryName,
            'article' => $article,

        ]);
    }


} 