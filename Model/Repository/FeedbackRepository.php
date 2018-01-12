<?php

namespace Model\Repository;

use Library\EntityRepository;
use Model\Feedback;

class FeedbackRepository extends EntityRepository
{
    public function save($object)
    {
        $sql = 'INSERT INTO feedback (name, email, message, ip_address) VALUES (:name, :email, :message, :ip_address)';
        $sth = $this->pdo->prepare($sql);
        $sth->execute(array(
            'name' => $object->getName(),
            'email' => $object->getEmail(),
            'message' => $object->getMessage(),
            'ip_address' => $object->getIpAddress()
        ));
    }

    public function showComments()
    {
        $sql = 'SELECT name, message, DATE_FORMAT(created, "%h:%i:%s %d.%m.%Y") as created FROM feedback';
        $sth = $this->pdo->query($sql);
        $comments = [];
        while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
            // new Style()
            $comment = (new Feedback())
                ->setName($row['name'])
                ->setCreated($row['created'])
                ->setMessage($row['message']);
            $comments[] = $comment;
        }
        return $comments;
    }
}