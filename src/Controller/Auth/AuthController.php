<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthController extends AbstractController
{
    #[Route('/auth/login', name: 'app_auth_login')]
    public function login(Request $request): Response
    {
        // Logic will be writed in here

        return $this->render('auth/login.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }

    #[Route('/auth/register', name: 'app_auth_register')]
    public function register(Request $request): Response
    {
        // Logic will be writed in here
        return $this->render('auth/register.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }
    
}
