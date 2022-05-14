<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WarframeController extends AbstractController
{
    #[Route('/warframe/damage-calculator', name: 'app_warframe_damage_calculator')]
    public function damageCalculator(): Response
    {
        return $this->render('warframe/damage_calculator/index.html.twig');
    }

    #[Route('/warframe/crud', name: 'app_warframe_crud')]
    public function crud(): Response
    {
        return $this->render('warframe/crud/index.html.twig');
    }
}