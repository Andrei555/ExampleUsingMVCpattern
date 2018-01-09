<?php

namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Pagination\Pagination;

class ShipController extends Controller
{
    const SHIPS_PER_PAGE = 1;

    public function indexAction(Request $request)
    {
        $repo = $this->container->get('repository_manager')->getRepository('Ship');
        $page = (int)$request->get('page', 1);
        $count = $repo->count();
        // todo: findActive();
        $ships = $repo->findActiveByPage($page, self::SHIPS_PER_PAGE);

        if(!$ships && $count){
            $this->container->get('router')->redirect('/ships');
        }

        $pagination = new Pagination(['itemsCount' => $count, 'itemsPerPage' => self::SHIPS_PER_PAGE, 'currentPage' => $page]);

        $args = [
            'ships' => $ships,
            'pagination' => $pagination,
        ];
        return $this->render('index.phtml', $args);
    }
}