<?php

namespace App\Controller\Student;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JournalController extends AbstractController
{
    /**
     * @Route("/student/journal", name="student_journal")
     */
    public function index(): Response
    {
        return $this->render('student/journal/index.html.twig', [
            'controller_name' => 'JournalController',
        ]);
    }
}
