<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        if ($request->request->get('saveUser') == 'Save') {
            $user = new User();
            $user->setFirstName($request->request->get('firstName'));
            $user->setMiddleName($request->request->get('middleName'));
            $user->setLastName($request->request->get('lastName'));
            $user->setUserName($request->request->get('userName'));
            $user->setPassword($request->request->get('password'));
            $user->setEmail($request->request->get('email'));
            $user->setRollId($request->request->get('rollId'));
            $user->setStatus($request->request->get('status')? $request->request->get('status') : 0);
            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush();
        }

        /*$form = $this->createFormBuilder()
            ->add('firstNam', TextType::class)
            ->add('middleName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('email', EmailType::class)
            ->add('userName', TextType::class)
            ->add('password',PasswordType::class)
            ->add('reapedPassword', PasswordType::class)
            ->add('status',CheckboxType::class)
            ->getForm();*/

        $usersModel = $this->getDoctrine()->getRepository(User::class)->findAll();

        $usersList = [];
        /**
         * @var  $userModelKey
         * @var User $userModel
         */
        foreach ($usersModel as $userModelKey => $userModel) {
            $usersList[$userModelKey]['firstName'] = $userModel->getFirstName();
            $usersList[$userModelKey]['middleName'] = $userModel->getMiddleName();
            $usersList[$userModelKey]['lastName'] = $userModel->getLastName();
            $usersList[$userModelKey]['userName'] = $userModel->getUserName();
            $usersList[$userModelKey]['password'] = $userModel->getPassword();
            $usersList[$userModelKey]['email'] = $userModel->getEmail();
            $usersList[$userModelKey]['roll'] = $userModel->getRollId();
            $usersList[$userModelKey]['status'] = $userModel->getStatus();
        }

        return $this->render('admin/users/add_user.html.twig', [
            'userList' => $usersList,
            'controller_name' => 'Users controller add user'
            //'form' => $form->createView()
        ]);
    }
}
