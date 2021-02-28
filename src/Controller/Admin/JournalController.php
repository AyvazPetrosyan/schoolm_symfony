<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JournalController extends AbstractController
{
    /**
     * @Route("/admin/journal", name="admin_journal")
     */
    public function index(): Response
    {
        return $this->render('admin/journal/index.html.twig', [
            'controller_name' => 'JournalController',
        ]);
    }
}
