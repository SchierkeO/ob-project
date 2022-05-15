<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function menu(): Response
    {
        return $this->render('menu/index.html.twig');
    }

    #[Route('/login', name: 'app_login')]
    public function login(Request $request): Response
    {
        $password = $request->get('password');

        if($password == $this->getParameter('app.password')){
            $session = $request->getSession();

            $session->set('password',$password);

            $loginStatus = 'success';
        } else {
            $loginStatus = 'error';
        }

        return new JsonResponse(['loginStatus' => $loginStatus], 200);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(Request $request): Response
    {
        $request->getSession()->remove('password');

        return new JsonResponse(['logOutStatus' => 'success'], 200);
    }

}