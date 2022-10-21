<?php


namespace POS\ExceptionBundle\Exception\Handler\Http;


use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use POS\Bundle\CommunBundle\Utils\ConstantSrv;
use POS\Bundle\CoreBundle\Exception\PosExceptionInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PosAccessDeniedHttpExceptionHandler implements PosExceptionInterface
{
    /**
     * @param \Exception $exception
     * @return array
     */
    public function setData(\Exception $exception)
    {
        return array(
                'message' => $exception->getMessage(),
                'http_message' => 'Action non autorisée',
                'code' => ConstantSrv::CODE_UNAUTHORIZED_METHODE
            );
    }

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof AccessDeniedHttpException;
    }

}
