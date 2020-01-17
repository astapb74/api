<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\{Category, Article};
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{
    /**
     * @Route("/", name="api")
     */
    public function index()
    {
         return $this->render('api/index.html.twig');
    }

    /**
     * @Route("/api/category", name="category")
     */
    public function category(Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Category::class);

        if ($id = $request->query->get('id'))
            $categoryes = $repository->findOneById($id);
        elseif($name = $request->query->get('name'))
            $categoryes = $repository->findByName($name);
        else
            $categoryes = $repository->findAll();

    	return $this->json($categoryes);
    }

    /**
     * @Route("/api/article", name="article")
     */
    public function article(Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Article::class);

    	if ($id = $request->query->get('id'))
            $article = $repository->findOneById($id);
        elseif($title = $request->query->get('title'))
            $article = $repository->findByName($title);
        else
            $article = $repository->findAll();

        return $this->json($article);
    }
}
