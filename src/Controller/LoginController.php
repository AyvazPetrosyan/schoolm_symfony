<?php

namespace App\Controller;

use App\Controller\Admin\AccountController;
use App\Entity\User;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Repository\RepositoryFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function index(): Response
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'checkUser' => [
                'result' => false,
                'message' => ''
            ]
        ]);
    }

    /**
     * @Route("/signIn", name="signIn")
     */
    public function signIn(Request $request): Response
    {
        $userInfo = [];
        $userInfo['userName'] = $request->request->get('userName');
        $userInfo['pass'] = $request->request->get('password');

        $checkUser = $this->checkUser($userInfo);

        if ($checkUser['result']) {
            if ($checkUser['userInfo']['rollId']==1) { // Login as admin
                session_start();
                $_SESSION['userInfo'] = $checkUser['userInfo'];
                return $this->redirect($this->generateUrl('admin_account'));
            } elseif ($checkUser['userInfo']['rollId']==2) { // Login as teacher

            } else { // Login as student

            }
        } else {

        }

        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'checkUser' => $checkUser
        ]);
    }

    /**
     * @Route("/signOut", name="signOut")
     */
    public function signOut(Request $request)
    {
        session_unset();
        return $this->redirect($this->generateUrl('home'));
    }

    private function checkUser($userInfo)
    {
        /** @var User $userModel */
        $userModel = $this->getDoctrine()->getRepository(User::class)->findOneBy(['userName' => $userInfo['userName']]);

        if (empty($userModel)) {
            return [
                'result' => false,
                'message' => 'The user name is incorrect'
            ];
        }

        if ($userModel->getPassword() != $userInfo['pass']) {
            return [
                'result' => false,
                'message' => 'The password is incorrect'
            ];
        }

        if (!$userModel->getStatus()) {
            return [
                'result' => false,
                'message' => 'This account is inactive'
            ];
        }

        return [
            'result' => true,
            'message' => 'You are sign in',
            'userInfo' => [
                'name' => $userModel->getFirstName(),
                'middleName' => $userModel->getMiddleName(),
                'lastName' => $userModel->getLastName(),
                'eMail' => $userModel->getEmail(),
                'userName' => $userModel->getUserName(),
                'rollId' => $userModel->getRollId()
            ]
        ];
    }

    private function createUser()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setFirstName('test');
        $user->setLastName('test');
        $user->setEmail('test@test.test');
        $user->setUserName('test');
        $user->setPassword('test');
        $user->setRollId(1);
        $user->setStatus(1);

        $entityManager->persist($user);
        $entityManager->flush();
    }
}
