<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Repository\RepositoryFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'checkUser' => $checkUser
        ]);
    }

    /**
     * @Route("/signOut", name="signOut")
     */
    private function signOut(Request $request)
    {
        $this->checkUser($request->request);
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

        return [
            'result' => true,
            'message' => 'You are sign in'
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
