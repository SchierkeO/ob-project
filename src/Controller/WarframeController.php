<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WarframeController extends AbstractController
{
    #[Route('/warframe/damage-calculator', name: 'app_warframe_damage_calculator')]
    public function menu(): Response
    {
        dump('warframe');

        return $this->render('warframe/damage_calculator/index.html.twig');
    }
}