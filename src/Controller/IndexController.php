<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

     /**
     * @Route("/users", name="users")
     */
    public function users(): Response
    {
        return $this->render('users.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
