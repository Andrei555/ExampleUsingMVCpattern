<?php

namespace Controller\Admin;

use Library\Request;
use Library\Session;
use Library\Controller;

class ShipController extends Controller
{
    public function indexAction()
    {
        $repo = $this->container->get('repository_manager')->getRepository('Ship');
        // todo: findActive();
        $ships = $repo->findAll();

        $args = ['ships' => $ships];
        return $this->render('index.phtml', $args);
    }

    public function removeAction(Request $request)
    {
        $repo = $this->container->get('repository_manager')->getRepository('Ship');
        if (!Session::has('user')) {
            $this->container->get('router')->redirect('/login');
        }

        $id = $request->get('id');


        // todo: check if book exists?

        $repo->removeById($id);

        Session::setFlash("Статтья №{$id} была удалена!");
        $this->container->get('router')->redirect('/admin/ships');
    }
}