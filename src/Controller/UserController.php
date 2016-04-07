<?php

namespace App\Controller;

use App\App;
use App\Entity\User;
use App\Form\PasswordResetType;
use App\Form\UserType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    public function signupAction(App $app, Request $request)
    {
        $user = new User();

        /** @var FormInterface $form */
        $form = $app['form.factory']->create(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $app['em']->persist($user);
            $app['em']->flush();
        }

        return $app->render('User/signup.html.twig', [
            'form' => $form->createView(),
            'formValid' => $form->isValid(),
        ]);
    }

    public function loginAction(App $app, Request $request)
    {
        return $app->render('User/login.html.twig', [
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
        ]);
    }

    /**
     * @param App $app
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function passwordLostAction(App $app, Request $request)
    {
        $hasError = false;

        if ($request->isMethod('post')) {
            $email = $request->request->get('email');

            /** @var User $user */
            $user = $app['user.repository']->findOneBy(['email' => $email]);

            if ($user) {
                $user->setPasswordRecoveryHash(uniqid());
                $app['em']->flush();

                $message = \Swift_Message::newInstance();
                $message
                    ->setSubject('Récupération du mot de passe')
                    ->setFrom('app@site.com') // TODO mieux
                    ->setTo($user->getEmail())
                    ->setBody($app->renderView('Email/passwordLost.html.twig', ['user' => $user]))
                    ->setContentType('text/html');

                $app['mailer']->send($message);
            } else {
                $hasError = true;
            }
        }

        return $app->render('User/passwordLost.html.twig', [
            'formSended' => $request->isMethod('post'),
            'hasError' => $hasError,
        ]);
    }

    /**
     * @param App $app
     * @param $hash
     * TODO param converter
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function passwordResetAction(App $app, Request $request, $hash)
    {
        /** @var User $user */
        $user = $app['user.repository']->findOneBy(['passwordRecoveryHash' => $hash]);

        if (!$user) {
            $app->abort(404);
        }

        /** @var FormInterface $form */
        $form = $app['form.factory']->create(PasswordResetType::class, $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $app['em']->flush();

            // TODO login

            $app->addSuccessMessage('Votre mot de passe a bien été modifié.');
            return $app->redirectToRoute('home');
        }

        return $app->render('User/passwordReset.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function editAction(App $app, Request $request, User $user)
    {
        // TODO voter

        /** @var FormInterface $form */
        $form = $app['form.factory']->create(UserType::class, $app['user']);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $app['em']->flush();
            $app->addSuccessMessage('Ok');
        }

        return $app->render('User/editAccount.html.twig', [
            'form' => $form->createView(),
            'formValid' => $form->isValid(),
        ]);
    }
}
