<?php


namespace POS\ExceptionBundle\Exception\Handler\Http;


use POS\Bundle\CommunBundle\Utils\ConstantSrv;
use POS\Bundle\CoreBundle\Exception\AbstractPosException;
use POS\Bundle\CoreBundle\Exception\PosExceptionInterface;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PosMethodNotAllowedHttpExceptionHandler extends AbstractPosException implements PosExceptionInterface
{
    public function setData(\Exception $exception)
    {
        return array_merge(
            array(
                'message' => $exception->getMessage(),
                'http_message' => 'Method Not Allowed',
                'code' => ConstantSrv::CODE_METHODE_NOTFOUND,
            ), $this->getMessageParts($exception)
        );
    }

    public function isMatchException(\Exception $exception)
    {
        return $exception instanceof MethodNotAllowedHttpException;
    }

}
