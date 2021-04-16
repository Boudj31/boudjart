<?php

namespace App\Controller;

use App\Repository\BlogPostRepository;
use App\Repository\PeintureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(PeintureRepository $peintureRepository, BlogPostRepository $blogPostRepository): Response
    {
        return $this->render('default/index.html.twig', [
            'peintures' => $peintureRepository->lastThree(),
            'blogposts' => $blogPostRepository->lastThree()
        ]);
    }

    /**
     * @Route("/single", name="single")
     */
    public function single(BlogPostRepository $blogPostRepository): Response
    {
        return $this->render('single.html.twig', [
            'blogposts' => $blogPostRepository
        ]);
    }


}
