<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\SubCategory;
use App\Form\SearchArticleFormType;
use App\Form\SearchType;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/article", name="article_")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request, ArticleRepository $articleRepository): Response
    {


        $form = $this->createForm(SearchArticleFormType::class);
        $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $search = $form->getData()['search'];
        $articles = $articleRepository->findLikeName($search);
    } else {
        $articles = $articleRepository->findAll();
    }

    return $this->render('article/index.html.twig', [
        'articles' => $articles,
        'form' => $form->createView(),
    ]);
    
}



    /**
     * @Route ("/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="show")
     */
    public function show(Article $article): Response
    {

        $categories = $article->getCategory();


        return $this->render('article/show.html.twig', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    /**
     * @Route ("/{article_id}/categories/{category_id}", name="category_show")
     * @ParamConverter("category", class="App\Entity\Category", options={"mapping": {"category_id": "id"}})
     */
    public function showCategory(Article $article, Category $category): Response
    {

        $subcategories = $category->getSubCategory();
        return $this->render('article/category_show.html.twig', [
            'article' => $article,
            'category' => $category,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * @Route ("/{article_id}/categories/{category_id}/subCategories/{subCategory_id}", name="subCategory_show")
     * @ParamConverter("article", class="App\Entity\Article", options={"mapping": {"article_id": "id"}})
     * @ParamConverter("category", class="App\Entity\Category", options={"mapping": {"category_id": "id"}})
     * @ParamConverter("subCategory", class="App\Entity\SubCategory", options={"mapping": {"subCategory_id": "id"}})
     */
    public function showSubCategory(Article $article, Category $category, SubCategory $subCategory): Response
    {

        return $this->render('article/subCategory_show.html.twig', [
            'article' => $article,
            'category' => $category,
            'subCategory' => $subCategory,
        ]);
    }

    
    

}

