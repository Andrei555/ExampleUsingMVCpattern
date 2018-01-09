<?php

namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Session;
use Library\Password;
use Model\Form\LoginForm;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        $form = new LoginForm($request);
        if($request->isPost()){
            if($form->isValid()){
                $password = new Password($form->password);
                $email = $form->email;

                $repo = $this->container->get('repository_manager')->getRepository('User');
                if($user = $repo->find($email, $password)){
                   // var_dump($user);
                    Session::set('user', $user->getEmail());
                    Session::setFlash('Вы успешно залогинились!');

                    $this->container->get('router')->redirect('/admin');
                }
                Session::setFlash('Пользователь не найден!');
                $this->container->get('router')->redirect('/login');

            }
            Session::setFlash('Форма заполненна не коректно!');
        }

        return $this->render('login.phtml', ['form' => $form]);
    }

    public function logoutAction(Request $request)
    {
        Session::remove('user');
        $this->container->get('router')->redirect('/');
    }

    public function registerAction(Request $request)
    {

    }
}