<?php

namespace App\Controller;

use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Controller\Admin\AccountController;
use App\Entity\User;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Repository\RepositoryFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $customer = new Customer();

        $form = $this->createFormBuilder($customer)
            ->add('userName', TextType::class)
            ->add('email', TextType::class)
            ->add('password', PasswordType::class)
            ->add('save', SubmitType::class, ['label' => 'Sign up'])
            ->setAction($this->generateUrl('signUp'))
            ->setMethod('post')
            ->getForm();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
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
            if ( $checkUser['userInfo']['rollId'] == 1 ) { // Login as admin
                if (session_status () != 2) {
                    session_start();
                }
                $_SESSION['userInfo'] = $checkUser['userInfo'];

                return $this->redirect($this->generateUrl('admin_account'));
            } elseif ( $checkUser['userInfo']['rollId'] == 2 ) { // Login as teacher

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
     * @Route("/signUp", name="signUp")
     */
    public function signUp(Request $request): Response
    {
        $form = $request->request->get('form');

        $emailValidationResult = $this->emailValidation($form['email']);
        if (!$emailValidationResult['result']) {
            return $this->render('security/signUp.html.twig', [
                'message' => $emailValidationResult['message']
            ]);
        }

        $passwordValidationResult = $this->passwordValidation($form['password']);
        if (!$passwordValidationResult['result']) {
            return $this->render('security/signUp.html.twig', [
                'message' => $passwordValidationResult['message']
            ]);
        }

        $this->createCustomer([
            'email' => $form['email'],
            'roles' => [3],
            'password' => $form['password']
        ]);

        return $this->render('security/signUp.html.twig', [
            'message' => 'You are signed up successfully'
        ]);
    }

    /**
     * @Route("/signOut", name="signOut")
     */
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

    private function createCustomer($customerInfo)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $customer = new Customer();
        $customer->setEmail($customerInfo['email']);
        $customer->setRoles($customerInfo['roles']);
        $customer->setPassword(md5($customerInfo['password']));

        $entityManager->persist($customer);
        $entityManager->flush();
    }

    private function emailValidation($email)
    {
        $result = [
            'message' => '',
            'result' => true
        ];

        if (!$email) {
            $result['message'] = 'The email is empty';
            $result['result'] = false;
        }

        if (!strpos($email, '@')) {
            $result['message'] = 'The email format is incorrect';
            $result['result'] = false;
        }

        return $result;
    }

    private function passwordValidation($password)
    {
        $result = [
            'message' => '',
            'result' => true
        ];

        if (strlen($password) < 4) {
            $result['message'] = 'The password must contain more than 4 symbols';
            $result['result'] = false;
        }

        return $result;
    }
}
