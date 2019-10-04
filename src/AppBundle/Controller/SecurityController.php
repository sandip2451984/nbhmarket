<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * Redirect users after login based on the granted ROLE
     * @Route("/login/redirect", name="_login_redirect")
     */
    public function loginRedirectAction(Request $request)
    {
        if($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_SUPER_ADMIN'))
        {
            return $this->redirectToRoute('admin_dashboard');
        }
        else
        {
            return $this->redirectToRoute('dashboard');
        }
    }
}