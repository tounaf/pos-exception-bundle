<?php


namespace POS\ExceptionBundle\Exception\Handler\Driver;


use Doctrine\DBAL\Exception\DriverException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use POS\Bundle\CommunBundle\Utils\ConstantSrv;
use POS\Bundle\CoreBundle\Exception\PosExceptionInterface;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PosDuplicateCoffreEtatDriverExceptionHandler implements PosExceptionInterface
{
    /**
     * @param \Exception $exception
     * @return array
     */
    public function setData(\Exception $exception)
    {

        return array(
            'message'      => 'Ce coffre est déjà ouvert',
            'http_message' => 'Action non aboutie',
            'code'         => ConstantSrv::CODE_INTERNAL_ERROR
        );
    }

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof DriverException && $exception->getSQLState() == ConstantSrv::SQL_STATE_DUPLICATE_COFFRE_ETAT;
    }

}
