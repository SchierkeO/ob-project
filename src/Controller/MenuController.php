<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function menu(): Response
    {
        dump('main');

        return $this->render('menu/index.html.twig');
    }
}