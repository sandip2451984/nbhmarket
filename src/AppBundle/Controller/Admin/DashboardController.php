<?php
namespace AppBundle\Controller\Admin;

use AppBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends Controller
{
    /**
     * @Route("/admin/dashboard", name="admin_dashboard")
     */
    public function dashboardAction(UserRepository $userRepository): Response
    {
        return $this->render('@App/admin/user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }  
}