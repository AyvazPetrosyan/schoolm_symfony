<?php

namespace App\Controller\Teacher;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JournalController extends AbstractController
{
    /**
     * @Route("/teacher/journal", name="teacher_journal")
     */
    public function index(): Response
    {
        return $this->render('teacher/journal/index.html.twig', [
            'controller_name' => 'JournalController',
        ]);
    }
}
