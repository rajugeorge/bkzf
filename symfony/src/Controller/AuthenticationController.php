<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthenticationController extends AbstractController
{

    public function login(Request $request, AuthenticationUtils $utils): Response
    {
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('index');
        }

        $error = $utils->getLastAuthenticationError();
        $lastusername = $utils->getLastUsername();

        return $this->render('authentication/login.html.twig', [
            'error' => $error,
            'lastusername'=>$lastusername,
        ]);
    }

    public function logout(){}
}
