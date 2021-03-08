<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/admin/users", name="admin_users")
     */
    public function index(): Response
    {
        $userList = [];

        return $this->render('admin/users/index.html.twig', [
            'controller_name' => 'UsersController',
            'userList' => $userList
        ]);
    }

    /**
     * @Route("/admin/addUsers", name="admin_add_users")
     */
    public function addUser(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('firstNam', 'test')
            ->add('middleName', 'text')
            ->add('lastName', 'text')
            ->add('email', 'email')
            ->add('userName', 'text')
            ->add('password','password')
            ->add('reaped password', 'password')
            ->add('status','boolean')
            ->getForm();

        return $this->render('admin/users/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
