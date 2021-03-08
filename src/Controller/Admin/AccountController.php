<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/admin/account", name="admin_account")
     */
    public function index(): Response
    {
        return $this->render('admin/account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }
}
