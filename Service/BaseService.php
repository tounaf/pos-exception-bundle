<?php
/**
 * Created by PhpStorm.
 * User: fetra
 * Date: 8/22/22
 * Time: 1:52 PM
 */

namespace POS\ExceptionBundle\Service;


use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class BaseService
{
    /**
     * @var ContainerInterface $container
     */
    protected $container;

    /**
     * @var EntityManagerInterface $entityManager
     */
    protected $entityManager;

    /**
     * @var LoggerInterface $logger
     */
    protected $logger;

    public function __construct(ContainerInterface $container, EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->container = $container;
        $this->entityManager = $entityManager;
        $this->logger = $logger;
    }

    public function getName()
    {
        echo "Salut";
    }
}
