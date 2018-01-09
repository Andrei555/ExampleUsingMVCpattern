<?php

use Library\Route;

return array(
    'homepage' => new Route('/', 'Site', 'index'),
    'index.php' => new Route('/webroot/index.php', 'Site', 'index'),
    'ships_list' => new Route('/ships', 'Ship', 'index'),
    'contact_us' => new Route('/contact-us', 'Site', 'contact'),
    'login' => new Route('/login', 'Security', 'login'),
    'ships_page' => new Route('/ship-{id}.html', 'ShipController', 'showAction', array('id' => '[0-9]+')),
    'logout' => new Route('/logout', 'Security', 'logout'),

    // admin routes
    'admin_default' => new Route('/admin', 'Admin\\Default', 'index'),
    'admin_add' => new Route('/admin/add', 'Admin\\Ship', 'add'),
    'admin_ships' => new Route('/admin/ships', 'Admin\\Ship', 'index'),
    'admin_ship_edit' => new Route('/admin/ships/edit/{id}', 'Admin\\Ship', 'index'),
    'admin_ships_list' => new Route('/admin/ships', 'Admin\\Ship', 'index'),
    'admin_ships_remove' => new Route('/admin/ships/remove/{id}', 'Admin\\Ship', 'remove', array('id' => '[0-9]+')),
    'admin_ships_edit' => new Route('/admin/ships/edit/{id}', 'Admin\\Ship', 'edit', array('id' => '[0-9]+')),
    'admin_document_add' => new Route('/admin/docs/add', 'Admin\\Document', 'add')
);