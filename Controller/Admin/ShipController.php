<?php

namespace Controller\Admin;

use Library\Request;
use Library\Session;
use Library\Controller;
use Model\Form\ShipForm;
use Model\Ship;

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

    public function addAction(Request $request)
    {
        $form = new ShipForm($request);
        //todo: inject
        $repo = $this->container->get('repository_manager')->getRepository('Ship');

        if ($request->isPost()){
            if ($form->isValid()) {
                $ship = (new Ship())
                    ->setNameShip($form->nameShip)
                    ->setLong($form->longShip)
                    ->setHeight($form->heightShip)
                    ->setWidth($form->widthShip)
                    ->setDisplacement($form->displacement)
                    ->setLaunching($form->launching)
                    ->setRemovalFromService($form->removalFromService)
                    ->setDescription($form->description)
                ;

                $repo->saveArticle($ship);

                Session::setFlash('Статья была успешно сохранена!');
                $this->container->get('router')->redirect('/admin/add');
            }
            Session::setFlash('Вы заполнили не все поля!');
        }

        return $this->render('add.phtml', ['form' => $form]);
    }

    public function editAction(Request $request)
    {
        if (!Session::has('user')) {
            $this->container->get('router')->redirect('/login');
        }

        $repo = $this->container->get('repository_manager')->getRepository('Ship');
        $form = new ShipForm($request);


        $id = $request->get('id');
        $ship = $repo->findById($id);

        if ($request->isPost()) {
            if ($form->isValid()) {
                $ship = (new Ship())
                    ->setId($id)
                    ->setNameShip($form->nameShip)
                    ->setLong($form->longShip)
                    ->setHeight($form->heightShip)
                    ->setWidth($form->widthShip)
                    ->setDisplacement($form->displacement)
                    ->setLaunching($form->launching)
                    ->setRemovalFromService($form->removalFromService)
                    ->setDescription($form->description)
                ;

                $repo->saveEditArticle($ship);


                Session::setFlash('Изминения были сохранены!');
                $this->container->get('router')->redirect('/admin/ships/edit/' . $id);
            }


        }

        $args = compact('ship', 'form');
        return $this->render('edit.phtml', $args);
    }
}