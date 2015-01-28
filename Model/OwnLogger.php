<?php
namespace Rudak\OwnLoggerBundle\Model;

use Rudak\OwnLoggerBundle\Entity\Log;
use Symfony\Component\DependencyInjection\ContainerInterface;

class OwnLogger
{

    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function addEntry($user, $action, $category, \Datetime $date)
    {
        $Log = new Log();
        $Log->setUser($user)->setAction($action)->setCategory($category)->setDate($date);

        $this->em->persist($Log);
        $this->em->flush();
    }
}