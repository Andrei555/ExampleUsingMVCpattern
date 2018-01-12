<?php

namespace Model\Repository;

use Library\EntityRepository;
use Model\Ship;
use Library\NotFoundException;

class ShipRepository extends EntityRepository
{
    public function findActiveByPage($page, $perPage)
    {
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT id, nameShip, height, `long`, description, width, displacement, DATE_FORMAT(launching, '%d.%m.%Y')
        as launching, DATE_FORMAT(removalFromService, '%d.%m.%Y') as removalFromService FROM all_ships ORDER BY id LIMIT {$offset}, {$perPage}";
        $sth = $this->pdo->query($sql);
        $ships = [];

        while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
            // new Style()
            $ship = (new Ship())
                ->setId($row['id'])
                ->setNameShip($row['nameShip'])
                ->setLong($row['long'])
                ->setLaunching($row['launching'])
                ->setRemovalFromService($row['removalFromService'])
                ->setDescription($row['description'])
                ->setWidth($row['width'])
                ->setHeight($row['height'])
                ->setDisplacement($row['displacement']);
            $ships[] = $ship;
        }
        return $ships;
    }

    public function count($active = true)
    {
        $sql = 'SELECT count(*) FROM all_ships';
//        if($active){
//            $sql .= ' WHERE is_active = 1';
//        }
        $sth = $this->pdo->query($sql);
        return (int)$sth->fetchColumn();
    }

    public function findAll()
    {
        $sth = $this->pdo->query('SELECT id, nameShip, height, `long`, description, width, displacement, DATE_FORMAT(launching, "%d.%m.%Y")
        as launching, DATE_FORMAT(removalFromService, "%d.%m.%Y") as removalFromService FROM all_ships');
        $ships = [];

        while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
            // new Style()
            $ship = (new Ship())
                ->setId($row['id'])
                ->setNameShip($row['nameShip'])
                ->setLong($row['long'])
                ->setLaunching($row['launching'])
                ->setRemovalFromService($row['removalFromService'])
                ->setDescription($row['description'])
                ->setWidth($row['width'])
                ->setHeight($row['height'])
                ->setDisplacement($row['displacement']);
            $ships[] = $ship;
        }
        return $ships;
    }

    public function removeById($id)
    {
        $sth = $this->pdo->prepare('DELETE FROM all_ships WHERE id = :ship_id');
        $params = array(
            'ship_id' => $id
        );
        $sth->execute($params);
    }

    public function saveArticle($object)
    {
        $sql = 'INSERT INTO all_ships (nameShip, displacement, description, removalFromService, launching, width, `long`, height) 
                              VALUES (:nameShip, :displacement, :description, :removalFromService, :launching, :width, :long, :height)';
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(
            'nameShip' => $object->getNameShip(),
            'long' => $object->getLong(),
            'height' => $object->getHeight(),
            'width' => $object->getWidth(),
            'displacement' => $object->getDisplacement(),
            'launching' => $object->getLaunching(),
            'removalFromService' => $object->getRemovalFromService(),
            'description' => $object->getDescription(),
        ));
    }

    public function saveEditArticle($object)
    {
        $sql = ('UPDATE all_ships SET removalFromService = :removalFromService, nameShip = :nameShip, `long` = :long, height = :height,
              width = :width, displacement = :displacement, launching = :launching, description = :description WHERE id = :id');

        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(
            'id' => $object->getId(),
            'nameShip' => $object->getNameShip(),
            'long' => $object->getLong(),
            'height' => $object->getHeight(),
            'width' => $object->getWidth(),
            'displacement' => $object->getDisplacement(),
            'launching' => $object->getLaunching(),
            'removalFromService' => $object->getRemovalFromService(),
            'description' => $object->getDescription(),
        ));
        //$sth = $db->prepare('UPDATE book SET title = :title, description = :description, price = :price, is_active = :status where id = :id');
    }

    public function findById($id)
    {
        $sth = $this->pdo->prepare('SELECT * FROM all_ships WHERE id = :ship_id');
        $params = array(
            'ship_id' => $id
        );
        $sth->execute($params);

        $ship = $sth->fetch(\PDO::FETCH_ASSOC);


        if (!$ship) {
            throw new NotFoundException("Article #{$id} not found");
        }

        return $ship;
    }
}
